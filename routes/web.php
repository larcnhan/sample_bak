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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

// 注册
Route::get('signup', 'UsersController@create')->name('signup');
// 用户资源
Route::resource('users', 'UsersController');
// Route::get('/users', 'UsersController@index')->name('users.index'); // 列表
// Route::get('/users/{user}', 'UsersController@show')->name('users.show'); // 详细
// Route::get('/users/create', 'UsersController@create')->name('users.create'); // 新建
// Route::post('/users', 'UsersController@store')->name('users.store'); // 保存
// Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit'); // 编辑
// Route::patch('/users/{user}', 'UsersController@update')->name('users.update'); // 保存
// Route::delete('/users/{user}', 'UsersController@destory')->name('users.destory'); // 删除
