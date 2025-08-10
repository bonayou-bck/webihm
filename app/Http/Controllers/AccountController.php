<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected $viewPath = 'app.account';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // setAlert('Test alert error :)', ALERT_ERROR);
        $data['userData'] = User::where('is_deleted', 0)->get();
        $data['userData']->transform(function($d, $k) {
            unset($d['email_verified_at']);
            unset($d['updated_at']);

            return $d;
        });

        return view($this->viewPath . '.account', $data);
    }

    public function postCreateEdit(Request $request, $id = null) {
        $rules = [
			'name' => 'required|string|max:30',
			'email' => 'required|string|email',
            'role' => 'required|string|max:10',
            'password' => 'required|string|min:8',
            'password-re' => 'required|string|same:password|min:8'
		];
		$input = [
			'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->input('password'),
            'password-re' => $request->input('password-re')
		];

        if($id != null) {
            unset($rules['email']);
            unset($rules['role']);
            unset($rules['password']);
            unset($rules['password-re']);
            unset($input['email']);
            unset($input['role']);
            unset($input['password']);
            unset($input['password-re']);
        }

        if (!Validator::make($input, $rules)->passes()) {
            unset($input['password']);
            unset($input['password-re']);

            $temp = $input;
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to create account, please check your inputs and try again.',
                'data' => $temp
            ]);
        }

        // on create
        if($id == null) {
            unset($input['password-re']);
            $input['password'] = Hash::make($input['password']);

            try{ 
                $result = User::insert($input);

                if($result) {
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_SUCCESS,
                        'message' => 'Account with role '. $input['role'] .' created.'
                    ]); 
                }else{
                    unset($input['password']);
                    unset($input['password-re']);

                    $temp = $input;
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_ERROR,
                        'message' => 'Failed to create account, please try again.',
                        'data' => $temp
                    ]);
                }
            }catch(QueryException $err) {
                unset($input['password']);
                unset($input['password-re']);
                
                $errorCode = $err->errorInfo[1];
                var_dump($errorCode);
                
                if($errorCode == 1062){
                    $temp = $input;
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_ERROR,
                        'message' => 'The email you entered '.$input['email'].' already exists.',
                        'data' => $temp
                    ]);
                }else{
                    $temp = $input;
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_ERROR,
                        'message' => 'Unknown database error, please contact your developer to solve this issue.',
                        'data' => $temp
                    ]);
                }
            }catch(Exception $err) {
                unset($input['password']);
                unset($input['password-re']);

                $temp = $input;
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to create account, please try again.',
                    'data' => $temp
                ]);
            }
        }else{
            try{ 
                $result = User::where('id', $id)->update($input);
                $email = User::find($id)->first()->email;

                if($result) {
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_SUCCESS,
                        'message' => 'Account with email '. $email .' updated.'
                    ]); 
                }else{
                    return redirect()->back()->with(SESSION_ALERT, [
                        'status' => ALERT_ERROR,
                        'message' => 'Failed to update account data, please try again.',
                        'data' => null
                    ]);
                }
            }catch(Exception $err) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to update account data, please try again.',
                    'data' => null
                ]);
            }
        }

    }

    public function postResetPassword(Request $request, $id) {
        $rules = [
            'password' => 'required|string|min:8',
            'password-re' => 'required|string|same:password|min:8'
		];
		$input = [
            'password' => $request->input('password'),
            'password-re' => $request->input('password-re')
		];

        $user = User::find($id)->first();

        if (!Validator::make($input, $rules)->passes()) {
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to reset password, please check your inputs and try again.',
                'data' => null
            ]);
        }

        // var_dump(Auth::id());
        // var_dump($id);
        // var_dump(Auth::id() == $id);
        // return;

        try{ 
            $password = Hash::make($input['password']);
            $result = User::where('id', $id)->update([
                'password' => $password
            ]);

            if($result) {
                // logout when current $id same as session user id
                if(Auth::id() == $id) {
                    Auth::logout();
                    redirect()->to(url('login'));
                }

                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Password with email '. $user->email .' has been changed.'
                ]); 
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to reset passowrd for '. $user->email .', please try again.',
                    'data' => null
                ]);
            }
        }catch(Exception $err) {
            // var_dump($err->getMessage());
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to update account '. $user->email .', please try again.',
                'data' => null
            ]);
        }
    }

    public function remove(Request $request, $id) {
        $user = User::find($id)->first();
        $data = [
            'email' => 'deleted',
            'password' => 'deleted',
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        // var_dump($user);

        // return;

        try{ 
            $result = User::where('id', $id)->update($data);

            if($result) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Account with email '. $user->email .' has been deleted.'
                ]); 
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to delete account '. $user->email .', please try again.',
                    'data' => null
                ]);
            }
        }catch(Exception $err) {
            // var_dump($err->getMessage());
            return redirect()->back()->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to update account '. $user->email .', please try again.',
                'data' => null
            ]);
        }
    }

}
