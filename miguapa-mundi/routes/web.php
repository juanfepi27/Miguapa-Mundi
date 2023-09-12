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

Route::middleware('auth')->group(function () {
    Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
    Route::get('/news/search', 'App\Http\Controllers\NewsController@search')->name('news.search');
    Route::get('/news/show/{id}', 'App\Http\Controllers\NewsController@show')->name('news.show');
    Route::get('/countries', 'App\Http\Controllers\CountryController@index')->name('country.index');
    Route::get('/countries/create', 'App\Http\Controllers\CountryController@create')->name("country.create");
    Route::post('/countries/save', 'App\Http\Controllers\CountryController@save')->name("country.save");
    Route::get('/alliances', 'App\Http\Controllers\AllianceController@index')->name('alliance.index');
    Route::get('/alliances/create', 'App\Http\Controllers\AllianceController@create')->name("alliance.create");
    Route::post('/alliances/save', 'App\Http\Controllers\AllianceController@save')->name("alliance.save");
    Route::get('/offer/to-me', 'App\Http\Controllers\OfferController@toMe')->name('offer.toMe');
    Route::get('/offer/by-me', 'App\Http\Controllers\OfferController@byMe')->name('offer.byMe');
    Route::get('/offer/create', 'App\Http\Controllers\OfferController@create')->name('offer.create');
    Route::get('/offer/delete/{id}', 'App\Http\Controllers\OfferController@delete')->name('offer.delete');
    Route::get('/offer/accept/{id}', 'App\Http\Controllers\OfferController@accept')->name('offer.accept');
    Route::get('/offer/reject/{id}', 'App\Http\Controllers\OfferController@reject')->name('offer.reject');
    Route::post('/offer/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');
});

Route::middleware(['auth', 'role'])->group(function () {
    // Aquí defines tus rutas que requieren autenticación y el rol "admin"
});

Auth::routes();