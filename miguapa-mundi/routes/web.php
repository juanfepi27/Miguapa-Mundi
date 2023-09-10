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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
Route::get('/news/search', 'App\Http\Controllers\NewsController@search')->name('news.search');
Route::get('/news/show/{id}', 'App\Http\Controllers\NewsController@show')->name('news.show');
Route::get('/countries', 'App\Http\Controllers\CountryController@index')->name('country.index');
Route::get('/countries/create', 'App\Http\Controllers\CountryController@create')->name("country.create");
Route::post('/countries/save', 'App\Http\Controllers\CountryController@save')->name("country.save");
