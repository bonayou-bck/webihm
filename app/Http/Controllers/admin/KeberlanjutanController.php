<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Keberlanjutan;
use App\Models\Keberlanjutan_img;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KeberlanjutanController extends Controller
{
    public function index()
    {
        $rows = Keberlanjutan::query()
            ->withCount('Keberlanjutan_img')
            ->orderByDesc('id')
            ->get();
        // dd($rows);
        return view('admin.keberlanjutan', compact('rows'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'cover'   => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'images'  => 'nullable|array|max:5', // maksimal 5 images
            'images.*' => 'image|max:2048|mimes:jpg,jpeg,png,webp',
            'descriptions' => 'nullable|array',
            'descriptions.*' => 'nullable|string|max:500',
        ]);

        // Simpan cover
        if ($request->hasFile('cover')) {
            $data['cover'] = $this->moveToPublicUpload($request->file('cover'), 'keberlanjutan/cover');
        }

        // Simpan data utama
        $keberlanjutan = Keberlanjutan::create($data);

        // Simpan images beserta description
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $image) {
                $path = $this->moveToPublicUpload($image, 'keberlanjutan/detail');
                $desc = $request->descriptions[$i] ?? null;

                $keberlanjutan->keberlanjutan_img()->create([
                    'src' => $path,
                    'description' => $desc,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }


    public function show($id)
    {
        $row = Keberlanjutan::with('Keberlanjutan_img')->findOrFail($id);
        return response()->json($row);
    }

    public function update(Request $request, $id)
    {
        $item = Keberlanjutan::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'images' => 'nullable',
            'images.*' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
            'delete_ids' => 'nullable|string',
            'descriptions_existing' => 'nullable|array',
            'descriptions_existing.*' => 'nullable|string|max:500',
            'descriptions' => 'nullable|array',
            'descriptions.*' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            $slug = trim($data['slug'] ?? '');
            if ($slug === '') {
                $slug = $item->slug ?: Str::slug($data['title']);
            }
            if ($slug !== $item->slug) {
                $slug = $this->uniqueSlug($slug, $item->id);
            }

            if ($request->hasFile('cover')) {
                $this->deletePublicFileIfExists($item->cover);
                $item->cover = $this->moveToPublicUpload($request->file('cover'), 'keberlanjutan/cover');
            }

            $item->title = $data['title'];
            $item->slug = $slug;
            $item->content = $data['content'] ?? null;
            $item->save();

            if (!empty($data['delete_ids'])) {
                $ids = collect(explode(',', $data['delete_ids']))
                    ->filter()
                    ->map('intval')
                    ->all();
                if (!empty($ids)) {
                    $imgs = Keberlanjutan_img::where('keberlanjutan_id', $item->id)->whereIn('id', $ids)->get();
                    foreach ($imgs as $img) {
                        $this->deletePublicFileIfExists($img->src);
                        $img->delete();
                    }
                }
            }

            $descriptionsExisting = $request->input('descriptions_existing', []);
            if (is_array($descriptionsExisting) && count($descriptionsExisting) > 0) {
                foreach ($descriptionsExisting as $imgId => $desc) {
                    $img = Keberlanjutan_img::where('keberlanjutan_id', $item->id)->where('id', $imgId)->first();
                    if ($img) {
                        $img->description = $desc;
                        $img->save();
                    }
                }
            }

            $files = $this->collectFiles($request, 'images');
            if (count($files) > 0) {
                $existing = Keberlanjutan_img::where('keberlanjutan_id', $item->id)->count();
                if ($existing + count($files) > 5) {
                    return redirect()->back()->withInput()->with('error', 'Maksimal total 5 gambar (existing + baru).');
                }
                $newDescriptions = $request->input('descriptions', []);
                foreach ($files as $idx => $file) {
                    if (!$file instanceof UploadedFile || !$file->isValid()) {
                        continue;
                    }
                    $publicRelative = $this->moveToPublicUpload($file, 'keberlanjutan/detail');
                    Keberlanjutan_img::create([
                        'keberlanjutan_id' => $item->id,
                        'src' => $publicRelative,
                        'description' => $newDescriptions[$idx] ?? null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Keberlanjutan berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update Keberlanjutan failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $keb = Keberlanjutan::findOrFail($id);

            $this->deletePublicFileIfExists($keb->cover);

            $imgs = Keberlanjutan_img::where('keberlanjutan_id', $keb->id)->get();
            foreach ($imgs as $img) {
                $this->deletePublicFileIfExists($img->src);
                $img->delete();
            }

            $keb->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data keberlanjutan beserta gambar berhasil dihapus.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Destroy Keberlanjutan failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal menghapus data: '.$e->getMessage());
        }
    }
    
    protected function deletePublicFileIfExists(?string $publicPath): void
    {
        if (!$publicPath || !str_starts_with($publicPath, 'upload/')) {
            return;
        }
    
        $fullPath = base_path($publicPath);
        if (is_file($fullPath)) {
            @unlink($fullPath);
        }
    }


    protected function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = Str::slug($base);
        $orig = $slug;
        $i = 1;
        while (Keberlanjutan::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '<', $ignoreId))->exists()) {
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

    return 'upload/' . $subdir . '/' . $name;
    }
}
