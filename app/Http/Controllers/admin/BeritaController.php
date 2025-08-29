<?php

namespace App\Http\Controllers\admin;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


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
        $data = $request->validate([
            'title_id'   => 'required|string|max:255',
            'slug_id'    => 'nullable|string|max:255',
            'content_id' => 'required|string',
            'status'     => 'nullable|string|max:50',
            'cover'      => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $this->moveToUpload($request->file('cover'), 'berita');
        }

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

        $blog->title_id   = $request->title_id;
        $blog->content_id = $request->content_id;
        $blog->status     = $request->status;

        if ($request->filled('slug_id')) {
            $blog->slug_id = $request->slug_id;
        }

        if ($request->hasFile('cover')) {
            if ($blog->cover && file_exists(base_path($blog->cover))) {
                @unlink(base_path($blog->cover));
            }
            $blog->cover = $this->moveToUpload($request->file('cover'), 'berita');
        }

        $blog->save();
        return back()->with('success', 'Berita berhasil diperbarui');
    }

    protected function moveToUpload(UploadedFile $file, string $subdir): string
    {
        $subdir = trim($subdir, '/');
        $targetDir = base_path('upload' . DIRECTORY_SEPARATOR . $subdir);

        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0775, true);
        }

        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $name = time() . '-' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $ext;

        $file->move($targetDir, $name);

        return 'upload/' . $subdir . '/' . $name;
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        if (!empty($blog->cover) && file_exists(base_path($blog->cover))) {
            @unlink(base_path($blog->cover));
        }

        $blog->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
