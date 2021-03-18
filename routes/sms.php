<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/// SMS gateway
Route::get('/manual-sms', ['middleware' => 'auth', 'uses' => function () {
    $userId = Auth::id();
    $dataInbox = Http::get('https://app.newsletters.lk/smsAPI?getinbox&apikey='.getenv("NEWSLETTERS_API_KEY").'&apitoken='.getenv("NEWSLETTERS_API_TOKEN").'&list=all')->json();
    $dataBalance = Http::get('https://app.newsletters.lk/smsAPI?balance&apikey='.getenv("NEWSLETTERS_API_KEY").'&apitoken='.getenv("NEWSLETTERS_API_TOKEN"))->json();
    $members = User::all();
    // return($members);
    if ($dataInbox['status'] == "success"){
        if (isset($dataBalance['balance'])){
            return view('sms.manualSMS')->with('members', $members)->with('userId', $userId)->with('inbox', $dataInbox['inbox'])->with('balance', $dataBalance['balance']);
        }else if ($dataBalance['status'] == "error"){
            return view('sms.manualSMS')->with('members', $members)->with('userId', $userId)->with('inbox', $dataInbox['inbox'])->with('balanceError', $dataBalance['message']);
        }
    }
    else if ($dataInbox['status'] == "error"){
        if (isset($dataBalance['balance'])){
            return view('sms.manualSMS')->with('members', $members)->with('userId', $userId)->with('inboxError', $dataInbox['message'])->with('balance', $dataBalance['balance']);
        }else if ($dataBalance['status'] == "error"){
            return view('sms.manualSMS')->with('members', $members)->with('userId', $userId)->with('inboxError', $dataInbox['message'])->with('balanceError', $dataBalance['message']);
        }
    }
}]);

/// Manual SMS Sending
Route::post('/send-sms', 'SMSController@manualSMS');