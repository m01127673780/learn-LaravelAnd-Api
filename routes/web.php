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



 Route::get('test','NewsController@test' );
 Route::post('test/1', function(Illuminate\Http\Request $request){
     return $request->all();
 });
Route::group(['middleware'=> 'news'],function(){

Route::get('all/news','NewsController@all_news');
Route::post('insert/news','NewsController@insert_news');
Route::delete('del/news/{id?}','NewsController@delete');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> 'guest'],function(){
Route::get('manual/login', 'Users@login_get');
Route::post('manual/login', 'Users@login_post');
});    