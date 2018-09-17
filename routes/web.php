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
Route::get('/admin/users' , 'Admin\UserController@showUsers');
Route::get('/admin/users/new', 'Admin\UserController@newUser');
Route::post('/admin/users/new', 'Admin\UserController@storeUser');
Route::delete('/admin/user', 'Admin\UserController@disableUser');
Route::put('/admin/user', 'Admin\UserController@updateUser');
Route::post('/admin/user/activate', 'Admin\UserController@activateUser');