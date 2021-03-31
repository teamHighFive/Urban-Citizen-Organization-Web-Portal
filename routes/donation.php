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

///for donation
Route::get('/donation', 'Donation\DonationEventController@index');
Route::post('/create-donation', 'Donation\DonationEventController@store');



Route::resource('donation', 'Donation\DonationEventController');

Route::get('/createdonevent','Donation\DonationEventController@create');

// Route::get('/donate','Donation\DonationController@donate');

Route::get('/donation/edit/{id}','Donation\DonationEventController@edit');

// Route::put('/update-donevent/{id}', 'Donation\DonationController@update');

Route::delete('/donation/delete/{id}','Donation\DonationEventController@destroy');




//payment form
Route::get('/donate', function () {
    return view('donation.form');
});

 Route::post('/create-payment', 'Donation\PaymentController@create')->name('create-payment');

// Route::get('/execute-payment', 'Donation\PaymentController@execute')->name('execute-payment');

Route::get('paypal/checkout/{order}', 'Donation\PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'Donation\PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'Donation\PayPalController@cancelPage')->name('paypal.cancel');


// Route::get('payment', 'Donation\PaymentController@index');
Route::post('charge', 'Donation\PaymentController@charge');
Route::get('paymentsuccess', 'Donation\PaymentController@payment_success');
Route::get('paymenterror', 'Donation\PaymentController@payment_error');

Route::get('/payment', function () {
    return view('Donation.form');
});

// route for processing payment
Route::post('paypal', 'Donation\Payment2Controller@payWithpaypal')->name('paypal');

// route for check status of the payment
Route::get('status', 'Donation\Payment2Controller@getPaymentStatus')->name('status');