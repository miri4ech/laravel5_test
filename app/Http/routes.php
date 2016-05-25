<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//一覧表示・新規追加
Route::resource('events', 'Admin\EventController');
Route::post('events', 'Admin\EventController@store');

//編集画面
Route::get('events/edit/{id}','Admin\EventController@edit');
Route::post('events/update/{id}','Admin\EventController@update');

//削除画面
Route::post('events/destroy/{id}','Admin\EventController@destroy');

//詳細表示
Route::get('events/show/{id}','Admin\EventController@show');


// /*-認証-*/
// // Authentication routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
 
// // Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

/*認証*/
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin/login', ['middleware' => 'auth', 'uses' => 'HomeController@index'
    // $auth = Auth::guard('admin');
    // $credentials = [
    //     'email' => 'admin1@example.com',
    //     'password' => 'password',
    // ];
 
    // return $auth->attempt($credentials) ? 'Admin Success' : 'Admin Failure';
]);
 
// Route::get('/user/login', function() {
//     $auth = Auth::guard('users');
//     $credentials = [
//         'email' => 'user1@test.com',
//         'password' => 'password',
//     ];
 
//     return $auth->attempt($credentials) ? 'User Success' : 'User Failure';
// });

Route::group(['middleware' => 'guest:users'], function()
 {
     Route::get('login', 'Auth\AuthController@getLogin');
     Route::post('login', 'Auth\AuthController@postLogin');
     // Route::get('signup', 'SignupController@getSignup');
     // Route::post('signup', 'SignupController@postSignup');
     // Route::get('password/email', 'PasswordController@getEmail');
     // Route::post('password/email', 'PasswordController@postEmail');
     // Route::get('password/reset/{token}', 'PasswordController@getReset');
     // Route::post('password/reset', 'PasswordController@postReset');
 });

 Route:: group(['prefix' => 'admin', 'middleware' => 'auth:users'], function() {
     Route::get('index', 'user\MemberController@getIndex');
     Route::get('password', 'user\MemberController@getPassword');
     Route::post('password', 'user\MemberController@postPassword');
     Route::get('profile', 'user\MemberController@getProfile');
     Route::post('profile', 'ser\MemberController@postProfile');
     Route::get('logout', 'user\AuthController@getLogout');
 });
