<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');

        return view('url');

    }

    public function postIndex(Request $request) {

        $validator = Validator::make($request->input(), array(
            'url' => 'required|url',
            'password' => 'max:25'
        ));

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new \App\UrlModel();
        $data->url = $request->input('url');
        if ($request->input('password') != NULL){
            $data->password = Hash::make($request->input('password'));
        } else{
            $data->password = "";
        }
        if(!auth()->guest()) {
            $data->user_id = auth()->user()->id;
        }



        do {
            $valid = true;
            $short = str_random(6);

            if(\App\UrlModel::whereShort($short)->count() > 0) {
                $valid = false;
            }

        } while($valid != true);

        $data->short = $short;
        $data->save();

        return redirect(action('HomeController@getAfterSave', ['short' => $data->short]));

    }

    public function confirmPassword(Request $request, $url_id){
        $validator = Validator::make($request->input(), array(
            'password' => 'required|max:25'
        ));

        if($validator->fails()) {
            return redirect()->back();
        } 
        $data = \App\UrlModel::find($url_id);
        if (Hash::check($request->password, $data->password)){
            return redirect($data->url);
        } else {
            
        }

    }

    public function getAfterSave($short) {

        $data = [];
        $data['url_entry'] = \App\UrlModel::whereShort($short)->first();

        return view('after_save', $data);

    }

    public function myUrls() {
        //$data['urls'] = \App\UrlModel::whereUserId(auth()->user()->id)->get();
        $data['urls'] = auth()->user()->urls;
        $data['inactive_urls'] = auth()->user()->urls()->withTrashed()->where('deleted_at','!=', NULL)->get();

        return view('my_urls', $data);
    }

    public function deleteUrl($url_id) {

        $url = \App\UrlModel::find($url_id);

        if($url->user_id != auth()->user()->id) {
            abort(403);
        }

        $url->delete();

        return redirect()->back();

    }
}
