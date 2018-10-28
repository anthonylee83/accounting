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
Route::get('/admin/users/{deleted?}', 'Admin\UserController@showUsers');
Route::delete('/admin/user', 'Admin\UserController@disableUser');
Route::put('/admin/user', 'Admin\UserController@updateUser');
Route::get('/logs/users', function () {
    abort(404);
})->name('users');
Route::get('/logs/log', 'Admin\LoginLog@index')->name('login-log');
Route::get('/logs/eventlog', 'Admin\EventLogController@index')->name('event-log');
Route::get('/logs/users', 'Admin\UserLogController@index')->name('user-log');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@create');
Route::get('/accounts/search/{id}', 'Accounts\ChartOfAccounts@search');
Route::get('/accounts/new', 'Accounts\ChartOfAccounts@newAccount');
Route::get('/accounts/{deleted?}', 'Accounts\ChartOfAccounts@showAccounts')->where(['deleted' => '[a-zA-Z]+']);
Route::post('/accounts', 'Accounts\ChartOfAccounts@storeAccount');
Route::get('/accounts/{id}', 'Accounts\ChartOfAccounts@showAccount');
Route::put('/accounts/{id}', 'Accounts\ChartOfAccounts@updateAccount');
Route::delete('/accounts/{id}', 'Accounts\ChartOfAccounts@deleteAccount');
Route::patch('/accounts/{id}', 'Accounts\ChartOfAccounts@reactivateAccount');
Route::get('/journal', 'JournalController@index');
Route::post('/journal', 'JournalController@store');
Route::get('/journal/approve/{id}', 'JournalController@approve');
Route::get('/journal/decline/{id}', 'JournalController@decline');
Route::get('/journal/approval', 'ApprovalController@index');
Route::get('/ledger', 'LedgerController@showAccounts');
Route::get('/ledger/{id}', 'LedgerController@showTransactions');


