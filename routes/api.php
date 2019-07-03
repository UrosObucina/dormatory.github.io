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
Route::get('/users/', 'UserController@getAll')->middleware('student');
Route::get('/users/{id}', 'UserController@getOne');
Route::get('/delete/users/{id}', 'UserController@delete');
Route::post('/user/login', 'UserController@login');
Route::post('/insert/users/', 'UserController@insertUser');
//room
Route::get('/user/room/', 'UserController@userRoom');
Route::get('/insert/user/room/', 'UserController@insertUserRoom');
Route::get('/update/user/room/', 'UserController@updateUserRoom');
Route::get('/insert/floor/room/', 'RoomController@insertRoomFloor');
Route::get('/insert/room/', 'RoomController@insertRoom');
Route::get('/get/floor/room/', 'RoomController@getRoom');
Route::get('/delete/room/', 'RoomController@deleteRoom');
//block
Route::get('/get/block/', 'BlockController@getAll');
Route::get('/get/block/{id}', 'BlockController@getOne');
Route::get('/insert/block/', 'BlockController@insertBlock');
Route::get('/update/block/', 'BlockController@updateBlock');
Route::get('/delete/block/', 'BlockController@deleteBlock');
Route::get('/insert/block/floors/', 'BlockController@insertBlockFloors');
//floor
Route::get('/get/floor/', 'FloorController@getAll');
Route::get('/get/floor/{id}', 'FloorController@getOne');
Route::get('/insert/floor/', 'FloorController@insertFloor');
Route::get('/delete/floor/', 'FloorController@deleteFloor');
// damage
Route::get('/get/damage/', 'DamageController@getAll');
Route::get('/get/damage/{id}', 'DamageController@getOne');
Route::get('/insert/damage/', 'DamageController@insertDamage');
Route::get('/delete/damage/{id}', 'DamageController@deleteDamage');
Route::get('/update/damage/', 'DamageController@updateDamage');

// stock
Route::get('/insert/stock/', 'StockController@insertStock');
Route::get('/update/stock/{id}', 'StockController@updateStock');
Route::get('/delete/stock/{id}', 'StockController@deleteStock');

// delivery
Route::get('/get/delivery/', 'DeliveryNoteController@getAll');
Route::get('/get/delivery/{id}', 'DeliveryNoteController@getOne');
Route::get('/insert/delivery/', 'DeliveryNoteController@insertDelivery');

// material requirement
Route::get('/insert/material/','MaterialRequirementController@insertMaterialRequirement');
Route::get('/get/user/material/','MaterialRequirementController@getUserRequirement');
Route::get('/delete/material/','MaterialRequirementController@delete');

Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});