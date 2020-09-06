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
Route::post('/chooseFood', 'HomeController@getPostalCode');
// Route::get('chooseFood', 'HomeController@getChooseFoodView');
Route::post('addDrink', 'HomeController@storeFood')->name('store.food');
Route::get('/summary', 'HomeController@redirectPay');

Route::post('/strip/Payment', 'HomeController@storeOrder')->name('Order.Placed');
Route::post('/inviteFriend', 'HomeController@sendFriend');
Route::post('/play', 'HomeController@getPlayerNumber');
Route::post('/gameScore', 'HomeController@getScore');
Route::get('/summarys', 'HomeController@redirectPay');

Route::get('orderPlaced', 'StripePaymentController@stripe');
Route::post('orderPlaced', 'StripePaymentController@stripePost')->name('stripe.post');
