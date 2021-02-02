<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| SMS Routes
|--------------------------------------------------------------------------
|
| Here is where you can register meeting related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// Manual SMS Sending
Route::get('/manual-sms', ['middleware' => 'auth', 'uses' => function () {
    $userId = Auth::id();
    return view('sms.manualSMS')->with('userId', $userId);
}]);