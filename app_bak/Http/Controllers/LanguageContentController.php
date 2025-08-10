<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\LangGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageContentController extends Controller
{
    protected $viewPath = 'app.language-content';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $lang = Lang::with('group')
            ->where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        $lang->transform(function($item, $k) {
            $item['group_name'] = $item['group'][0]['name'];
            unset($item['group']);

            return $item;
        });
        // return $this->respondWithSuccess($lang);
        return view($this->viewPath . '.lc', compact('lang'));
    }

    public function create(Request $request)
    {
        $group = LangGroup::orderBy('id', 'DESC')
            ->get();

        return view($this->viewPath . '.create', [
            'group' => $group,
            'mode' => 'create'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $group = LangGroup::orderBy('id', 'DESC')
            ->get();
        $lang = Lang::where('id', $id)->first();

        return view($this->viewPath . '.create', [
            'group' => $group,
            'mode' => 'edit',
            'dataLang' => $lang
        ]);
    }

    public function postCreate(Request $request, $id = null) {
        // lang_id, content_id, content_en, group_id
        $rules = [
			'lang_id' => 'required|string|max:255',
			'content_id' => 'required|string',
            'content_en' => 'required|string',
            'group_id' => 'required'
		];
		$input = [
			'lang_id' => $request->input('lang_id'),
            'content_id' => $request->input('content_id'),
            'content_en' => $request->input('content_en'),
            'group_id' => $request->input('group_id'),
		];

        if (!Validator::make($input, $rules)->passes()) return redirect()->back()->with(SESSION_ALERT, [
            'status' => ALERT_ERROR,
            'message' => 'Error, please check your input to meet the requirement.',
            'data' => null
        ]);

        if($id == null) {
            $result = Lang::create($input);
    
            if($result) {
                return redirect()->to('language-content')->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'New language content created.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to create language content, please try again.',
                    'data' => null
                ]);
            }
        }else{
            $result = Lang::where('id', $id)
                ->update($input);
    
            if($result) {
                return redirect()->to('language-content')->with(SESSION_ALERT, [
                    'status' => ALERT_SUCCESS,
                    'message' => 'New language content updated.',
                    'data' => null
                ]);
            }else{
                return redirect()->back()->with(SESSION_ALERT, [
                    'status' => ALERT_ERROR,
                    'message' => 'Failed to update language content, please try again.',
                    'data' => null
                ]);
            }
        }

    }

    public function delete(Request $request, $id = null) {
        if(!$id) return redirect()->back()->with('status-lang', [
            'code' => 401,
            'all' => true,
            'type' => 'delete'
        ]);

        $lang = Lang::find($id);
        $lang->is_active = 0;
        $result = $lang->save();

        if($result) {
            return redirect()->to('language-content')->with(SESSION_ALERT, [
                'status' => ALERT_SUCCESS,
                'message' => 'Language content deleted.',
                'data' => null
            ]);
        }else{
            return redirect()->to('language-content')->with(SESSION_ALERT, [
                'status' => ALERT_ERROR,
                'message' => 'Failed to delete language content, please try again.',
                'data' => null
            ]);
        }

    }

}
