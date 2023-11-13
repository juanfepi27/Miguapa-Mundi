<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries-in-offer', 'App\Http\Controllers\Api\CountryApiController@inOffer')->name('api.country.inOffer');
Route::get('/news/generator', 'App\Http\Controllers\Api\NewsApiController@generator')->name('api.news.generator');