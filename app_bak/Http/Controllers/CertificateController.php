<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\CertificateImage;
use App\Models\CertificationLogo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class CertificateController extends Controller
{
    protected $viewPath = 'app.certificate';

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:' . USER_ROLE_SUPER);
    }

    public function index(Request $request)
    {
        $data = Certificate::with(['images'])
            ->where('is_active', '=', 1)
            ->get();

        return view($this->viewPath . '.certificate', [
            'tableData' => $data
        ]);
    }

    public function create(Request $request)
    {
        return view($this->viewPath . '.create', [
            'mode' => 'create'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $certificate = Certificate::with('images')
            ->where('is_active', 1)
            ->where('id', $id)
            ->first();

        return view($this->viewPath . '.create', [
            'dataCertificate' => $certificate,
            'mode' => 'edit'
        ]);
    }

    public function postCreate(Request $request, $id = null) {
        $rules = [
			'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
			'description_id' => 'nullable|string',
            'description_en' => 'nullable|string',
            'photo' => 'array|nullable',
            'image_to_remove' => 'nullable|string'
		];
		$input = [
			'name_id' => $request->input('name_id'),
            'name_en' => $request->input('name_en'),
			'description_id' => $request->input('description_id'),
            'description_en' => $request->input('description_en'),
            'photo' => $request->input('photo'),
            'image_to_remove' => $request->input('image_to_remove')
		];

        if (!Validator::make($input, $rules)->passes()) return redirect()
            ->back()
            ->with('status-certificate', [
            'code' => 400,
            'all' => true,
            'type' => 'add',
            'err' => 'all field is required'
        ]);

        // create
        if($id == null) {
            unset($input['image_to_remove']);
            $photoPaths = [];

            try {
                // var_dump($input);
                if($input['photo']) {
                    foreach($input['photo'] as $p) {
                        $photo = json_decode($p);
                        $ext = '.'.explode('/', $photo->type)[1];
                        $fileName = base64_encode('certificate').'_'.uniqid().$ext;
                        Storage::disk('uploads-certificate')->put($fileName, base64_decode($photo->data));
                        $path = Storage::disk('uploads-certificate')->url($fileName);
    
                        array_push(
                            $photoPaths,
                            parse_url($path, PHP_URL_PATH)
                        );
                    }
                }
                unset($input['photo']);
    
                // insert certificate
                $resultId = Certificate::insertGetId($input);
    
                // var_dump($resultId);
                if($resultId) {
                    // insert photos
                    foreach($photoPaths as $path) {
                        CertificateImage::insert([
                            'src' => $path,
                            'certificate_id' => $resultId
                        ]);
                    }
                }
    
                return redirect()->back()->with('status-certificate', [
                    'code' => 200,
                    'all' => true,
                    'type' => 'add',
                    'message' => 'Certificate created.'
                ]);
            }catch(Exception $err) {
                if(count($photoPaths) > 0) {
                    foreach($photoPaths as $path) {
                        $file = str_replace('/storage/', 'app/public/', $path);
                        $file = storage_path($file);
        
                        if(fileExists($file)) {
                            unlink($file);
                        }
                    }
                }
                return redirect()->back()->with('status-certificate', [
                    'code' => 400,
                    'all' => false,
                    'type' => 'add',
                    'err' => json_encode($err)
                ]);
            }
        }
        // update
        else {
            $fileRemoveFailed = [];
            $imageRemoveIds = array_filter(explode(',', $input['image_to_remove']));
            
            if(count($imageRemoveIds) > 0) {
                foreach ($imageRemoveIds as $imgRemoveId) {
                    $imageData = CertificateImage::find($imgRemoveId);
    
                    // begin remove
                    $src = $imageData->src;
                    $id = $imageData->certificate_id;
    
                    $imageData->certificate_id = null;
                    $imageData->src = 'removed-ref:' . $id . ':' . time();
    
                    try {
                        // remove image file
                        $file = str_replace('/storage/', 'app/public/', $src);
                        $file = storage_path($file);
    
                        if(fileExists($file)) {
                            unlink($file);
                        }
                    }catch(Exception $err) {
                        array_push($fileRemoveFailed, $src);
                    }
                }
            }

            unset($input['image_to_remove']);
            unset($input['photo']);
            Certificate::where('id', $id)
                ->update($input);

            return redirect()->back()->with('status-certificate', [
                'code' => 200,
                'all' => true,
                'type' => 'update',
                'err' => count($fileRemoveFailed) > 0 ? 'Some files fail to delete, you can ignore them or delete them manually.' : '',
                'errData' => $fileRemoveFailed,
                'message' => 'Certificate data updated.'
            ]);
        }
    }

    public function toggleInactive(Request $request, $id)
    {
        $result = Certificate::where('id', $id)
            ->update([
                'is_active' => 0
            ]);

        return redirect()->to('certificate')->with(SESSION_ALERT, [
            'status' => $result ? ALERT_SUCCESS : ALERT_ERROR,
            'message' => $result ? 'Certificate deleted.' : 'Failed to delete certificate, please try again.',
            'data' => null
        ]);
    }

}
