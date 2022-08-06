<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@store');
Route::get('thank-you', function(){
	return view('thank-you');
});

Route::get('admin/login', 'Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Auth\LoginController@login')->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'Admin\DashboardController@index');

	Route::group(['prefix' => 'users'], function(){
		Route::get('/', 'Admin\UsersController@index');
		// Route::get('view/{id}', 'Admin\UsersController@view');
		Route::get('create', 'Admin\UsersController@create');
		Route::post('create', 'Admin\UsersController@store');
		Route::get('edit/{id}', 'Admin\UsersController@edit');
		Route::post('edit/{id}', 'Admin\UsersController@update');
		Route::get('delete/{id}', 'Admin\UsersController@delete');
	});

	Route::group(['prefix' => 'questions'], function(){
		Route::get('/', 'Admin\QuestionsController@index');
		Route::get('view/{id}', 'Admin\QuestionsController@view');
		Route::get('create', 'Admin\QuestionsController@create');
		Route::post('create', 'Admin\QuestionsController@store');
		Route::get('edit/{id}', 'Admin\QuestionsController@edit');
		Route::post('edit/{id}', 'Admin\QuestionsController@update');
		Route::get('delete/{id}', 'Admin\QuestionsController@delete');
	});

	Route::group(['prefix' => 'participants'], function(){
		Route::get('/', 'Admin\ParticipantsController@index');
		Route::get('view/{id}', 'Admin\ParticipantsController@view');
		Route::get('delete/{id}', 'Admin\QuestionsController@delete');
	});

	Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');
});