<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Event\EventController;//Event-Calendar EventController-Dhananjana

/*
|--------------------------------------------------------------------------
| Event Routes
|--------------------------------------------------------------------------
|
| Here is where you can register event related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route to Display eventpage-Event Calendar View
Route::get('/event-calendar',[EventController::class,'index'] );
//Route to Add Event to Calendar-view
Route::get('/addeventurl',[EventController::class,'display'] );
//Route to dispaly blade-Table view
Route::get('/view-event',[EventController::class,'show']);
//Route to delete event and show
Route::get('/deleteeventurl',[EventController::class,'show'] );

//EventController edit function route
Route::get('/event@edit/{id}',[EventController::class,'edit'] );
//EventController update function route
Route::put('/event@update/{id}',[EventController::class,'update'] );
//EventController destroy function route
Route::get('/event@destroy/{id}',[EventController::class,'destroy'] );
//EventController store function route
Route::post('/add-event',[EventController::class,'store'] );

Route::get('/eventDetails/{event_id}', [EventController::class,'moreOnEvent']);
