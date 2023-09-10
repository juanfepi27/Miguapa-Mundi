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
Route::get('/offer/to-me', 'App\Http\Controllers\OfferController@toMe')->name('offer.toMe');
Route::get('/offer/by-me', 'App\Http\Controllers\OfferController@byMe')->name('offer.byMe');
Route::get('/offer/create', 'App\Http\Controllers\OfferController@create')->name('offer.create');
Route::get('/offer/delete/{id}', 'App\Http\Controllers\OfferController@delete')->name('offer.delete');
Route::get('/offer/accept/{id}', 'App\Http\Controllers\OfferController@accept')->name('offer.accept');
Route::get('/offer/reject/{id}', 'App\Http\Controllers\OfferController@reject')->name('offer.reject');
Route::post('/offer/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');

Auth::routes();