<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class ContactController extends Controller
{
    protected $viewPath = 'app.contact';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $contact = Contact::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        $social = ContactSocial::orderBy('id', 'DESC')
            ->get();

        return view($this->viewPath . '.contact', [
            'contact' => $contact,
            'social' => $social
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
        $contact = Contact::where('is_active', 1)
            ->where('id', $id)
            ->first();

        return view($this->viewPath . '.create', [
            'dataContact' => $contact,
            'mode' => 'edit'
        ]);
    }

    public function setFooter(Request $request, $id, $state) {
        // check is footer total more than 2
        $inFooter = Contact::where('is_active', 1)
            ->where('is_footer', 1)
            ->get();

        if($state == 1) {
            // Failed to set contacts in footer, maximum 2 contacts in the footer.
            if(count($inFooter) >= 2) return redirect()->to('contact')->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to set contacts in footer, maximum 2 contacts in the footer.',
                'data' => null
            ]);
        }

        $result = Contact::where('id', $id)->update([
            'is_footer' => $state
        ]);

        return redirect()->to('contact')->with(SESSION_ALERT, [
            'status' => $result ? ALERT_SUCCESS : ALERT_ERROR,
            'message' => $result ? 'Footer contacts updated.' : 'Failed to set contacts in footer.',
            'data' => null
        ]);
    }

    public function postCreate(Request $request, $id = null)
    {
        $rules = [
            'admin_id' => 'required',
            'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'address_id' => 'required|string',
            'address_en' => 'required|string',
            'email' => 'required|string|max:50',
            'telephone' => 'required|string|max:18',
            'fax' => 'required|string|max:18',
            'cover' => 'nullable|mimes:jpeg,png',
            'location_map' => 'required|string'
		];
		$input = [
            'admin_id' => $request->input('admin_id'),
            'name_id' => $request->input('name_id'),
            'name_en' => $request->input('name_en'),
            'address_id' => $request->input('address_id'),
            'address_en' => $request->input('address_en'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'fax' => $request->input('fax'),
            'cover' => $request->input('cover'),
            'location_map' => $request->input('location_map')
		];

        // process image from filepond request data
        // ...
        $coverPath = null;
        if($input['cover']) {
            $coverPath = uploadImageFilepond(
                $input['cover'], 
                base64_encode('contact_'.$input['name_id']).'_'.uniqid(), 
                'uploads-contact',
                false
            );
            $input['cover'] = $coverPath;
        }else{
            unset($input['cover']);
        }

        if($id == null) {
            // var_dump($input);
            $result = Contact::insert($input);
            // return;
            
            if($result) {
                return redirect()->to('contact')->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'New contact created.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to create contact, please try again.',
                    'data' => null
                ]);
            }
        }else{
            $result = Contact::where('id', $id)->update($input);

            if($result) {
                return redirect()->to('contact')->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'Contact updated.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to update contact, please try again.',
                    'data' => null
                ]);
            }
        }

    }
    
    public function postSocialUpdate(Request $request)
    {
        $raw = $request->all();
        $currentSocial = ContactSocial::get(['name']);
        $currentSocial->transform(function($item, $k) {
            $_item = $item['name'];
            return $_item;
        });
        $currentSocial = $currentSocial->toArray();
        $dataKey = array_keys($raw);
        $usedKey = array_intersect($currentSocial, $dataKey);

        foreach($usedKey as $key) {
            $link = $request->input($key);

            $row = ContactSocial::where('name', $key);
            $row->update(['link' => $link]);
        }

        return redirect()->to('contact')->with(SESSION_ALERT, [
            'status' => ALERT_SUCCESS,
            'message' => 'Contact social updated.',
            'data' => null
        ]);
    }

    public function delete(Request $request, $id) {
        // check is footer total more than 2
        $result = Contact::where('id', $id)
            ->update([
                'is_active' => 0
            ]);

        if($result) {
            return redirect()->to('contact')->with(SESSION_ALERT, [
                'status' => ALERT_SUCCESS,
                'message' => 'Contact deleted.',
                'data' => null
            ]);
        }else{
            return redirect()->to('contact')->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to delete contact, please try again.',
                'data' => null
            ]);
        }
    }

}
