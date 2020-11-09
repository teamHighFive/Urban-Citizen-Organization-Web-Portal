<?php
//TODO delete me too
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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('auth.dashboard');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });
