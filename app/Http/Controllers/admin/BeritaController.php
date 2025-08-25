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
            'slug_id'       => 'nullable|string|max:255',
            'slug_en'       => 'nullable|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'nullable|string',
            'status'     => 'nullable|string|max:50', // contoh: published/draft
            'cover'      => 'nullable|image|max:2048', // jpg/png/webp, dll
        ]);

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
        // if (auth()->check() && schema()->hasColumn('blogs','created_by')) {
        //     $data['created_by'] = auth()->id();
        // }

        Blog::create($data);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
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
    public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $blog->title_id   = $request->title_id;   // bebas kosong
    $blog->title_en   = $request->title_en;
    $blog->content_id = $request->content_id;
    $blog->content_en = $request->content_en;
    $blog->status     = $request->status;

    // JANGAN timpa slug kalau input kosong
    if ($request->filled('slug_id')) {
        $blog->slug_id = $request->slug_id;
    }
    if ($request->filled('slug_en')) {
        $blog->slug_en = $request->slug_en;
    }

    if ($request->hasFile('cover')) {
        if ($blog->cover && file_exists(public_path($blog->cover))) {
            @unlink(public_path($blog->cover));
        }
        $dir = public_path('upload/berita');
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        $fileName = time().'-'.$request->file('cover')->getClientOriginalName();
        $request->file('cover')->move($dir, $fileName);
        $blog->cover = 'upload/berita/'.$fileName;
    }

    $blog->save();
    return back()->with('success','Berita berhasil diperbarui');
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
