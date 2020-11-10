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

Route::get('/gallery', 'Album\AlbumController@index');

Route::resource('album', 'Album\AlbumController');

Route::resource('photo', 'PhotoController');

Route::post('/create-album', 'Album\AlbumController@store');
Route::get('/album/show/{id}', 'Album\AlbumController@show');

Route::delete('/album/delete/{id}','Album\AlbumController@destroy');

Route::get('/album/edit/{id}','Album\AlbumController@edit');

Route::get('/album/create','Album\AlbumController@create');

Route::get('/test', function()
{
    return view('album.test');
});

Route::get('/photo/create/{id}', 'PhotoController@create');

Route::get('/photo/details/{id}', 'PhotoController@details');
