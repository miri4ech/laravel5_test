<?php

	// Route::get('/', function () {
	// 	return view('admin_gentelella.dashboard');
	// });

	//一覧表示・新規追加
	// Route::resource('events', 'Admin\EventController');
	// Route::post('events', 'Admin\EventController@store');

	// //編集画面
	// Route::get('events/edit/{id}','Admin\EventController@edit');
	// Route::post('events/update/{id}','Admin\EventController@update');

	// //削除画面
	// Route::post('events/destroy/{id}','Admin\EventController@destroy');

	// //詳細表示
	// Route::get('events/show/{id}','Admin\EventController@show');


	/*認証*/
	Route::group(['middleware' => 'web'], function () {

		//admin
		Route::group(['middleware' => 'guest:admin'], function () { 
			Route::get('/admin/login','Admin\AuthController@showLoginForm');
			Route::post('/admin/login','Admin\AuthController@login');
		});
		Route::group(['middleware' => 'auth:admin'], function () { 
			Route::get('/admin/home','Admin\HomeController@index');
		});
		Route::get('/admin/logout','Admin\AuthController@logout');

		//users
		Route::group(['middleware' => 'guest:users'], function () { 
			Route::get('/login','Auth\AuthController@showLoginForm');
			Route::post('/login','Auth\AuthController@login');
		});
		Route::group(['middleware' => 'auth'], function () { 
			Route::get('/home','HomeController@index');
		});
		Route::get('/logout','Auth\AuthController@logout');
		
	});

	/*--------------サブドメインのドメイン切り替え--------------*/
	Route::group(['domain' => 'admin.homestead.app'], function(){
		Route::get('/', function () {
			return view('admin.dashboard');
		});
	});

	Route::group(['domain' => 'homestead.app'], function(){
		Route::get('/', function () {
			return view('student.login');
		});
	});
