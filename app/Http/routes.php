<?php

	/*-----------------------------------ADMIN-----------------------------------*/
	Route::group(['domain' => env('ADMIN_DOMAIN')], function(){
		Route::group(['middleware' => 'guest:admin'], function(){
			//ログイン画面へ飛ばす
			Route::get('/', function () {
				return redirect('login');
			});
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
			Route::get('/', function () {
				return redirect('home');
			});
			Route::get('home','Admin\HomeController@index');
		});
		Route::get('/logout','Admin\AuthController@logout');

	});

	/*-----------------------------------STUDENT-----------------------------------*/
	Route::group(['domain' => env('STUDENT_DOMAIN')], function(){

		//student
		Route::group(['middleware' => 'guest:student'], function(){
			//ホーム画面へ飛ばす
			Route::get('/', function () {
				return view('student.welcome');
			});
			//ログイン
			Route::get('login','Student\AuthController@showLoginForm');
			Route::post('login','Student\AuthController@login');
			//会員登録
			Route::get('register','Student\AuthController@showRegistrationForm');
			Route::post('register','Student\AuthController@register');
			//パスワード
			Route::get('password/reset/{token?}', 'Student\PasswordController@showResetForm');
			Route::post('password/email', 'Student\PasswordController@sendResetLinkEmail');
			Route::post('password/reset', 'Student\PasswordController@reset');
		});

		//ログイン後の画面
		Route::group(['middleware' => 'auth:student'], function () { 
			Route::get('home','Student\HomeController@index');
		});
		//ログアウト
		Route::get('logout','Student\AuthController@logout');

	});