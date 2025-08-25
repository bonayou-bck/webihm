<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Keberlanjutan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::count();
        $certificate = Certificate::count();
        $keberlanjutan = Keberlanjutan::count();
        $fasilitas = Fasilitas::count();
        // dd($blog);
        return view('admin.dashboard', compact('blog','certificate','keberlanjutan','fasilitas'));
    }
}
