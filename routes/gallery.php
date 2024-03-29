<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Gallery Routes
|--------------------------------------------------------------------------
|
| Here is where you can register gallery related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 ///All
Route::get('/gallery', 'Album\AlbumController@index');
Route::resource('album', 'Album\AlbumController');
Route::resource('photo', 'Album\PhotoController');
Route::get('/album/show/{id}', 'Album\AlbumController@show');
Route::get('/photo/details/{id}', 'Album\PhotoController@details');

Route::group(['middleware' => ['auth','isAdmin']], function () {
///Admin
    Route::post('/add-photo-to-album','Album\PhotoController@store' );
    Route::post('/create-album', 'Album\AlbumController@store');
    Route::delete('/album/delete/{id}','Album\AlbumController@destroy');
    Route::get('/album/edit/{id}','Album\AlbumController@edit');
    // Route::post('edit-album/{id}','Album\AlbumController@update');
    Route::get('/album/create','Album\AlbumController@create');
    Route::get('/photo/create/{id}', 'Album\PhotoController@create');
    Route::get('/photo/{id}', 'Album\PhotoController@destroy');
    
});




