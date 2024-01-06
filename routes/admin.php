<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(attributes: ['prefix' => 'auth', 'namespace' => 'Auth'], routes: static function () {
    Route::get(uri: 'login', action: 'LoginController@showLoginForm')->name(name: 'login');
    Route::post(uri: 'login', action: 'LoginController@login')->name(name: 'login.post');
    Route::post(uri: 'logout', action: 'LoginController@logout')->name(name: 'logout');
});

Route::group(attributes: ['middleware' => 'auth:admin'], routes: static function () {
    Route::get(uri: '/', action: static function () {
        return redirect()->route(route: 'admin.dashboard');
    });
    Route::get(uri: 'dashboard', action: 'DashboardController@index')->name(name: 'dashboard');
    Route::get(uri: 'search-user', action: 'UsersController@searchForUsers')->name(name: 'search.user');
    Route::get(uri: 'task/indexData', action: 'TasksController@indexData')->name(name: 'task.index.data');
    Route::resource(name: 'task', controller: 'TasksController', options: ['except' => ['delete', 'update']]);
});
