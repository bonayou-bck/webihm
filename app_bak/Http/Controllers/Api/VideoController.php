<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Lang;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{

  /* #region index */
  public function home(Request $request)
  {
    $result = Video::where('is_active', '=', 1)
      ->where('video_group_id', 1)
      ->get();
    
    $result->transform(function($item, $k) {
      unset($item['is_active']);
      unset($item['video_group_id']);
      unset($item['created_at']);
      unset($item['updated_at']);
      unset($item['id']);
      
      return $item;
    });

    return $this->respondWithSuccess($result);
  }

  public function career(Request $request)
  {
    $result = Video::where('is_active', '=', 1)
      ->where('video_group_id', 2)
      ->get();
    
    $result->transform(function($item, $k) {
      unset($item['is_active']);
      unset($item['video_group_id']);
      unset($item['created_at']);
      unset($item['updated_at']);
      unset($item['id']);
      
      return $item;
    });

    return $this->respondWithSuccess($result);
  }
  /* #endregion */

}
