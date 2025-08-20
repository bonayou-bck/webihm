<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LangController extends Controller
{

  /* #region postGet */
  public function postGet(Request $request)
  {
    $rules = [
      'data' => ['required', 'array'],
      'data.*' => 'regex:/^[a-z0-9-]*$/'
    ];
    $input = ['data' => $request->all()];
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    $data->transform(function ($v, $k) {
      $v = ['lang_id', '=', $v];
      return $v;
    });
    $d1 = $data[0];
    $data->shift();

    try {
      $result = Lang::with(['group'])->where([$d1]);
      $data->each(function ($v, $k) use ($result) {
        $result->orWhere([$v]);
      });

      $result = $result->get();

      $locale = config('app.locale');
      $result->transform(function ($v, $k) use($locale) {
        $temp = $v['group'];
        $temp = $temp[0]['name'];
        unset($v['group']);

        if($locale == 'id') {
          $v['content'] = $v['content_id'];
        }else if($locale == 'en'){
          $v['content'] = $v['content_en'];
        }else{
          $v['content'] = $v['content_id'];
        }

        unset($v['content_en']);
        unset($v['content_id']);
        $v['group'] = $temp;
        return $v;
      });

      return $this->respondCreated($result);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
  /* #endregion */

  /* #region postInsertJson */
  public function postInsertJson(Request $request)
  {
    $rules = [
      'data.*.lang_id' => 'required',
      'data.*.content_id' => 'required',
      'data.*.content_en' => 'required',
      'data.*.group_id' => 'nullable'
    ];
    $input = ['data' => $request->all()];
    // put into collection
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    // add default group id = 1
    $data->transform(function ($item, $key) {
      if (!isset($item['group_id'])) $item['group_id'] = 1;
      return $item;
    });

    try {
      Lang::insert($data->toArray());

      return $this->respondCreated([
        'message' => count($data) . " data inserted"
      ]);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
  /* #endregion */

  /* #region postInsert */
  public function postInsert(Request $request)
  {
    $rules = [
      'lang_id' => 'required',
      'content_id' => 'required',
      'content_en' => 'required',
      'group_id' => 'nullable'
    ];
    $input = [
      'lang_id' => $request->input('lang_id'),
      'content_id' => $request->input('content_id'),
      'content_en' => $request->input('content_en'),
      'group_id' => $request->input('group_id')
    ];

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    try {
      if (!$input['group_id']) {
        $input['group_id'] = 1;
      }

      Lang::create($input);

      return $this->respondCreated([
        'message' => "data inserted"
      ]);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
  /* #endregion */

  /* #region patchEdit */
  /**
   * data shape:
   * [
   *  {
   *    lang_id,
   *    content_id,
   *    content_en,
   *    group_id
   *  }
   * ]
   */
  public function patchEdit(Request $request)
  {
    $rules = [
      'data' => ['required', 'array'],
      'data.*.lang_id' => 'regex:/^[a-z0-9-]*$/',
      'data.*.lang_id_update' => 'nullable|regex:/^[a-z0-9-]*$/',
      'data.*.content_id' => 'nullable|string',
      'data.*.content_en' => 'nullable|string',
      'data.*.group_id' => 'nullable'
    ];
    $input = ['data' => $request->all()];
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    $dataLangId = $data->map(function($v, $k) {
      return $v['lang_id'];
    });
    $dataContent = $data->map(function($v, $k) {
      if(isset($v['lang_id_update'])) {
        $v['lang_id'] = $v['lang_id_update'];
        unset($v['lang_id_update']);
      }
      return $v;
    })->toArray();
    // $dataContent = $data->toArray();

    // var_dump($dataContent);

    $dataLangId->map(function($v, $k) use($dataContent) {
      $result = Lang::where('lang_id', $v)
        ->update($dataContent[$k]);

      var_dump($result);
    });
    
    try {

      // $result = Lang::with(['group'])->where([$d1]);
      // $data->each(function($v, $k) use($result) {
      //   $result->orWhere([$v]);
      // });
      
      // $result = $result->get();
  
      // $result->transform(function($v, $k){
      //   $temp = $v['group'];
      //   $temp = $temp[0]['name'];
      //   unset($v['group']);
  
      //   $v['group'] = $temp;
      //   return $v;
      // });

      // return $this->respondCreated($result);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
  /* #endregion */

  public function delete(Request $request, $langid = null)
  {
    echo 'lang api works!';
    if (!$langid) return $this->respondError('bad parameters');
  }
}
