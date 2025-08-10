<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog as ModelsBlog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

	public function index(Request $request, $page = 1,)
	{
		$rules = [
			'c' => 'nullable',
			'y' => 'nullable|max:4'
		];
		$input = [
			'c' => $request->input('c'),
			'y' => $request->input('y'),
		];

		if (!Validator::make($input, $rules)->passes()) return $this->respondError(
			'parameter error'
		);
		
		$category = $input['c'];
		$year = $input['y'];
		$conditional = [];

		if ($category) {
			$conditional['category_slug'] = $category;
		}

		if ($year) {
			$conditional['YEAR(created_at)'] = $year;
		}

		$blogList  = $this->_getBlogData($page, $conditional);

		return $this->respondWithSuccess($blogList);
	}

	/* #region indexFiltered */
	/**
	 * Get params:
	 * - c => category 
	 * (or and)
	 * - y => year
	 */
	public function indexFiltered(Request $request, $page = 1)
	{
		$rules = [
			'c' => 'nullable',
			'y' => 'nullable|max:4'
		];
		$input = [
			'c' => $request->input('c'),
			'y' => $request->input('y'),
		];

		if (!Validator::make($input, $rules)->passes()) return $this->respondError(
			'parameter error'
		);

		$category = $input['c'];
		$year = $input['y'];
		$conditional = [];

		if ($category) {
			$conditional['category_slug'] = $category;
		}

		if ($year) {
			$conditional['YEAR(created_at)'] = $year;
		}

		$result  = $this->_getBlogData($page, $conditional);

		return $this->respondWithSuccess($result);
	}
	/* #endregion */

	/* #region indexSlug */
	public function indexSlug(Request $request, $slug)
	{
		$result  = ModelsBlog::with('categories')
			->where('slug_id', '=', $slug)
			->orWhere('slug_en', '=', $slug)
			->get();

		$locale = config('app.locale');
		$result->transform(function($item, $k) use($locale) {
			$item->year = date('Y', strtotime($item->created_at));

			if($locale == 'en') {
				$item->title = $item->title_en;
				$item->slug = $item->slug_en;
				$item->content = $item->content_en;
			}else{
				$item->title = $item->title_id;
				$item->slug = $item->slug_id;
				$item->content = $item->content_id;
			}

			$item->categories->transform(function($item2, $k2) use($locale) {
				$_item = (object)[];
				if($locale == 'en') {
					$_item->slug = $item2->slug_en;
					$_item->name = $item2->name_en;
				}else{
					$_item->slug = $item2->slug_id;
					$_item->name = $item2->name_id;
				}

				$item2 = $_item;

				return $_item;
			});

			unset($item->title_id);
			unset($item->slug_id);
			unset($item->content_id);
			unset($item->title_en);
			unset($item->slug_en);
			unset($item->content_en);
			unset($item->created_by);
			unset($item->updated_by);
			unset($item->approved_by);
			unset($item->approved_at);
			unset($item->status);

			return $item;
		});

		return $this->respondWithSuccess($result->first());
	}
	/* #endregion */

	/* #region indexHighlight */
	public function indexHighlight(Request $request)
	{
		$result  = $this->_getBlogData(1, [], 3);
		return $this->respondWithSuccess($result);
	}
	/* #endregion */

	/* #region indexCategories */
	public function indexCategories(Request $request)
	{
		$categoryList = BlogCategory::with(['posts'])
			->where('is_active', 1)
			// ->orderBy('name', 'ASC')
			->get();
		$yearList = ModelsBlog::where('status', 'published')
			->groupBy('year')
			->get(DB::raw('YEAR(created_at) as year'));
		$yearList->transform(function($item, $k) {
			return $item['year'];
		});
		$yearList = $yearList->sortDesc()->flatten()->toArray();

		$locale = config('app.locale');
		$categoryList->transform(function ($item, $key) use($locale) {
			$item->posts = $item->posts->where('status', 'published');
			$item->post = $item->posts->count();
			unset($item->posts);

			if($locale == 'en'){
				$item['name'] = $item['name_en'];
				$item['slug'] = $item['slug_en'];
			}else{
				$item['name'] = $item['name_id'];
				$item['slug'] = $item['slug_id'];
			}

			unset($item['name_id']);
			unset($item['slug_id']);
			unset($item['name_en']);
			unset($item['slug_en']);
			unset($item['is_active']);

			return $item;
		});

		$data = [
			'categories' => $categoryList,
			'years' => $yearList
		];

		return $this->respondWithSuccess($data);
	}
	/* #endregion */

	/* #region indexYears */
	public function indexYears(Request $request)
	{
		$yearList = ModelsBlog::where('is_active', 1)
			->orderBy('created_at', 'DESC')
			->get('created_at')
			->unique('created_at');
		$yearList = $yearList->map(function ($item, $key) {
			return (new Carbon($item['created_at']))->year;
		});
		return $this->respondWithSuccess($yearList);
	}
	/* #endregion */

	/* #region _getBlogData(...) */
	private function _getBlogData($page, $filter = [], $limit = null)
	{
		$locale = config('app.locale');
		$offset = BLOG_ITEM_LIMIT * ($page - 1);

		$blogList = ModelsBlog::offset($offset)
			->limit(!$limit ? BLOG_ITEM_LIMIT : $limit)
			->orderBy('id', 'DESC')
			->where('status', BLOG_STATUS_PUBLISHED);

		// join('blog_category', 'blog.category_id', '=', 'blog_category.id')
		// ->

		// add some logic here
		if (count($filter) > 0) {
			foreach ($filter as $k => $v) { 
				if ($k == 'category_slug') {
					if($locale == 'en') {
						$cat = BlogCategory::whereSlugEn($v)->first('id');
					}else{
						$cat = BlogCategory::whereSlugId($v)->first('id');
					}
					if (!$cat) continue;

					$blogList = $blogList->where('category_id', '=', $cat->id);
				} else {
					// $blogList = $blogList->whereYear($k, $v);
					$blogList = $blogList->where(DB::raw($k), $v);
				}
			}
		}

		// var_dump($blogList->toSql());
		$blogList = $blogList->get();

		if (count($blogList) > 0) {

			foreach ($blogList as $blog) {
				$categories = BlogCategory::whereId($blog->category_id)->get();
				$temp = [];
				$blog->year = date('Y', strtotime($blog->created_at));
				// var_dump($categories);

				foreach ($categories as $category) {
					if($locale == 'en') {
						array_push($temp, [
							'slug' => $category->slug_en,
							'name' => $category->name_en
						]);
					}else{
						array_push($temp, [
							'slug' => $category->slug_id,
							'name' => $category->name_id
						]);
					}
				}

				if($locale == 'en') {
					$blog->title = $blog->title_en;
					$blog->slug = $blog->slug_en;
					$blog->content = $blog->content_en;
				}else{
					$blog->title = $blog->title_id;
					$blog->slug = $blog->slug_id;
					$blog->content = $blog->content_id;
				}

				unset($blog->title_id);
				unset($blog->slug_id);
				unset($blog->content_id);
				unset($blog->title_en);
				unset($blog->slug_en);
				unset($blog->content_en);
				unset($blog->created_by);
				unset($blog->updated_by);
				unset($blog->approved_by);
				unset($blog->approved_at);
				unset($blog->status);

				$blog->categories = $temp;
				$_content = strip_tags($blog->content);
				// preg_replace('/\s+?(\S+)?$/', '', substr($_content, 0, 201));
				$blog->content_short = preg_replace('/\s+?(\S+)?$/', '', substr($_content, 0, 201));
			}

		}

		return $blogList;
	}
	/* #endregion */
}
