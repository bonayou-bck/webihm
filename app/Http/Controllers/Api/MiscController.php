<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog as ModelsBlog;
use App\Models\BlogCategory;
use App\Models\CertificationLogo;
use App\Models\Cover;
use App\Models\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MiscController extends Controller
{

	public function getCover(Request $request, $type)
	{
		$result = Cover::where('type', $type)
			->first();
		
		return $this->respondWithSuccess($result);
	}

	public function getCertificationLogo(Request $request)
	{
		$result = CertificationLogo::where('is_active', 1)
			->get();
		
		return $this->respondWithSuccess($result);
	}

	private function getSlide($type) {
		$result = Slide::where('group_id', $type)
			->where('is_active', 1)
			->get();

		$result->transform(function($item, $k) {
			unset($item['group_id']);
			unset($item['is_active']);
			unset($item['created_at']);
			unset($item['updated_at']);

			return $item;
		});

		return $result;
	}

	public function getSlideHome(Request $request)
	{
		return $this->respondWithSuccess(
			$this->getSlide(1)
		);
	}

	public function getSlideSustain(Request $request)
	{
		$result = [
			'section1' => $this->getSlide(2),
			'section2' => $this->getSlide(3),
			'section3' => $this->getSlide(5)
		];
		return $this->respondWithSuccess(
			$result
		);
	}

}
