<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('login', 'Api\AuthController@loginPage')->name('login');
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:api'], function (){
    Route::get('roles', 'Api\SuperAdmin\RoleController@index');
    Route::post('roles', 'Api\SuperAdmin\RoleController@store');
    Route::get('permissions', 'Api\SuperAdmin\PermissionController@index');
    Route::post('permissions', 'Api\SuperAdmin\PermissionController@store');
    Route::post('role-permissions', 'Api\SuperAdmin\PermissionController@assignPermissionToRole');
    Route::get('assign-permission', 'Api\SuperAdmin\PermissionController@assignPermission');
    Route::post('tenant-permission', 'Api\SuperAdmin\PermissionController@tenantPermission');
});

Route::group(['prefix' => 'tenant', 'middleware' => 'auth:api'], function (){
    Route::get('roles', 'Api\Tenant\RoleController@index');
    Route::post('roles', 'Api\Tenant\RoleController@store');
    Route::get('permissions', 'Api\Tenant\PermissionController@index');
    Route::post('permissions', 'Api\Tenant\PermissionController@store');
    Route::post('assign-permission', 'Api\Tenant\PermissionController@assignPermission');
});

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'Api\UserController@index');
    Route::post('user', 'Api\UserController@store');
    Route::post('details', 'Api\AuthController@getDetails');
    Route::get('logout', 'Api\AuthController@logout');

    Route::get('task', 'Api\TaskController@index');
    Route::post('task', 'Api\TaskController@store');

    Route::get('store', 'Api\StoreController@index');
    Route::post('store', 'Api\StoreController@store');
});

// https://laravelcode.com/post/laravel-passport-create-rest-api-with-authentication

