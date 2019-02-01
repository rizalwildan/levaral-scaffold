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

// SuperAdmin Control Panel
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','role:administrator|superadministrator'], 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Users
    Route::resource('users', 'UsersController');
    Route::get('/get-users', 'UsersController@getUserData')->name('users-dt');

    // Roles
    Route::resource('roles', 'RolesController');
    Route::get('/get-roles', 'RolesController@getDataRoles')->name('roles-dt');

    // Permissions
    Route::resource('permissions', 'PermissionsController');
    Route::get('/get-permissions', 'PermissionsController@getDataPermissions')->name('permissions-dt');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
