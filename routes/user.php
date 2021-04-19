<?php
//TODO delete me too
use App\Post;
use App\DonationEvent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['approved'])->group(function () {

        Route::group(['middleware' => ['auth','isUser']], function () {

            Route::get('/home', function () {
                $donationEvents = DonationEvent::latest()->take(3)->get();
                $albums = DB::table('albums')->latest()->take(3)->get();
                $posts = Post::latest()->take(3)->get();
                return view('welcome')->with('donationEvents', $donationEvents)->with('albums', $albums)->with('posts', $posts);
            });

            Route::get('/dashboard', function () {
                return view('auth.dashboard');
            });

            Route::get('/my-profile', 'Frontend\UserController@myprofile');
            Route::post('/my-profile-update', 'Frontend\UserController@profileupdate');

            Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('password.change');
            Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('passwords.update');

            Route::get('/membership-payments', 'MembershipPaymentsController@mpayments');
            Route::post('/do-payments', 'MembershipPaymentsController@createPayments');
            Route::get('membership-payment-status/{payment_id}', 'MembershipPaymentsController@getPaymentStatus');


        });
            Route::group(['middleware' => ['auth','isAdmin']], function () {

            Route::get('registered-user', 'Admin\RegisteredController@index');
            Route::get('role-edit/{id}','Admin\RegisteredController@edit');
            Route::get('role-update/{id}','Admin\RegisteredController@updaterole');
            Route::delete('role-delete/{id}','Admin\RegisteredController@registerdelete');

            Route::get('/user-active', 'UserApprovelController@index')->name('auth.useractivation');
            Route::get('status/{id}', 'UserApprovelController@status')->name('status');

            Route::get('/view-payments/{id}', 'MembershipPaymentsController@membersPayments');
        });

    });
});


