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
Route::get('/countries/create', 'App\Http\Controllers\CountryController@create')->name('country.create');
Route::post('/countries/save', 'App\Http\Controllers\CountryController@save')->name('country.save');
Route::get('/alliances', 'App\Http\Controllers\AllianceController@index')->name('alliance.index');
Route::get('/alliances/create', 'App\Http\Controllers\AllianceController@create')->name('alliance.create');
Route::post('/alliances/save', 'App\Http\Controllers\AllianceController@save')->name('alliance.save');
Route::get('/offer/to-me', 'App\Http\Controllers\OfferController@toMe')->name('offer.toMe');
Route::get('/offer/by-me', 'App\Http\Controllers\OfferController@byMe')->name('offer.byMe');
Route::get('/offer/create', 'App\Http\Controllers\OfferController@create')->name('offer.create');
Route::get('/offer/delete/{id}', 'App\Http\Controllers\OfferController@delete')->name('offer.delete');
Route::get('/offer/accept/{id}', 'App\Http\Controllers\OfferController@accept')->name('offer.accept');
Route::get('/offer/reject/{id}', 'App\Http\Controllers\OfferController@reject')->name('offer.reject');
Route::get('/offer/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
Route::get('/admin/country', 'App\Http\Controllers\AdminController@countryIndex')->name('admin.country.index');
Route::get('/admin/country/create', 'App\Http\Controllers\AdminController@countryCreate')->name('admin.country.create');
Route::post('/admin/country/save', 'App\Http\Controllers\AdminController@countrySave')->name('admin.country.save');
Route::post('/admin/country/update', 'App\Http\Controllers\AdminController@countryUpdate')->name('admin.country.update');
Route::delete('/admin/country/delete', 'App\Http\Controllers\AdminController@countryDelete')->name('admin.country.delete');
Route::get('/admin/country/show/{id}', 'App\Http\Controllers\AdminController@countryShow')->name('admin.country.show');
Route::get('/admin/news', 'App\Http\Controllers\AdminController@newsIndex')->name('admin.news.index');
Route::get('/admin/news/create', 'App\Http\Controllers\AdminController@newsCreate')->name('admin.news.create');
Route::post('/admin/news/save', 'App\Http\Controllers\AdminController@newsSave')->name('admin.news.save');
Route::post('/admin/news/update', 'App\Http\Controllers\AdminController@newsUpdate')->name('admin.news.update');
Route::delete('/admin/news/delete', 'App\Http\Controllers\AdminController@newsDelete')->name('admin.news.delete');
Route::get('/admin/news/show/{id}', 'App\Http\Controllers\AdminController@newsShow')->name('admin.news.show');

Auth::routes();
