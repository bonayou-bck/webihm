<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // not authenticated -> redirect to login
            return redirect()->route('login');
        }

        $user = Auth::user();
        if (($user->role ?? '') !== 'admin') {
            // authenticated but not admin -> logout and redirect to login so user must re-authenticate
            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
