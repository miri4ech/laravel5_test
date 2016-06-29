<?php

	/*-----------------------------------ADMIN-----------------------------------*/
	Route::group(['domain' => env('ADMIN_DOMAIN'), 'middleware' => 'web'], function(){

		Route::get('/', 'Admin\HomeController@index');

		//admin
		Route::group(['middleware' => 'guest:admin'], function () {
			//ログイン
			Route::get('login','Admin\AuthController@showLoginForm');
			Route::post('login','Admin\AuthController@login');
			//会員登録
			Route::get('register','Admin\AuthController@showRegistrationForm');
			Route::post('register','Admin\AuthController@register');
			//パスワード
			Route::get('password/reset/{token?}', 'Admin\PasswordController@showResetForm');
			Route::post('password/email', 'Admin\PasswordController@sendResetLinkEmail');
			Route::post('password/reset', 'Admin\PasswordController@reset');
		});
		Route::group(['middleware' => 'auth:admin'], function () { 
			Route::get('home','Admin\HomeController@index');
		});
		Route::get('/logout','Admin\AuthController@logout');


	});

	/*-----------------------------------STUDENT-----------------------------------*/
	Route::group(['domain' => env('STUDENT_DOMAIN')], function(){
		Route::get('/', function () {
			return view('student.login');
		});
	});