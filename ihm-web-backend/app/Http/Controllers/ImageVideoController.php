<?php

namespace App\Http\Controllers;

use App\Models\CertificationLogo;
use App\Models\Cover;
use App\Models\Slide;
use App\Models\SlideGroup;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class ImageVideoController extends Controller
{
    protected $viewPath = 'app.image-video';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cover(Request $request)
    {
        $coverData = Cover::get();
        return view($this->viewPath . '.cover', [
            'cover' => $coverData
        ]);
    }

    public function coverUpload(Request $request)
    {
        $rules = [
			'id' => 'required',
            'src' => 'required|mimes:jpeg,png,mp4,webm',
		];
		$input = [
			'id' => $request->input('id'),
            'src' => $request->file('src')
		];

        if (!Validator::make($input, $rules)->passes()) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed, please check your input, all input are required.',
            'data' => null
        ]);

        $fileProps = [
            'ext' => '.'.$input['src']->extension(),
            'name' => base64_encode('cover') . '_' . base64_encode($input['id']),
            'type' => ''
        ];

        $fileProps['type'] = strpos('.mp4,.webm', $fileProps['ext']) === false ? 'image' : 'video';

        $fileName = $fileProps['name'].$fileProps['ext'];
        
        $r2 = $input['src']->storeAs('', $fileName, 'uploads-cover');

        // do update db
        $cover = Cover::find($input['id']);
        $cover->is_video = $fileProps['type'] == 'video' ? 1 : 0;
        $cover->src = parse_url(
            Storage::disk('uploads-cover')->url($fileName), PHP_URL_PATH
        );
        $cover->save();

        // return redirect()->back()->with('status-cover', [
        //     'code' => 200,
        //     'all' => true,
        //     'type' => 'add'
        // ]);
        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_SUCCESS,
            'message' => 'Cover images/video updated.',
            'data' => null
        ]);
    }

    public function slide(Request $request)
    {
        // ->where('group_id', 1)
        $coverData = Slide::with('group')
            ->where('is_active', 1)
            ->get();

        $coverData = $coverData->groupBy(['group.*.name', function($item, $k) {
            $d = $item['group'][0]['name'];
            unset($item['group']);
            return $d;
        }], preserveKeys: false);

        // return $this->respondWithSuccess($coverData);
        return view($this->viewPath . '.slide', [
            'slideData' => $coverData
        ]);
    }

    public function slideRemove(Request $request, $id = null) {
        if(!$id) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed, please check your input, all input are required.',
            'data' => null
        ]);

        $slide = Slide::find($id);
        $slide->is_active = 0;
        $result = $slide->save();

        $file = Slide::where('id', $id)->first()['src'];

        if($file) {
            $file = str_replace('/storage/', 'app/public/', $file);
            $file = storage_path($file);

            if(fileExists($file)) {
                unlink($file);

                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Image deleted.',
                    'data' => null
                ]);
            }
        }

        // return redirect()->back()->with('status-home-slide', [
        //     'code' => 200,
        //     'all' => true,
        //     'type' => 'delete'
        // ]);

        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed to remove image, please try again.',
            'data' => null
        ]);
    }

    public function slideUpload(Request $request, $groupId = null)
    {
        $photos = $request->input('home-slide');

        if(!$groupId) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed, please check your input, all input are required.',
            'data' => null
        ]);

        $group = SlideGroup::find($groupId)->first();
        if(!$group) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed, please check your input, all input are required.',
            'data' => null
        ]);

        $groupName = $group['name'];
        $uploaded = [];

        // var_dump(Storage::disk('uploads-slides')->url(''));

        foreach($photos as $k => $image) {
            if($image) {
                $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $replace = substr($image, 0, strpos($image, ',')+1); 
    
                // find substring fro replace here eg: data:image/png;base64,
                $img = str_replace($replace, '', $image); 
                $img = str_replace(' ', '+', $img); 
                $imgName = base64_encode($groupName) . '_' . uniqid() . '.' . $extension;

                try {
                    Storage::disk('uploads-slides')->put($imgName, base64_decode($img));

                    $path = Storage::disk('uploads-slides')->url($imgName);
                    array_push($uploaded, [
                        'group_id' => $groupId,
                        'src' => parse_url($path, PHP_URL_PATH)
                    ]);
                }catch(Exception $err) {
                    // error don't do anything here
                }
            }else{
                // remove null
                unset($photos[$k]);
            }
        }

        $allUploadedd = (count($uploaded) == count($photos));

        // do save to db
        Slide::insert($uploaded);

        // return redirect()->back()->with('status-home-slide', [
        //     'code' => 200,
        //     'all' => $allUploadedd,
        //     'type' => 'add'
        // ]);

        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_SUCCESS,
            'message' => $allUploadedd ? 'Image uploaded.' : 'Image uploaded, but some image failed to upload.',
            'data' => null
        ]);
    }

    public function certLogo(Request $request)
    {
        $coverData = CertificationLogo::where('is_active', 1)
            ->get();

        return view($this->viewPath . '.certificate-logo', [
            'slideData' => $coverData
        ]);
    }

    public function certLogoRemove(Request $request, $id = null) {
        if(!$id) return redirect()->back();

        $slide = CertificationLogo::find($id);
        $slide->is_active = 0;
        $result = $slide->save();

        $file = CertificationLogo::where('id', $id)->first()['src'];

        if($file) {
            $file = str_replace('/storage/', 'app/public/', $file);
            $file = storage_path($file);

            if(fileExists($file)) {
                unlink($file);

                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Certification logo deleted.',
                    'data' => null
                ]);
            }
        }

        // return redirect()->back()->with('status-certification-logo', [
        //     'code' => 200,
        //     'all' => true,
        //     'type' => 'delete'
        // ]);
        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed to remove certification logo, please try again.',
            'data' => null
        ]);
    }

    public function certLogoUpload(Request $request, $groupId = null)
    {
        $photos = $request->input('logo');
        $uploaded = [];

        foreach($photos as $k => $image) {
            if($image) {
                $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
                $replace = substr($image, 0, strpos($image, ',')+1); 
    
                // find substring fro replace here eg: data:image/png;base64,
                $img = str_replace($replace, '', $image); 
                $img = str_replace(' ', '+', $img); 
                $imgName = base64_encode('certification-logo') . '_' . uniqid() . '.' . $extension;

                try {
                    Storage::disk('uploads-certification-logo')->put($imgName, base64_decode($img));

                    $path = Storage::disk('uploads-certification-logo')->url($imgName);
                    array_push($uploaded, [
                        'src' => parse_url($path, PHP_URL_PATH)
                    ]);
                }catch(Exception $err) {
                    // error don't do anything here
                }
            }else{
                // remove null
                unset($photos[$k]);
            }
        }

        $allUploadedd = (count($uploaded) == count($photos));

        // do save to db
        CertificationLogo::insert($uploaded);

        // return redirect()->back()->with('status-certification-logo', [
        //     'code' => 200,
        //     'all' => $allUploadedd,
        //     'type' => 'add'
        // ]);
        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_SUCCESS,
            'message' => $allUploadedd ? 'Certification logo updated.' : 'Certification logo updated, but some logo failed to upload.',
            'data' => null
        ]);
    }

    public function video(Request $request)
    {
        $coverData = Video::with('group')
            ->where('is_active', 1)
            ->get();
        
        $coverData = $coverData->groupBy(['group.*.name', function($item, $k) {
            $d = $item['group'][0]['name'];
            unset($item['group']);
            return $d;
        }], preserveKeys: false);

        // return $this->respondWithSuccess($coverData);

        return view($this->viewPath . '.video', [
            'slideData' => $coverData
        ]);
    }

    public function videoRemove(Request $request, $id = null) {
        if(!$id) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Failed, please check your input, all input are required.',
            'data' => null
        ]);

        $slide = Video::find($id);
        $slide->is_active = 0;
        $result = $slide->save();

        $file = Video::where('id', $id)->first();
        $photo = $file['cover'];
        $video = $file['video'];

        if($photo && $video) {
            $filePhoto = str_replace('/storage/', 'app/public/', $photo);
            $fileVideo = str_replace('/storage/', 'app/public/', $video);
            $filePhoto = storage_path($filePhoto);
            $fileVideo = storage_path($fileVideo);

            if(fileExists($filePhoto)) {
                unlink($filePhoto);
            }

            if(fileExists($fileVideo)) {
                unlink($fileVideo);
            }
        }

        // return redirect()->back()->with('status-video', [
        //     'code' => 200,
        //     'all' => true,
        //     'type' => 'delete'
        // ]);
        return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_SUCCESS,
            'message' => 'Video profile deleted.',
            'data' => null
        ]);
    }

    public function videoUpload(Request $request, $groupId = null, $id = null)
    {
        // name, position (description)
        // photo, video
        $rules = [
			'name' => 'required|string|max:255',
			'description' => 'required|string|max:255',
            // 'photo' => 'required|mimes:jpeg,png,webp',
            // 'video' => 'required|mimes:mp4,webm'
            'photo' => $id == null ? 'required|string' : 'nullable|string',
            'video' => $id == null ? 'required|string' : 'nullable|string'
		];
		$input = [
			'name' => $request->input('name'),
			'description' => $request->input('description'),
            'photo' => $request->input('photo'),
            'video' => $request->input('video')
		];

        if (!Validator::make($input, $rules)->passes()) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => $id == null ? 
                'Failed, please check your input, all input are required.' : 
                'Failed, please try again',
            'data' => null
        ]);

        if($id != null) {
            $current = Video::find($id);
            
            $videoData = explode('/', $current->video);
            $videoData = $videoData[count($videoData) - 1];
            $photoData = explode('/', $current->cover);
            $photoData = $photoData[count($photoData) - 1];

            $videoData = [
                'name' => explode('.', $videoData)[0],
                'ext' => explode('.', $videoData)[1]
            ];
            $photoData = [
                'name' => explode('.', $photoData)[0],
                'ext' => explode('.', $photoData)[1]
            ];
        }

        if($input['photo']) {
            $photoValue = json_decode($input['photo']);
            $photoProps = [
                'ext' => '.' . explode('/', $photoValue->type)[1],
                'name' => base64_encode('photo'.$input['name']) . '_' . uniqid()
            ];
            $photoFilename = $photoProps['name'].$photoProps['ext'];

            // begin upload
            if($id == null) {
                uploadImageFilepond($input['photo'], $photoProps['name'], 'uploads-video', false);
            }else{
                // update
                uploadImageFilepond($input['photo'], $photoData['name'], 'uploads-video', false, $photoData['ext']);
            }
        }
        
        if($input['video']) {
            $videoValue = json_decode($input['video']);
            $videoProps = [
                'ext' => '.' . explode('/', $videoValue->type)[1],
                'name' => base64_encode('video'.$input['name']) . '_' . uniqid()
            ];    
            $videoFilename = $videoProps['name'].$videoProps['ext'];

            // begin upload
            if($id == null) {
                uploadImageFilepond($input['video'], $videoProps['name'], 'uploads-video', false);
            }else{
                uploadImageFilepond($input['video'], $videoData['name'], 'uploads-video', false, $videoData['ext']);
            }
        }

        // save to db
        $data = [
            'video_group_id' => $groupId,
            'name' => $input['name'],
            'description' => $input['description']
        ];

        // create
        if($id == null) {
            if(isset($photoFilename)) {
                $data['cover'] = parse_url(
                    Storage::disk('uploads-video')->url($photoFilename), PHP_URL_PATH
                );
            }
    
            if(isset($videoFilename)) {
                $data['video'] = parse_url(
                    Storage::disk('uploads-video')->url($videoFilename), PHP_URL_PATH
                );
            }

            // do save to db
            $result = Video::insert($data);

            if($result) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'New video profile created.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to create video profile, please try again.',
                    'data' => null
                ]);
            }
        }
        // update
        else{
            $result = Video::where('id', $id)
                ->update($data);

            if($result) {
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Video profile updated.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to update video profile, please try again.',
                    'data' => null
                ]);
            }
        }

    }

}
