<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('homepage', 'App\Http\Controllers\API\HomepageController@all');
Route::get('about', 'App\Http\Controllers\API\AboutController@all');
Route::get('faq', 'App\Http\Controllers\API\FaqController@all');
Route::get('background', 'App\Http\Controllers\API\BackgroundController@all');

