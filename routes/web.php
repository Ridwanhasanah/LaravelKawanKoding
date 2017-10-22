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

// ========= POST Start =========

//=====Index
Route::get('/post','PostController@index')->name('post.index');

//===== Create
Route::get('/post/create','PostController@create')->name('post.create'); //->name('post.create') adalah nama alias
Route::post('/post/create','PostController@store')->name('post.store'); //->name('post.create') adalah nama alias

// ===== Edit
Route::get('/post/{post}/edit','PostController@edit')->name('post.edit'); //{id}/edit','PostController@edit')->name('post.edit');
Route::patch('/post/{post}/update','PostController@update')->name('post.update');//{id}/update','PostController@update')->name('post.update');

// ========= POST Start End=========
