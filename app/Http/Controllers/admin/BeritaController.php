<?php

namespace App\Http\Controllers\admin;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::get();
        return view('admin.berita', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi minimal
        $data = $request->validate([
            'title_id'   => 'required|string|max:255',
            'title_en'   => 'nullable|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'nullable|string',
            'status'     => 'nullable|string|max:50', // contoh: published/draft
            'cover'      => 'nullable|image|max:2048', // jpg/png/webp, dll
        ]);

        // Slug otomatis dari judul
        $data['slug_id'] = Str::slug($data['title_id']);
        $data['slug_en'] = !empty($data['title_en']) ? Str::slug($data['title_en']) : null;

        // Simpan cover ke public/upload/berita (path yang disimpan di DB: upload/berita/xxx.jpg)
        if ($request->hasFile('cover')) {
            $dir   = public_path('upload/berita');
            if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
            $orig  = pathinfo($request->file('cover')->getClientOriginalName(), PATHINFO_FILENAME);
            $ext   = $request->file('cover')->getClientOriginalExtension();
            $fname = time().'-'.Str::slug($orig).'.'.$ext;
            $request->file('cover')->move($dir, $fname);
            $data['cover'] = 'upload/berita/'.$fname; // relatif dari public/
        }

        // (Opsional) simpan user pembuat jika ada auth
        if (auth()->check() && schema()->hasColumn('blogs','created_by')) {
            $data['created_by'] = auth()->id();
        }

        Blog::create($data);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu berita (JSON) untuk modal Edit.
     */
    public function show(string $id)
    {
        $row = Blog::findOrFail($id);
        return response()->json($row);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        // Hapus file cover jika ada
        if (!empty($blog->cover) && file_exists(public_path($blog->cover))) {
            @unlink(public_path($blog->cover));
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
