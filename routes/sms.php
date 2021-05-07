<?php
//TODO delete me too
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use App\User;

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

Route::group(['middleware' => ['auth','isAdmin']], function () {
    /// SMS gateway
    Route::get('/manual-sms', ['middleware' => 'auth', 'uses' => function () {
        $dataBalance = Http::get('https://app.newsletters.lk/smsAPI?balance&apikey='.getenv("NEWSLETTERS_API_KEY").'&apitoken='.getenv("NEWSLETTERS_API_TOKEN"))->json();
        $members = User::all()->sortby('fname');
        if (isset($dataBalance['balance'])){
            return view('sms.manualSMS')->with('members', $members)->with('balance', $dataBalance['balance']);
        }else if ($dataBalance['status'] == "error"){
            return view('sms.manualSMS')->with('members', $members)->with('balanceError', $dataBalance['message']);
        }
    }]);

    /// Manual SMS Sending
    Route::post('/send-sms', 'SMSController@manualSMS');
});
//TODO - if not action
