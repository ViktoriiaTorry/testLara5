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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('v1/user/register', 'RegisterUserController@register')->middleware('auth:api');
Route::post('v1/users', 'AuthController@register')->middleware('auth:api');


Route::post('v1/note','noteController@store')->middleware('auth:api');
Route::post('v1/note/{id}', 'noteController@update')->middleware('auth:api');
Route::get('v1/notes}', 'apiController@list')->middleware('auth:api');
