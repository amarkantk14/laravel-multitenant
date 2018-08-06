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
//
//Route::middleware('auth:api')->group(function () {
//
//    Route::get('user', 'Api\UserController@index');
//    Route::post('user', 'Api\UserController@store');
//    Route::get('logout', 'Api\AuthController@logout');
//    Route::post('get-details', 'Api\AuthController@getDetails');
//
//    Route::get('task', 'Api\TaskController@index');
//    Route::post('task', 'Api\TaskController@store');
//
//    Route::get('store', 'Api\StoreController@index');
//    Route::post('store', 'Api\StoreController@store');
//});
// Route::post('details', 'Api\AuthController@getDetails');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Api\AuthController@getDetails');
    Route::get('logout', 'Api\AuthController@logout');
});

