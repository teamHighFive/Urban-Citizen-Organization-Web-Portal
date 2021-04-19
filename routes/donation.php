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

////All
    ///for donation events
    Route::resource('donation', 'Donation\DonationController');
    Route::get('/donation', 'Donation\DonationEventController@index');
    Route::resource('donation-event', 'Donation\DonationEventController');

    ///for donations
    Route::get('/donate/{id}', 'Donation\DonationController@index');

    // route for processing payment
    Route::post('paypal', 'Donation\DonationController@payWithpaypal')->name('paypal');

    // route for check status of the payment
    Route::get('donationstatus/{donation_id}', 'Donation\DonationController@getPaymentStatus')->name('status');

////Admin
Route::group(['middleware' => ['auth','isAdmin']], function () {
    ///for donation events
    Route::post('/create-donation', 'Donation\DonationEventController@store');
    Route::get('/createdonevent','Donation\DonationEventController@create');
    Route::get('/donation/edit/{id}','Donation\DonationEventController@edit');
    Route::get('/donation/delete/{id}','Donation\DonationEventController@destroy');
    Route::get('/donation/finish/{id}','Donation\DonationEventController@finish');
    Route::get('/donations/showAllDonationEvents','Donation\DonationEventController@showAllDonationEvents');
    Route::get('/donations/show/{id}','Donation\DonationController@show');
});




