<?php

namespace App\Http\Controllers\admin;
use App\Models\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cf = Certificate::get();
        return view('admin.sertifikat', compact('cf'));
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
            'name_id'         => 'required|string|max:255',
            'description_id'  => 'nullable|string',
            'name_en'         => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'logo'            => 'nullable|image|max:2048',
            'showcase'        => 'nullable|image|max:4096',
            'is_active'       => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->moveToUpload($request->file('logo'), 'logo');
        }

        if ($request->hasFile('showcase')) {
            $data['showcase'] = $this->moveToUpload($request->file('showcase'), 'showcase');
        }

        Certificate::create($data);
        return redirect()->back()->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu berita (JSON) untuk modal Edit.
     */
    public function show(string $id)
    {
        $row = Certificate::findOrFail($id);
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
        $cf = Certificate::findOrFail($id);
        $cf->name_id        = $request->name_id;
        $cf->description_id = $request->description_id;

        if ($request->hasFile('logo')) {
            if ($cf->logo && file_exists(public_path($cf->logo))) {
                @unlink(public_path($cf->logo));
            }
            $cf->logo = $this->moveToUpload($request->file('logo'), 'logo');
        }

        if ($request->hasFile('showcase')) {
            if ($cf->showcase && file_exists(public_path($cf->showcase))) {
                @unlink(public_path($cf->showcase));
            }
            $cf->showcase = $this->moveToUpload($request->file('showcase'), 'showcase');
        }

        $cf->save();
        return back()->with('success', 'Sertifikat berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cf = Certificate::findOrFail($id);

        if (!empty($cf->logo) && file_exists(public_path($cf->logo))) {
            @unlink(public_path($cf->logo));
        }

        if (!empty($cf->showcase) && file_exists(public_path($cf->showcase))) {
            @unlink(public_path($cf->showcase));
        }

        $cf->delete();
        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus.');
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
}
