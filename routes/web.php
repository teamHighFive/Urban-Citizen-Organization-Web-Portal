<?php

use App\Post;
use App\DonationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $donationEvents = DonationEvent::latest()->take(3)->get();
    $albums = DB::table('albums')->latest()->take(3)->get();
    $posts = Post::latest()->take(3)->get();

    return view('welcome')->with('donationEvents', $donationEvents)->with('albums', $albums)->with('posts', $posts);

});




