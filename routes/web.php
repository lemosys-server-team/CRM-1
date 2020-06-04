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



Auth::routes(['verify' => false,'register' => false]);

Route::get('/{url?}', function(){
	return redirect('login');
})->where(['url' => '|home'])->name('home');

Route::group(['middleware' => ['auth']], function(){
	Route::get('access-denied', function(){
		return view('access-denied');
	})->name('access-denied');

		Route::resource('profile', 'ProfileController')->only(['index', 'store']);
        Route::group(['middleware' => ['check_permission'],'namespace'=>'Admin','prefix'=>'admin', 'as' => 'admin.'], function(){	

		Route::get('dashboard', 'DashboardController@index')->name('dashboard');
		
		Route::resource('profile', 'ProfileController')->only(['index', 'store']);

		Route::resource('settings', 'SettingsController')->only(['index', 'store']);

		// For Users
		Route::resources([
			'users' => 'UsersController',
		]);
        Route::post('users/getUsers', 'UsersController@getUsers')->name('users.getUsers');
		Route::get('users/status/{user_id}', 'UsersController@status')->name('users.status');	

		// For Users
		
		Route::resource('product_categories', 'ProductCategories')->except(['show']);
		Route::post('product_categories/getProductCategories', 'ProductCategories@getProductCategories')->name('product_categories.getProductCategories');
        Route::get('product_categories/status/{id}', 'ProductCategories@status')->name('product_categories.status');

        	
		// For Countries
		Route::resource('countries', 'Countries')->except(['show']);
		Route::post('countries/list', 'Countries@getCountries')->name('countries.getCountries');
		Route::get('countries/status/{id}', 'Countries@status')->name('countries.status');				

		// For Cities
		Route::resource('cities', 'Cities')->except(['show']);
		Route::post('cities/list', 'Cities@getCities')->name('cities.getCities');
		Route::get('cities/status/{id}', 'Cities@status')->name('cities.status');
		Route::get('cities/updateDLS/{id}', 'Cities@updateDLS')->name('cities.updateDLS');	

	});

});