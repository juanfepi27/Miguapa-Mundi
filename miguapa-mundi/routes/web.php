<?php

// Authors: Juan Felipe Pinzón, Miguel Ángel Calvache and Maria Paula Ayala

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
Route::get('/lang/{locale}', 'App\Http\Controllers\LangController@changeLang')->name('lang.changeLang');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
    Route::get('/news/search', 'App\Http\Controllers\NewsController@search')->name('news.search');
    Route::get('/news/show/{id}', 'App\Http\Controllers\NewsController@show')->name('news.show');
    Route::get('/alliance', 'App\Http\Controllers\AllianceController@index')->name('alliance.index');
    Route::get('/alliance/create', 'App\Http\Controllers\AllianceController@create')->name('alliance.create');
    Route::post('/alliance/save', 'App\Http\Controllers\AllianceController@save')->name('alliance.save');
    Route::get('/alliance/my-alliances', 'App\Http\Controllers\AllianceController@userAlliances')->name('alliance.myAlliances');
    Route::middleware('myAlliance')->group(function () {
        Route::get('/alliance/show/{id}', 'App\Http\Controllers\AllianceController@show')->name('alliance.show');
    });
    Route::get('/offer/to-me', 'App\Http\Controllers\OfferController@toMe')->name('offer.toMe');
    Route::get('/offer/by-me', 'App\Http\Controllers\OfferController@byMe')->name('offer.byMe');
    Route::get('/offer/create/{id}', 'App\Http\Controllers\OfferController@create')->name('offer.create');
    Route::middleware('myOffer')->group(function () {
        Route::get('/offer/delete/{id}', 'App\Http\Controllers\OfferController@delete')->name('offer.delete');
    });
    Route::middleware('offerToMe')->group(function () {
        Route::get('/offer/accept/{id}', 'App\Http\Controllers\OfferController@accept')->name('offer.accept');
        Route::get('/offer/reject/{id}', 'App\Http\Controllers\OfferController@reject')->name('offer.reject');
    });
    Route::post('/offer/save', 'App\Http\Controllers\OfferController@save')->name('offer.save');
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
    Route::get('/profile/addBudget', 'App\Http\Controllers\ProfileController@addBudget')->name('profile.addBudget');
    Route::post('/member/save', 'App\Http\Controllers\AllianceController@saveMember')->name('member.save');
    Route::delete('/member/delete/{id}', 'App\Http\Controllers\AllianceController@deleteMember')->name('member.delete');
    Route::post('/member/stop-moderator/{id}', 'App\Http\Controllers\AllianceController@stopModerator')->name('member.stopModerator');
    Route::post('/member/become-moderator/{id}', 'App\Http\Controllers\AllianceController@becomeModerator')->name('member.becomeModerator');
    Route::post('/member/accept-member/{id}', 'App\Http\Controllers\AllianceController@acceptMember')->name('member.acceptMember');
    Route::post('/member/decline-member/{id}', 'App\Http\Controllers\AllianceController@declineMember')->name('member.declineMember');
    Route::get('/country/in-offer', 'App\Http\Controllers\CountryController@inOfferIndex')->name('country.inOfferIndex');
    Route::get('/country/in-offer/show/{id}', 'App\Http\Controllers\CountryController@inOfferShow')->name('country.inOfferShow');
    Route::get('/country/my-countries', 'App\Http\Controllers\CountryController@myCountriesIndex')->name('country.myCountriesIndex');
    Route::get('/country/my-countries/show/{id}', 'App\Http\Controllers\CountryController@myCountriesShow')->name('country.myCountriesShow');
    Route::post('/country/my-countries/update', 'App\Http\Controllers\CountryController@myCountriesUpdate')->name('country.myCountriesUpdate');
});

Route::middleware(['auth', 'verified', 'role'])->group(function () {
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
});

Auth::routes(['verify'=>true]);
Route::get('/register-user', 'App\Http\Controllers\Auth\RegisterController@index')->name('register.index');
