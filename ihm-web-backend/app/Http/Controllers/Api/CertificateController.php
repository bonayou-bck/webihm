<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{

  /* #region index */
  public function index(Request $request, $id = null)
  {
    $result = Certificate::with(['images'])
      ->where('is_active', '=', 1);
    $locale = config('app.locale');

    if($id) {
      $result->where('id', '=', $id);
      $result = $result->first();

      if($result) {
        if($locale == 'en'){
          $result['name'] = $result['name_en'];
          $result['description'] = $result['description_en'];
        }else{
          $result['name'] = $result['name_id'];
          $result['description'] = $result['description_id'];
        }
  
        unset($result['name_en']);
        unset($result['description_en']);
        unset($result['name_id']);
        unset($result['description_id']);
      }
    }else{
      $result = $result->get();
      $result->transform(function ($v, $k) use($locale) {
        if($locale == 'en'){
          $v['name'] = $v['name_en'];
          $v['description'] = $v['description_en'];
        }else{
          $v['name'] = $v['name_id'];
          $v['description'] = $v['description_id'];
        }
  
        unset($v['name_en']);
        unset($v['description_en']);
        unset($v['name_id']);
        unset($v['description_id']);

        unset($v['id']);
        unset($v['admin_id']);
        unset($v['showcase']);
        unset($v['is_active']);
        unset($v['created_at']);
        unset($v['updated_at']);

        $v['images']->transform(function($vv, $kk) {
          unset($vv['id']);
          unset($vv['certificate_id']);
          unset($vv['created_at']);

          return $vv;
        });
  
        return $v;
      });
    }

    return $this->respondWithSuccess($result);
  }
  /* #endregion */

}
