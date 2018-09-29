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
    return redirect('login');
});

Auth::routes();

Route::get('/admin/user/{id}', 'Admin\UserController@viewUser');
Route::patch('/admin/user', 'Admin\UserController@activateUser');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/users/new', 'Admin\UserController@newUser');
Route::post('/admin/users/new', 'Admin\UserController@storeUser');
Route::get('/admin/users/{deleted?}' , 'Admin\UserController@showUsers');
Route::delete('/admin/user', 'Admin\UserController@disableUser');
Route::put('/admin/user', 'Admin\UserController@updateUser');
Route::post('/register', 'Auth\RegisterController@create');