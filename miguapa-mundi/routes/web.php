<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\CountryController@index')->name('country.index');
Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
Route::get('/news/search', 'App\Http\Controllers\NewsController@search')->name('news.search');
Route::get('/news/show/{id}', 'App\Http\Controllers\NewsController@show')->name('news.show');
Route::get('/country/create', 'App\Http\Controllers\CountryController@create')->name("country.create");
Route::post('/country/save', 'App\Http\Controllers\CountryController@save')->name("country.save");
Route::get('/alliance', 'App\Http\Controllers\AllianceController@index')->name('alliance.index');
Route::get('/alliance/create', 'App\Http\Controllers\AllianceController@create')->name("alliance.create");
Route::post('/alliance/save', 'App\Http\Controllers\AllianceController@save')->name("alliance.save");   
