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
//测试页面
Route::get('/test/index', 'TestController@test');
Route::get('/test/index2','TestController@test2')->name('test2');

Route::get('/test/2','TestController@page2')->name('page2');
Route::get('/test/1','TestController@page1')->name('page1');



Route::get('/', 'HomeController@login')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('photo', 'PhotoController');
Route::resource('admin','AdminController');
Route::resource('role','RoleController');
Route::resource('photo/picture','PictureController');

Route::any('photo/picture/delete','PictureController@delete')->name('picture.delete');


