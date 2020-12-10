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
Route::get('/donation', 'Donation\DonationController@index');
Route::post('/create-donation', 'Donation\DonationController@store');



Route::resource('donation', 'Donation\DonationController');
// Route::post('/','DonationController@store');
Route::get('/createdonevent','Donation\DonationController@create');

Route::get('/donate','Donation\DonationController@donate');

Route::delete('/donation/delete/{id}','AlbumController@destroy');

Route::get('/donation/edit/{id}','Donation\DonationController@edit');

Route::post('/update-donevent/{id}', 'Donation\DonationController@update');


