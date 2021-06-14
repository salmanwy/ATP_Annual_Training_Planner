<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');


//});
//Main Site



// CustomAuthentication


Route::get('/logout', 'App\Http\Controllers\MainController@logout')->name('logout');
Route::post('/login', 'App\Http\Controllers\MainController@check')->name('login');
//get

//post
Route::post('/register', 'App\Http\Controllers\MainController@save')->name('register');

Route::put('/update', 'App\Http\Controllers\MainController@update')->name('update');

Route::put('/updateuser', 'App\Http\Controllers\MainController@updateUser')->name('updateuser');

//dashboard-user

Route::group(['middleware'=>['auth']],function(){


		Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
		
		Route::get('/login', 'App\Http\Controllers\MainController@login')->name('login');

		Route::get('/register', 'App\Http\Controllers\MainController@register')->name('register');

		Route::get('/user/dashboard', 'App\Http\Controllers\MainController@userDashboard');

		Route::get('/admin/dashboard', 'App\Http\Controllers\MainController@adminDashboard');

		Route::get('admin/edit-profile/{id}', 'App\Http\Controllers\MainController@adminAccountEdit');

		Route::get('user/edit-profile/{id}', 'App\Http\Controllers\MainController@userAccountEdit');

		
});

//
Route::get('/generate', 'App\Http\Controllers\MainController@generate')->name('generate');

Route::get('/requirement', 'App\Http\Controllers\MainController@indexRequirement')->name('requirement');

Route::post('/requirement', 'App\Http\Controllers\MainController@saveRequirement')->name('requirement');

//all-users

Route::get('/all-users', 'App\Http\Controllers\MainController@allUsers')->name('all-users');