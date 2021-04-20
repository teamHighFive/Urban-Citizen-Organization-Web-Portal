<?php

use App\Post;
use App\DonationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PollController;//Dhananjana

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

// //--------------------------Dhananjana----------------------------------------------------------------------------------------------//

// //pollhome page
// Route::get('/pollhome',[PollController::class,'PollHome']);
// //pollhome-createpoll button -create poll form
// Route::get('/create-poll-form',[PollController::class,'createPollForm']);
// //pollhome-edit&delete button-poll table
// Route::get('/polltable-view',[PollController::class,'showtable']);


// //created poll submit
// Route::post('/create-poll',[PollController::class,'createPoll'])->name('create-poll');
// //add more option view and submit
// Route::get("addmore","PollController@addMore");
// Route::post("addmore","PollController@addMorePost");



// //route to poll edit form
// Route::get('/polledit/{id}',[PollController::class,'edit'] );
// Route::put('/pollupdate/{id}',[PollController::class,'update']);

// //poll delete
// Route::get('/polldestroy/{id}',[PollController::class,'destroy'] );


// Route::get('/votetable',[PollController::class,'showvotetable']);

// Route::get('/pollview/{id}',[PollController::class,'viewvotingpage'] ); 

// Route::get('/pollresult/{id}',[PollController::class,'result']);

// Route::post('/castvote/{id}',[PollController::class,'castVote']);

// //-------------------------------------------Dhananjana-------------------------------------------------------------------