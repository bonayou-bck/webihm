<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSocial;
use App\Models\Lang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactSocialController extends Controller
{

  /* #region index */
  public function index(Request $request)
  {
    $rules = [
      'selected' => 'nullable|string'
    ];
    $input = [
      'selected' => $request->input('selected')
    ];

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'parameter error'
    );

    $result = ContactSocial::get();

    return $this->respondWithSuccess($result);
  }
  /* #endregion */

  /* #region postInsertJson */
  public function postInsert(Request $request)
  {
    $rules = [
      'data.*.name' => 'string|max:255',
      'data.*.link' => 'string|max:500'
    ];
    $input = ['data' => $request->all()];
    // put into collection
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    try {
      ContactSocial::insert($data->toArray());

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
      'data.*.is_active' => '',
      'data.*.name' => 'string|max:255',
      'data.*.link' => 'string|max:500'
    ];
    $input = ['data' => $request->all()];
    $data = collect($input['data']);

    if (!Validator::make($input, $rules)->passes()) return $this->respondError(
      'please fill all required fields'
    );

    try {
      $dataId = $data->map(function ($v, $k) {
        return $v['id'];
      });
      $dataContent = $data->map(function ($v, $k) {
        unset($v['id']);
        return $v;
      })->toArray();
  
      $dataId->map(function ($v, $k) use ($dataContent) {
        $result = ContactSocial::where('id', $v)
          ->update($dataContent[$k]);
      });

      return $this->respondWithSuccess(['message' => 'success']);
    } catch (Exception $err) {
      return response([
        'message' => 'insert database error',
        'error' => $err
      ], 400);
    }
  }
  /* #endregion */

  // unused
  /* #region delete */
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
  /* #endregion */
}
