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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('user', 'UserController', ['except' => ['destroy']]);
//Route::get('user/{id}/logicDelete', 'UserController@logicDelete');

Route::resource('category', 'CategoryController', ['except' => ['destroy']]);
Route::get('category/{id}/logicDelete', 'CategoryController@logicDelete');

Route::resource('scene', 'SceneController', ['except' => ['destroy']]);
Route::get('scene/{id}/logicDelete', 'SceneController@logicDelete');

Route::resource('music', 'MusicController', ['except' => ['destroy']]);
Route::get('music/{id}/logicDelete', 'MusicController@logicDelete');
Route::post('music/search', 'MusicController@search');
