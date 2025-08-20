<?php

namespace App\Http\Controllers\admin;
use App\Models\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // Validasi minimal
        $data = $request->validate([
            'admin_id'        => 'nullable|integer',
            'name_id'         => 'required|string|max:255',
            'description_id'  => 'nullable|string',
            'name_en'         => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'logo'            => 'nullable|image|max:2048',
            'showcase'        => 'nullable|image|max:4096',
            'is_active'       => 'nullable|boolean',
        ]);

        // Simpan logo ke public/upload/sertifikat
        if ($request->hasFile('logo')) {
            $dir   = public_path('upload/sertifikat');
            if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
            $orig  = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $ext   = $request->file('logo')->getClientOriginalExtension();
            $fname = time().'-logo-'.Str::slug($orig).'.'.$ext;
            $request->file('logo')->move($dir, $fname);
            $data['logo'] = 'upload/sertifikat/'.$fname;
        }
        // Simpan showcase ke public/upload/sertifikat
        if ($request->hasFile('showcase')) {
            $dir   = public_path('upload/sertifikat');
            if (!is_dir($dir)) { @mkdir($dir, 0775, true); }
            $orig  = pathinfo($request->file('showcase')->getClientOriginalName(), PATHINFO_FILENAME);
            $ext   = $request->file('showcase')->getClientOriginalExtension();
            $fname = time().'-showcase-'.Str::slug($orig).'.'.$ext;
            $request->file('showcase')->move($dir, $fname);
            $data['showcase'] = 'upload/sertifikat/'.$fname;
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
        $cf->admin_id        = $request->admin_id;
        $cf->name_id         = $request->name_id;
        $cf->description_id  = $request->description_id;
        $cf->name_en         = $request->name_en;
        $cf->description_en  = $request->description_en;
        $cf->is_active       = $request->is_active ?? 0;

        // Logo
        if ($request->hasFile('logo')) {
            if ($cf->logo && file_exists(public_path($cf->logo))) {
                @unlink(public_path($cf->logo));
            }
            $dir   = public_path('upload/sertifikat');
            if (!is_dir($dir)) @mkdir($dir, 0775, true);
            $orig  = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
            $ext   = $request->file('logo')->getClientOriginalExtension();
            $fname = time().'-logo-'.Str::slug($orig).'.'.$ext;
            $request->file('logo')->move($dir, $fname);
            $cf->logo = 'upload/sertifikat/'.$fname;
        }
        // Showcase
        if ($request->hasFile('showcase')) {
            if ($cf->showcase && file_exists(public_path($cf->showcase))) {
                @unlink(public_path($cf->showcase));
            }
            $dir   = public_path('upload/sertifikat');
            if (!is_dir($dir)) @mkdir($dir, 0775, true);
            $orig  = pathinfo($request->file('showcase')->getClientOriginalName(), PATHINFO_FILENAME);
            $ext   = $request->file('showcase')->getClientOriginalExtension();
            $fname = time().'-showcase-'.Str::slug($orig).'.'.$ext;
            $request->file('showcase')->move($dir, $fname);
            $cf->showcase = 'upload/sertifikat/'.$fname;
        }

        $cf->save();
        return back()->with('success','Sertifikat berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cf = Certificate::findOrFail($id);
        // Hapus file logo jika ada
        if (!empty($cf->logo) && file_exists(public_path($cf->logo))) {
            @unlink(public_path($cf->logo));
        }
        // Hapus file showcase jika ada
        if (!empty($cf->showcase) && file_exists(public_path($cf->showcase))) {
            @unlink(public_path($cf->showcase));
        }
        $cf->delete();
        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus.');
    }
}
