<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function () {
//    return view('home');
//});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/addProperties','addProperties@index')->middleware('auth');
Route::get('/test',function (){return view('test');});
//test routes
Route::get('/home2','mapController@index');
Route::get('/home3/{id}','mapController@test');
//test routes end

//Route::get('/admin',function (){return view('/layouts/adminPanel');});
Route::get('/FAQ',function (){return view('/FAQ');})->name('FAQ');
Route::get('/howitworks',function (){return view('/howitworks');})->name('howitworks');
Route::get('/privacypolicy',function (){return view('/privacypolicy');})->name('privacypolicy');
Route::get('/whylease',function (){return view('/whylease');})->name('whylease');
Route::get('/search/{string}','searchController@index');
Route::post('/search','searchController@post')->name('search');
Route::get('/listing','listing@index');
Route::get('/listing/{listing}','listing@showSingle');
Route::get('/listingShow','listing@show');
Route::get('/submitlisting','submitListing@index')->name('submitlisting');
Route::post('/submitlistingPOST','submitListing@indexPOST')->name('submitPost');
Route::get('/profile','UserController@profile')->name('profile');
Route::post('/profileImage','UserController@updateAvatar')->name('profileImage');
Route::post('/pauseListing','listing@pauseListing')->name('pauseListing');
Route::post('/activateListing','listing@activateListing')->name('activateListing');
Route::post('/deleteListing','listing@deleteListing')->name('deleteListing');
Route::post('/editListing','listing@editListing')->name('editListing');
Route::post('/saveEditListing','listing@saveEditListing')->name('saveEditListing');
Route::post('/becomeHost','UserController@becomeHost')->name('becomeHost');