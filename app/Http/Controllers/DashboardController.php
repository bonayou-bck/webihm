<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        return view('dashboard');
    }
    public function berita()
    {
        $b = Blog::get();
        return view('pages.berita', compact('b'));
    }

    public function analytics(Request $request)
    {
        return view('app.dashboard.dashboard-analytics');
    }

    // public function index(Request $request)
    // {
    //     return view('app.dashboard.dashboard-overview');
    // }

}
