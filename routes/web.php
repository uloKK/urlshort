<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@postIndex');
Route::get('/after-save/{short}', 'HomeController@getAfterSave');

Route::get('/my-urls', 'HomeController@myUrls')->middleware('auth');
Route::get('/my-urls/delete/{url_id}', 'HomeController@deleteUrl')->middleware('auth');
Route::get('/confirm_password/{url_id}', 'HomeController@confirmPassword');
Route::post('/confirm_password/{url_id}', 'HomeController@confirmPassword');

Route::get('/s/{short}', function($short) {
    $url = \App\UrlModel::whereShort($short)->first();

    if($url){
    	if (!$url->password) {
        	return redirect($url->url);
	    } else {
	    	return view('enter_pass', ['url'=>$url]);
	    }
}
    else{
        abort(404);
    }
    //return redirect($url->url);
});
