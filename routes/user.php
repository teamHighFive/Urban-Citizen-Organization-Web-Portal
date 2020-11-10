<?php
//TODO delete me too
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\DonationEvent;
use App\Post;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth','isUser']], function () {
        Route::get('/home', function () {
            $donationEvents = DonationEvent::latest()->take(3)->get();
            $albums = DB::table('albums')->latest()->take(3)->get();
            $posts = Post::latest()->take(3)->get();

            return view('welcome')->with('donationEvents', $donationEvents)->with('albums', $albums)->with('posts', $posts);
        });
    });



Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    });
    Route::get('registered-user', 'Admin\RegisteredController@index');
    Route::get('role-edit/{id}','Admin\RegisteredController@edit');
    Route::get('role-update/{id}','Admin\RegisteredController@updaterole');
    Route::delete('role-delete/{id}','Admin\RegisteredController@registerdelete');
});


Route::resource('posts', 'PostsController');
