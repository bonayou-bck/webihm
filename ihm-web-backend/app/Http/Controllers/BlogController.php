<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogHistory;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Traits\Tappable;

class BlogController extends Controller
{
    protected $viewPath = 'app.blog';
    protected $dataStatus = [
        'editing' => [BLOG_STATUS_EDITING, 'warning'],
        'review' => [BLOG_STATUS_REVIEW, 'primary'],
        'approved' => [BLOG_STATUS_APPROVED, 'info'],
        'rejected' => [BLOG_STATUS_REJECTED, 'danger'],
        'published' => [BLOG_STATUS_PUBLISHED, 'success'],
        'draft' => [BLOG_STATUS_DRAFT, 'light']
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = Blog::with(['categories', 'created_by_detail', 'updated_by_detail', 'history']);

        $sess = Auth::user();
        $userId = $sess->id;
        $userRole = $sess->role;

        if ($userRole == USER_ROLE_WRITER) {
            $data = $data->where('created_by', $userId);
        }

        $data = $data->orderBy('id', 'DESC')->get();
        $dataDraft = $data->where('status', 'draft')->values();
        $blogCounts = Blog::select(DB::raw('status, COUNT(status) as total'))
            ->where('created_by', $userId)
            ->groupBy('status')
            ->get();
        $blogCounts2 = [];
        foreach($blogCounts as $bc) {
            $blogCounts2[$bc['status']] = $bc['total'];
        }
        $blogCounts2['total'] = count(Blog::where('created_by', $userId)->get());

        return view($this->viewPath . '.blog', [
            'tableData' => $data,
            'tableDataDraft' => $dataDraft,
            'dataStatus' => $this->dataStatus,
            'counts' => $blogCounts2
        ]);
    }

    public function create(Request $request)
    {
        $dataCategory = BlogCategory::get();

        return view($this->viewPath . '.create', [
            'dataCategory' => $dataCategory,
            'dataHistory' => null,
            'mode' => 'create',
            'dataStatus' => $this->dataStatus
        ]);
    }

    public function edit(Request $request, $slug)
    {
        $dataCategory = BlogCategory::get();
        $blog = Blog::with(['categories', 'created_by_detail', 'updated_by_detail', 'history'])
            ->where('slug_id', $slug);

        $sess = Auth::user();
        $userId = $sess->id;
        $userRole = $sess->role;

        if ($userRole == USER_ROLE_WRITER) {
            $blog = $blog->where('created_by', $userId);
        }

        $blog = $blog->first();

        if (!$blog) abort(404);

        return view($this->viewPath . '.create', [
            'dataCategory' => $dataCategory,
            'dataHistory' => null,
            'mode' => 'edit',
            'dataBlog' => $blog,
            'dataStatus' => $this->dataStatus
        ]);
    }

    public function postReject(Request $request, $id = null)
    {
        $rules = [
            'by' => 'required|string',
            'note' => 'required|string|max:255'
        ];
        $input = [
            'by' => $request->input('by'),
            'note' => $request->input('note')
        ];

        if (!Validator::make($input, $rules)->passes()) return $this->respondError(
            'bad parameters'
        );

        $dataBlog = [
            'status' => BLOG_STATUS_REJECTED
        ];
        $updatedBlog = Blog::where('id', $id)->update($dataBlog);
        $updatedBlog = Blog::where('id', $id)->first();

        // var_dump($updatedBlog);

        $dataHistory = [
            'blog_id' => $id,
            'title_id' => $updatedBlog->title_id,
            'title_en' => $updatedBlog->title_en,
            'notes' => $input['note'],
            'status' => BLOG_STATUS_REJECTED,
            'created_by' => $input['by']
        ];

        $insertedHistory = BlogHistory::insert($dataHistory);

        return $this->respondWithSuccess(['message' => 'success']);
    }

    public function postCreate(Request $request, $id = null)
    {
        $rules = [
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'status' => 'required|string|max:15',
            'cover' => 'nullable',
            'category_id' => 'required',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'approved_by' => 'nullable|string'
        ];
        $input = [
            'title_id' => $request->input('title_id'),
            'title_en' => $request->input('title_en'),
            'content_id' => $request->input('content_id'),
            'content_en' => $request->input('content_en'),
            'status' => $request->input('status'),
            'cover' => $request->input('cover'),
            'category_id' => $request->input('category_id'),
            'created_by' => $request->input('created_by'),
            'updated_by' => $request->input('updated_by'),
            'approved_by' => $request->input('approved_by')
        ];

        // var_dump(Validator::make($input, $rules)->passes());
        // var_dump($input);

        if (!Validator::make($input, $rules)->passes()) return redirect()
            ->back()
            ->with('status-blog', [
                'code' => 400,
                'all' => true,
                'type' => 'add',
                'err' => 'all field is required'
            ]);

        // do process cover here
        $coverpath = "";
        if ($input['cover']) {
            $filepath = uploadImageFilepond(
                $input['cover'],
                null,
                'uploads-blog'
            );
            $coverpath = $filepath;
            $input['cover'] = $coverpath[0];
            // $input['cover_thumb'] = $coverpath[1];
        } else {
            unset($input['cover']);
        }

        // check status
        // create new
        if ($id == null) {
            $input['slug_id'] = slugify($input['title_id']);
            $input['slug_en'] = slugify($input['title_en']);

            // this post is newly created
            unset($input['updated_by']);
            unset($input['approved_by']);

            Blog::insert($input);

            // return $this->respondWithSuccess($input);
            return redirect()->to('/blog')->with('status-blog', [
                'code' => 200,
                'all' => true,
                'type' => 'update'
            ]);
        }
        // update
        else {
            unset($input['created_by']);
            // for now if status is BLOG_STATUS_APPROVED
            // then change status to BLOG_STATUS_PUBLISHED
            if ($input['status'] == BLOG_STATUS_APPROVED) {
                $input['approved_at'] = date('Y-m-d H:i:s');
                $input['published_at'] = date('Y-m-d H:i:s');
            }

            // check is status is BLOG_STATUS_EDITING
            // check is status is BLOG_STATUS_REVIEW
            if (
                $input['status'] == BLOG_STATUS_EDITING ||
                $input['status'] == BLOG_STATUS_REVIEW
            ) {
                unset($input['approved_by']);
            }

            $result = Blog::where('id', $id)
                ->update($input);

            return redirect()->to('/blog')->with('status-blog', [
                'code' => 200,
                'all' => true,
                'type' => 'update'
            ]);
        }
    }

    public function sendToDraft(Request $request, $id = null)
    {
        // echo $id;
        // return;
        $result = Blog::where('id', $id)
            ->update([
                'status' => BLOG_STATUS_DRAFT
            ]);

        if ($result) {
            return redirect()->to('blog')->with(SESSION_ALERT, [
                'status' => ALERT_SUCCESS,
                'message' => 'Article was moved to Draft.',
                'data' => null
            ]);
        } else {
            return redirect()->to('blog')->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to move article to draft, please try again.',
                'data' => null
            ]);
        }
    }

    public function categories(Request $request)
    {
        $data = BlogCategory::with('posts_ids')
            ->where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        $data->transform(function ($item, $k) {
            $item->posts = count($item->posts_ids);
            unset($item->posts_ids);
            return $item;
        });

        // return $this->respondWithSuccess($data->toArray());

        return view($this->viewPath . '.category.blog-category', [
            'tableData' => $data
        ]);
    }

    public function postCatCreate(Request $request, $id = null)
    {
        $rules = [
            'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255'
        ];
        $input = [
            'name_id' => $request->input('name_id'),
            'name_en' => $request->input('name_en')
        ];

        if (!Validator::make($input, $rules)->passes()) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed to create blog category, all field is required.',
            'data' => null
        ]);

        var_dump($input);

        if ($id == null) {
            $input['slug_id'] = slugify($input['name_id']);
            $input['slug_en'] = slugify($input['name_en']);

            $result = BlogCategory::insert($input);

            if ($result) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Blog category created.'
                ]);
            } else {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to create blog category.',
                    'data' => null
                ]);
            }
        } else {
            // update
            $result = BlogCategory::where('id', $id)
                ->update($input);

            if ($result) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Blog category updated.'
                ]);
            } else {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to update blog category.',
                    'data' => null
                ]);
            }
        }
    }

    public function approval(Request $request)
    {
        $data = Blog::with(['categories', 'created_by_detail', 'updated_by_detail', 'history']);

        $sess = Auth::user();
        $userId = $sess->id;
        $userRole = $sess->role;

        if ($userRole == USER_ROLE_WRITER) {
            $data = $data->where('created_by', $userId);
        }

        $data = $data->where('status', BLOG_STATUS_REVIEW);
        $data = $data->orderBy('id', 'DESC')->get();

        return view($this->viewPath . '.approval.blog-approval', [
            'tableData' => $data,
            'dataStatus' => $this->dataStatus
        ]);
    }

    public function delete($id)
    {
        $result = BlogCategory::where('id', $id)
            ->update([
                'is_active' => 0
            ]);

        if ($result) {
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_SUCCESS,
                'message' => 'Blog category was deleted.'
            ]);
        } else {
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to delete blog category.',
                'data' => null
            ]);
        }
    }

    public function history(Request $request, $id = null)
    {
        $data = [];

        if ($id != null) {
            $data = ['detail' => true];
        }

        return view('app.blog.history.blog-history', $data);
    }
}
