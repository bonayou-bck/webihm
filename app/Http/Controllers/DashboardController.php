<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('app.dashboard.dashboard-overview');
    }

    public function analytics(Request $request)
    {
        return view('app.dashboard.dashboard-analytics');
    }

}
