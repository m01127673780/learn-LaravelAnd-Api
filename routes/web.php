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
Route::pattern('id' ,'[0-9]+');

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/route', function (Illuminate\Support\Facades\Request $request) {
    return $request::segments();
});



 Route::get('test','NewsController@test' );
 Route::post('test/1', function(Illuminate\Http\Request $request){
     return $request->all();
 });
 Route::get('all/news','NewsController@all_news');

Route::group(['middleware'=> 'news'],function(){

Route::post('insert/news','NewsController@insert_news');
Route::delete('del/news/{id?}','NewsController@delete');
});

Route::get('/home', 'HomeController@index')->name('home');
 Auth::routes();





// /////Login As User///// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// /////End  Login As User///// 



// /////Login As Admin/////   
// Password Reset Routes...
Route::get('admin/ password/reset', 'Auth/AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/ password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset');
// ///// End Login As Admin///// 
