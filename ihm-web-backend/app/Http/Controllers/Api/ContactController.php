<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSocial;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

  /* #region index */
  public function index(Request $request, $isFooter = null)
  {
    $locale = config('app.locale');
    $result = Contact::where('is_active', '=', '1');

    if($isFooter) {
      $result->where('is_footer', '=', '1');
    }

    $result = $result->get();

    $result->transform(function($v, $k) use($locale) {
      if($locale == 'en'){
        $v['address'] = $v['address_en'];
        $v['name'] = $v['name_en'];
      }else{
        $v['address'] = $v['address_id'];
        $v['name'] = $v['name_id'];
      }

      unset($v['address_id']);
      unset($v['address_en']);
      unset($v['name_id']);
      unset($v['name_en']);

      return $v;
    });

    $social = ContactSocial::get();

    $data = [
      'contact' => $result,
      'social' => $social
    ];
    
    return $this->respondWithSuccess($data);
  }
  /* #endregion */

  /* #region postInsertJson */
  public function postInsert(Request $request)
  {
    $rules = [
      'data.*.admin_id' => '',
      'data.*.address_id' => 'string|max:255',
      'data.*.address_en' => 'string|max:255',
      'data.*.email' => 'nullable|string|max:50',
      'data.*.telephone' => 'nullable|string|max:20',
      'data.*.fax' => 'nullable|string|max:20',
      'data.*.cover' => 'nullable|string|max:255',
      'data.*.location_map' => 'nullable|string|max:320',
    ];
    $input = ['data' => $request->all()];
    // put into collection
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    try {
      Contact::insert($data->toArray());

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

  /* #region patchEdit */
  // data shape
  // {
  //   id
  //   admin_id
  //   address_id
  //   address_en
  //   email
  //   telephone
  //   fax
  //   cover
  //   location_map
  // }
  public function patchEdit(Request $request)
  {
    $rules = [
      'data' => ['required', 'array'],
      'data.*.id' => '',
      'data.*.admin_id' => '',
      'data.*.address_id' => 'string|max:255',
      'data.*.address_en' => 'string|max:255',
      'data.*.email' => 'nullable|string|max:50',
      'data.*.telephone' => 'nullable|string|max:20',
      'data.*.fax' => 'nullable|string|max:20',
      'data.*.cover' => 'nullable|string|max:255',
      'data.*.location_map' => 'nullable|string|max:320',
    ];
    $input = ['data' => $request->all()];
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    $dataId = $data->map(function ($v, $k) {
      return $v['id'];
    });
    $dataContent = $data->map(function ($v, $k) {
      unset($v['id']);
      return $v;
    })->toArray();

    $dataId->map(function ($v, $k) use ($dataContent) {
      $result = Contact::where('id', $v)
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

  public function delete(Request $request)
  {
    $rules = [
      'data' => ['required', 'array'],
      'data.*' => 'regex:/^[0-9]*$/'
    ];
    $input = ['data' => $request->all()];
    // put into collection
    $data = $input['data'];

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    try {
      Contact::whereIn('id', $data)
        ->update([
          'is_active' => 0
        ]);

      return $this->respondCreated([
        'message' => count($data) . " data deleted"
      ]);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
}
