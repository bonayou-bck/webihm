<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * (dibiarkan sesuai kode kamu)
     */
    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('app.auth.login');
    }

    /**
     * Redirect setelah logout → ke halaman login.
     */
    protected function loggedOut(Request $request)
    {
        return redirect()->route('login'); // atau: return redirect('/login');
    }
}
