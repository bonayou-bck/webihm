<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    /**
     * Tampilkan daftar fasilitas.
     */
    public function index()
    {
        $fasilitas = Fasilitas::query()
            ->orderByDesc('updated_at')
            ->get();

        return view('admin.fasilitas', compact('fasilitas'));
    }

    /**
     * Simpan fasilitas baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Upload foto (opsional) ke public/upload/fasilitas
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $this->moveToPublicUpload($request->file('foto'), 'fasilitas');
        }

        Fasilitas::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'foto'        => $fotoPath, // simpan path relatif: upload/fasilitas/xxx.jpg
        ]);

        return back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Detail fasilitas (JSON untuk modal edit via AJAX).
     */
    public function show(string $id)
    {
        $row = Fasilitas::findOrFail($id);
        return response()->json($row);
    }

    /**
     * Update fasilitas.
     */
    public function update(Request $request, string $id)
    {
        $row = Fasilitas::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Jika ada foto baru: hapus lama, simpan baru
        if ($request->hasFile('foto')) {
            $this->deletePublicFileIfExists($row->foto);
            $row->foto = $this->moveToPublicUpload($request->file('foto'), 'fasilitas');
        }

        $row->title       = $data['title'];
        $row->description = $data['description'] ?? null;
        $row->save();

        return back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    /**
     * Hapus fasilitas + fotonya.
     */
    public function destroy(string $id)
    {
        $row = Fasilitas::findOrFail($id);

        // Hapus file foto jika ada
        $this->deletePublicFileIfExists($row->foto);

        $row->delete();

        return back()->with('success', 'Fasilitas berhasil dihapus.');
    }

    /**
     * Pindahkan file ke public/upload/{subdir}, kembalikan path relatif (upload/subdir/filename.ext).
     */
    private function moveToPublicUpload(UploadedFile $file, string $subdir): string
    {
        $subdir    = trim($subdir, '/');
        $targetDir = public_path('upload' . DIRECTORY_SEPARATOR . $subdir);

        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0775, true);
        }

        $ext  = $file->getClientOriginalExtension() ?: 'jpg';
        $name = (string) Str::uuid() . '.' . $ext;

        $file->move($targetDir, $name);

        return 'upload/' . $subdir . '/' . $name; // contoh: upload/fasilitas/xxxx.jpg
    }

    /**
     * Hapus file relatif di bawah public (mis: upload/fasilitas/xxx.jpg).
     */
    private function deletePublicFileIfExists(?string $publicPath): void
    {
        if (!$publicPath) return;

        $full = public_path(ltrim($publicPath, '/'));
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
