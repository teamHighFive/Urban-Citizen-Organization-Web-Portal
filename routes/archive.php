<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Archive Routes
|--------------------------------------------------------------------------
|
| Here is where you can register archive related routes. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/upload_pdf', 'Document\DocumentController@index_pdf');
Route::get('/upload_doc', 'Document\DocumentController@index_doc');
Route::get('/upload_exel', 'Document\DocumentController@index_exel');
Route::get('/upload_images', 'Document\DocumentController@index_images');
Route::get('/upload_videos', 'Document\DocumentController@index_videos');


Route::post('/uploadfilepdf', 'Document\DocumentController@storepdf')->name('uploadfilepdf');
Route::post('/uploadfiledoc', 'Document\DocumentController@storedoc')->name('uploadfiledoc');
Route::post('/uploadfileexel', 'Document\DocumentController@storeexel')->name('uploadfileexel');
Route::post('/uploadfileimg', 'Document\DocumentController@storeimg')->name('uploadfileimg');
Route::post('/uploadfilevideo', 'Document\DocumentController@storevideo')->name('uploadfilevideo');


Route::get('/choose-type','Document\DocumentController@index_choose')->name('choose');

Route::get('/archieves', 'Document\DocumentController@table');

// Route::get('/archieves', function () {
//     return view('archive.index');
// });

Route::post('/choosetype', 'Document\DocumentController@type')->name('choosetype');

Route::get('/type', function () {
    return view('choosetype');
});

