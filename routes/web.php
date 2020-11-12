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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'TigerController@index')->name('posts');
Route::get('/create', 'TigerController@create')->name('create');
Route::post('/create', 'TigerController@store')->name('store');
Route::get('/edit/{id}', 'TigerController@edit')->name('edit');
Route::post('/edit/{id}', 'TigerController@update')->name('update');

Route::get('/delete/{id}', 'TigerController@destroy')->name('postdelete');

Route::get('/show/{id}', 'TigerController@show')->name('show');

Route::get('/user/{id}', 'UserController@show')->name('profile');

Route::get('/category-create', 'CategoryController@create')->name('catcreate');
Route::Post('/category-create', 'CategoryController@store')->name('catstore');
Route::get('/category-edit/{id}', 'CategoryController@edit')->name('catedit');
Route::post('/category-edit/{id}', 'CategoryController@update')->name('catupdate');
Route::get('/category-delete/{id}', 'CategoryController@destroy')->name('catdelete');

