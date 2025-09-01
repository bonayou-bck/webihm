<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Fasilitas_img;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    public function index()
    {
        $rows = Fasilitas::get();
        // dd($rows);
        return view('admin.fasilitas', compact('rows'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'images' => 'nullable|array|max:5', // maksimal 5 images
            'images.*' => 'image|max:2048|mimes:jpg,jpeg,png,webp',
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:500',
        ]);

        // Simpan cover
        if ($request->hasFile('cover')) {
            $coverPath = $this->moveToPublicUpload($request->file('cover'), 'fasilitas/cover');
            $data['cover'] = $coverPath; // hasilnya "upload/Fasilitas/cover/xxxxx.jpg"
        }

        // Simpan data utama
        $fasilitas = \App\Models\Fasilitas::create($data);

        // Simpan images beserta caption
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                $path = $this->moveToPublicUpload($image, 'fasilitas/detail');
                $caption = $request->captions[$i] ?? null;
                $fasilitas->fasilitas_img()->create([
                    'src' => $path,
                    'caption' => $caption,
                    'fasilitas_id' => $fasilitas->id,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $row = Fasilitas::with('fasilitas_img')->findOrFail($id);
        // dd($row);
        return response()->json($row);
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'images' => 'nullable',
            'images.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'delete_ids' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $slug = trim($data['slug'] ?? '');
            if ($slug === '') {
                $slug = $fasilitas->slug ?: Str::slug($data['title']);
            }
            if ($slug !== $fasilitas->slug) {
                $slug = $this->uniqueSlug($slug, $fasilitas->id);
            }

            if ($request->hasFile('cover')) {
                $this->deletePublicFileIfExists($fasilitas->cover);
                $fasilitas->cover = $this->moveToPublicUpload($request->file('cover'), 'fasilitas/cover');
            }

            $fasilitas->title = $data['title'];
            $fasilitas->slug = $slug;
            $fasilitas->content = $data['content'] ?? null;
            $fasilitas->save();

            if (!empty($data['delete_ids'])) {
                $ids = collect(explode(',', $data['delete_ids']))
                    ->filter()
                    ->map('intval')
                    ->all();
                if (!empty($ids)) {
                    $imgs = fasilitas_img::where('id_fasilitas', $fasilitas->id)->whereIn('id', $ids)->get();
                    foreach ($imgs as $img) {
                        $this->deletePublicFileIfExists($img->src);
                        $img->delete();
                    }
                }
            }

            // update captions for existing images if provided
            $captionsExisting = $request->input('captions_existing', []);
            if (is_array($captionsExisting) && count($captionsExisting) > 0) {
                foreach ($captionsExisting as $imgId => $cap) {
                    $img = fasilitas_img::where('id_fasilitas', $fasilitas->id)->where('id', $imgId)->first();
                    if ($img) {
                        $img->caption = $cap;
                        $img->save();
                    }
                }
            }

            $files = $this->collectFiles($request, 'images');
            Log::info('Fasilitas update files count', ['count' => count($files)]);

            if (count($files) > 0) {
                $existing = fasilitas_img::where('id_fasilitas', $fasilitas->id)->count();
                if ($existing + count($files) > 5) {
                    return redirect()->back()->withInput()->with('error', 'Maksimal total 5 gambar (existing + baru).');
                }
                // accept captions[] for newly uploaded images
                $newCaptions = $request->input('captions', []);
                foreach ($files as $idx => $file) {
                    if (!$file instanceof UploadedFile || !$file->isValid()) {
                        Log::warning('Invalid uploaded file skipped');
                        continue;
                    }
                    $publicRelative = $this->moveToPublicUpload($file, 'fasilitas/detail');
                    fasilitas_img::create([
                        'id_fasilitas' => $fasilitas->id,
                        'src' => $publicRelative,
                        'caption' => $newCaptions[$idx] ?? null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'fasilitas berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update fasilitas failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $keb = Fasilitas::findOrFail($id);

            $this->deletePublicFileIfExists($keb->cover);

            $imgs = fasilitas_img::where('id_fasilitas', $keb->id)->get();
            foreach ($imgs as $img) {
                $this->deletePublicFileIfExists($img->src);
                $img->delete();
            }

            $keb->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data fasilitas beserta gambar berhasil dihapus.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Destroy fasilitas failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    protected function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = Str::slug($base);
        $orig = $slug;
        $i = 1;
        while (Fasilitas::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '<>', $ignoreId))->exists()) {
            $slug = $orig . '-' . $i;
            $i++;
        }
        return $slug;
    }

    protected function collectFiles(Request $request, string $key): array
    {
        $files = $request->file($key);
        if (!$files) {
            return [];
        }
        return is_array($files) ? array_values(array_filter($files)) : [$files];
    }

    protected function moveToPublicUpload(UploadedFile $file, string $subdir): string
    {
        $subdir = trim($subdir, '/');
        $targetDir = base_path('upload' . DIRECTORY_SEPARATOR . $subdir);
    
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0775, true);
        }
    
        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $name = (string) Str::uuid() . '.' . $ext;
        $file->move($targetDir, $name);
    
        // path relatif untuk disimpan ke DB
        return 'upload/' . $subdir . '/' . $name;
    }

    protected function deletePublicFileIfExists(?string $publicPath): void
    {
        if (!$publicPath) {
            return;
        }

        if (str_starts_with($publicPath, 'upload/')) {
            $relative = substr($publicPath, strlen('upload/'));
            if (Storage::disk('public')->exists($relative)) {
                Storage::disk('public')->delete($relative);
            }
            return;
        }

        $full = public_path($publicPath);
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
