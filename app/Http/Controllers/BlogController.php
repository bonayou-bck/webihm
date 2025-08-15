<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected string $viewPath = 'app.blog';

    /** --------------------------------------------------------------
     * Helpers
     * ---------------------------------------------------------------*/
    protected function statusMap(): array
    {
        // Gunakan string saja agar tidak bergantung pada konstanta yang belum didefinisikan
        return [
            'PUBLISHED' => 'Published',
            'DRAFT'     => 'Draft',
            'REJECTED'  => 'Rejected',
            'IN_REVIEW' => 'In Review',
        ];
    }

    protected function statusKeys(): array
    {
        return array_keys($this->statusMap());
    }

    /** --------------------------------------------------------------
     * Index: daftar published & draft
     * View: resources/views/app/blog/blog.blade.php
     * ---------------------------------------------------------------*/
    public function index(Request $request)
    {
        $dataStatus = $this->statusMap();

        // Sesuaikan kolom status sesuai skema Anda
        $published = Blog::query()
            ->with(['categories', 'createdByDetail'])
            ->when($request->get('q'), function($q, $qstr){
                $q->where(function($qq) use ($qstr){
                    $qq->where('title_id', 'like', "%{$qstr}%")
                       ->orWhere('title_en', 'like', "%{$qstr}%");
                });
            })
            ->where('status', 'PUBLISHED')
            ->orderByDesc('updated_at')
            ->get();

        $draft = Blog::query()
            ->with(['categories', 'createdByDetail'])
            ->where('status', 'DRAFT')
            ->orderByDesc('updated_at')
            ->get();

        $counts = [
            'total'     => ($published?->count() ?? 0) + ($draft?->count() ?? 0),
            'published' => $published?->count() ?? 0,
            'draft'     => $draft?->count() ?? 0,
        ];

        return view("{$this->viewPath}.blog", [
            'tableData'      => $published,
            'tableDataDraft' => $draft,
            'counts'         => $counts,
            'dataStatus'     => $dataStatus,
        ]);
    }

    /** --------------------------------------------------------------
     * GET create / edit form
     * View: resources/views/app/blog/create.blade.php
     * ---------------------------------------------------------------*/
    public function create(Request $request)
    {
        $mode = 'create';
        $dataStatus   = $this->statusMap();
        $dataCategory = BlogCategory::orderBy('name')->get();

        return view("{$this->viewPath}.create", compact('mode', 'dataStatus', 'dataCategory'));
    }

    public function edit(Request $request, $slugOrId = null)
    {
        $mode = 'edit';
        $dataStatus   = $this->statusMap();
        $dataCategory = BlogCategory::orderBy('name')->get();

        // Cari berdasarkan slug_id, slug_en, atau id
        $data = Blog::query()
            ->with(['categories'])
            ->where('id', $slugOrId)
            ->orWhere('slug_id', $slugOrId)
            ->orWhere('slug_en', $slugOrId)
            ->firstOrFail();

        // Dapatkan history terbaru jika ada
        $dataHistory = BlogHistory::where('blog_id', $data->id)->latest()->first();

        return view("{$this->viewPath}.create", compact('mode', 'dataStatus', 'dataCategory', 'data', 'dataHistory'));
    }

    /** --------------------------------------------------------------
     * POST create
     * Route: POST /blog/create
     * ---------------------------------------------------------------*/
    public function postCreate(Request $request)
    {
        $request->validate([
            'title_id'   => 'required|string|max:255',
            'title_en'   => 'required|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'status'     => 'required|in:'.implode(',', $this->statusKeys()),
            'category_id'=> 'array',
            'category_id.*' => 'integer',
            'cover'      => 'nullable|image|max:2048',
        ]);

        return DB::transaction(function() use ($request){
            $coverPath = null;
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('blog_covers', 'public');
            }

            $blog = new Blog();
            $blog->title_id   = $request->title_id;
            $blog->title_en   = $request->title_en;
            $blog->content_id = $request->content_id;
            $blog->content_en = $request->content_en;
            $blog->status     = $request->status;
            $blog->slug_id    = $blog->slug_id ?? \Str::slug($request->title_id);
            $blog->slug_en    = $blog->slug_en ?? \Str::slug($request->title_en);
            if ($coverPath) $blog->cover = $coverPath;
            $blog->created_by = auth()->id();
            $blog->save();

            // Sinkronisasi kategori jika relasi tersedia
            if (method_exists($blog, 'categories') && $request->filled('category_id')) {
                $blog->categories()->sync($request->category_id);
            }

            // Simpan history awal
            BlogHistory::create([
                'blog_id'    => $blog->id,
                'title_id'   => $blog->title_id,
                'title_en'   => $blog->title_en,
                'content_id' => $blog->content_id,
                'content_en' => $blog->content_en,
                'status'     => $blog->status,
                'note'       => 'Created',
                'by'         => auth()->id(),
            ]);

            return redirect('blog')->with('alert', [
                'status'  => 'success',
                'message' => 'Berita berhasil dibuat.',
            ]);
        });
    }

    /** --------------------------------------------------------------
     * POST update
     * Route: POST /blog/update/{id}
     * ---------------------------------------------------------------*/
    public function postUpdate(Request $request, $id)
    {
        $request->validate([
            'title_id'   => 'required|string|max:255',
            'title_en'   => 'required|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'required|string',
            'status'     => 'required|in:'.implode(',', $this->statusKeys()),
            'category_id'=> 'array',
            'category_id.*' => 'integer',
            'cover'      => 'nullable|image|max:2048',
        ]);

        return DB::transaction(function() use ($request, $id){
            $blog = Blog::findOrFail($id);

            if ($request->hasFile('cover')) {
                if (!empty($blog->cover)) {
                    Storage::disk('public')->delete($blog->cover);
                }
                $blog->cover = $request->file('cover')->store('blog_covers', 'public');
            }

            $blog->title_id   = $request->title_id;
            $blog->title_en   = $request->title_en;
            $blog->content_id = $request->content_id;
            $blog->content_en = $request->content_en;
            $blog->status     = $request->status;
            $blog->save();

            if (method_exists($blog, 'categories')) {
                $blog->categories()->sync($request->get('category_id', []));
            }

            BlogHistory::create([
                'blog_id'    => $blog->id,
                'title_id'   => $blog->title_id,
                'title_en'   => $blog->title_en,
                'content_id' => $blog->content_id,
                'content_en' => $blog->content_en,
                'status'     => $blog->status,
                'note'       => 'Updated',
                'by'         => auth()->id(),
            ]);

            return redirect('blog')->with('alert', [
                'status'  => 'success',
                'message' => 'Perubahan tersimpan.',
            ]);
        });
    }

    /** --------------------------------------------------------------
     * POST reject
     * Route: POST /blog/reject/{id}
     * ---------------------------------------------------------------*/
    public function postReject(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|string|max:1000',
        ]);

        return DB::transaction(function() use ($request, $id){
            $blog = Blog::findOrFail($id);
            $blog->status = 'REJECTED';
            $blog->save();

            BlogHistory::create([
                'blog_id' => $blog->id,
                'title_id'   => $blog->title_id,
                'title_en'   => $blog->title_en,
                'content_id' => $blog->content_id,
                'content_en' => $blog->content_en,
                'status'  => $blog->status,
                'note'    => $request->note,
                'by'      => auth()->id(),
            ]);

            return redirect('blog')->with('alert', [
                'status'  => 'success',
                'message' => 'Artikel ditolak.',
            ]);
        });
    }

    /** --------------------------------------------------------------
     * GET to draft
     * Route: GET /blog/to-draft/{id}
     * ---------------------------------------------------------------*/
    public function toDraft(Request $request, $id)
    {
        return DB::transaction(function() use ($id){
            $blog = Blog::findOrFail($id);
            $blog->status = 'DRAFT';
            $blog->save();

            BlogHistory::create([
                'blog_id' => $blog->id,
                'title_id'   => $blog->title_id,
                'title_en'   => $blog->title_en,
                'content_id' => $blog->content_id,
                'content_en' => $blog->content_en,
                'status'  => $blog->status,
                'note'    => 'Move to draft',
                'by'      => auth()->id(),
            ]);

            return redirect('blog')->with('alert', [
                'status'  => 'success',
                'message' => 'Artikel dipindahkan ke draft.',
            ]);
        });
    }

    /** --------------------------------------------------------------
     * History (opsional): placeholder sesuai view history
     * ---------------------------------------------------------------*/
    public function history(Request $request, $id = null)
    {
        $data = [];

        if ($id != null) {
            $data = ['detail' => true];
        }

        return view('app.blog.history.blog-history', $data);
    }
}
