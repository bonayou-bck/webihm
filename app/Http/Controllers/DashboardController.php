<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Keberlanjutan;
use App\Models\Fasilitas;
use App\Models\fasilitas_img;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $past = Blog::query()
            ->limit(5)
            ->orderbyDesc('updated_at')
            ->get();
        $features = Fasilitas::query()
            ->limit(3)
            ->orderByDesc('updated_at')
            ->get();
        // dd($features);
        // Ambil item + gambar (hanya kolom yang perlu)
        $kebs = Keberlanjutan::query()
            ->select('id', 'title', 'slug')
            ->with(['Keberlanjutan_img:id,keberlanjutan_id,src'])
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get();

        // Buat daftar filter berdasarkan TITLE
        // contoh: "Nursery" -> slug "nursery" -> class "filter-nursery"
        $filters = $kebs->map(function ($k) {
            $slug = $k->slug ?: Str::slug($k->title);
            return [
                'title' => $k->title,
                'slug'  => $slug,
                'class' => 'filter-' . $slug,
            ];
        })->unique('slug')->values();

        // Kartu portfolio: 1 kartu per GAMBAR milik setiap item
        $items = collect();
        foreach ($kebs as $k) {
            $filterClass = 'filter-' . ($k->slug ?: Str::slug($k->title));
            foreach ($k->Keberlanjutan_img as $img) {
                $items->push([
                    'img'          => asset($img->src),         // url gambar
                    'title'        => $k->title,                // judul untuk caption
                    'categoryText' => $k->title,                // teks kecil di bawah judul (boleh sama)
                    'filter_class' => $filterClass,             // dipakai Isotope
                    'lightbox'     => asset($img->src),         // url untuk GLightbox
                    'details_url'  => route('pages.keberlanjutan'), // link "More Details"
                ]);
            }
        }
        // dd($features);
        return view('dashboard', [
            'kebFilters' => $filters,
            'kebItems' => $items,
            'past' => $past,
            'features' => $features,
        ]);
    }
    public function berita()
    {
        $b = Blog::get();
        // dd($b);
        return view('pages.berita', compact('b'));
    }

    public function beritadetail($id)
    {
        $post = Blog::findOrFail($id);
        $terbaru = Blog::orderBy('created_at', 'desc')->limit(5)->get();
        // return view('pages.berita-detail', compact('post'));
        // dd($terbaru);
        return view('pages.berita-detail', compact('post', 'terbaru'));
    }

    public function analytics(Request $request)
    {
        return view('app.dashboard.dashboard-analytics');
    }

    public function sertifikat()
    {
        $ser = Certificate::get();
        return view('pages.sertifikat', compact('ser'));
    }

    public function keberlanjutan()
    {
        $keberlanjutanItems = \App\Models\Keberlanjutan::with('keberlanjutan_img')
            ->orderByDesc('updated_at')
            ->get();
        return view('pages.keberlanjutan', ['features' => $keberlanjutanItems]);
    }

    public function fasilitas()
    {
        $features = Fasilitas::with('fasilitas_img')->get();
        // dd($features);
        return view('pages.fasilitas', compact('features'));
    }

    // public function index(Request $request)
    // {
    //     return view('app.dashboard.dashboard-overview');
    // }
}
