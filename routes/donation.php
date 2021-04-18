<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Donation Routes
|--------------------------------------------------------------------------
|
| Here is where you can register donation related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///for donation events
Route::get('/donation', 'Donation\DonationEventController@index');
Route::post('/create-donation', 'Donation\DonationEventController@store');

Route::resource('donation-event', 'Donation\DonationEventController');

Route::get('/createdonevent','Donation\DonationEventController@create');


Route::get('/donation/edit/{id}','Donation\DonationEventController@edit');


Route::delete('/donation/delete/{id}','Donation\DonationEventController@destroy');

///for payments

// route for processing payment
Route::post('paypal', 'Donation\DonationController@payWithpaypal')->name('paypal');

// route for check status of the payment
Route::get('donationstatus/{donation_id}', 'Donation\DonationController@getPaymentStatus')->name('status');

// Route::get('donationstatus',array('as'=>'payment.status','uses'=>'Payment2Controller@store'));


///for Dontions

 Route::get('/donate/{id}', 'Donation\DonationController@index');

 Route::get('/donations/show','Donation\DonationController@show');


// Route::resource('donation', 'Donation\DonationController');
// Route::post('/','DonationController@store');




