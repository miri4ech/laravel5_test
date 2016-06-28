<?php

	/*-----------------------------------ADMIN-----------------------------------*/
	Route::group(['domain' => env('ADMIN_DOMAIN'), 'middleware' => 'guest:admin'], function(){
		Route::auth();

		//ログイン
		Route::get('/login','Admin\AuthController@showLoginForm');
		Route::post('/login','Admin\AuthController@login');
		//会員登録
		Route::get('/admin/register','Admin\AuthController@showRegistrationForm');
		Route::post('/register','Admin\AuthController@register');

		Route::group(['middleware' => 'auth:admin'], function () { 
			// Route::get('/home','Admin\HomeController@index');
			Route::get('/home', function () {
				return view('admin.dashboard');
			});
		});
		Route::get('/logout','Admin\AuthController@logout');

	});

	/*-----------------------------------STUDENT-----------------------------------*/
	Route::group(['domain' => env('STUDENT_DOMAIN')], function(){
		Route::get('/', function () {
			return view('student.login');
		});
	});