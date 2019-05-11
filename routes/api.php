<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// ovde se pisu rute i drugacije se pozivaju JSON /api/users/ example
Route::get('/users', 'UserController@getAll');
Route::get('/users/{id}', 'UserController@getOne');
Route::get('/delete/users/{id}', 'UserController@delete');
Route::get('/user/room/', 'UserController@userRoom');
Route::get('/insert/user/room', 'UserController@insertUserRoom');
Route::get('/update/user/room', 'UserController@updateUserRoom');
Route::get('/insert/floor/room', 'RoomController@insertRoom');
Route::get('/get/floor/room', 'RoomController@getRoom');
Route::post('/insert/users/', 'UserController@insert');