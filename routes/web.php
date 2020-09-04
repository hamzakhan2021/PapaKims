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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'HomeController@index');
Route::post('/p', 'HomeController@getPostalCode');
Route::post('/cH', 'HomeController@storeFood');
Route::get('/summary', 'HomeController@redirectPay');

Route::post('/OrderPlaced', 'HomeController@storeOrder');
Route::post('/inviteFriend', 'HomeController@sendFriend');
Route::post('/play', 'HomeController@getPlayerNumber');
