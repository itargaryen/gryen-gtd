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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/handicrafts/list', 'Api\HandicraftsController@handicraftList');

Route::get('/notices/wechat', 'Api\NoticesController@wechat');

Route::post('/pushtokindle', 'Api\PushToKindleController@index');
