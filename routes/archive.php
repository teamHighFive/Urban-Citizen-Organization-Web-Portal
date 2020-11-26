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
Route::get('/donate-file-form', 'Document\DocumentController@donate_form');


Route::post('/uploadfilepdf', 'Document\DocumentController@storepdf')->name('uploadfilepdf');
Route::post('/uploadfiledoc', 'Document\DocumentController@storedoc')->name('uploadfiledoc');
Route::post('/uploadfileexel', 'Document\DocumentController@storeexel')->name('uploadfileexel');
Route::post('/uploadfileimg', 'Document\DocumentController@storeimg')->name('uploadfileimg');
Route::post('/uploadfilevideo', 'Document\DocumentController@storevideo')->name('uploadfilevideo');
Route::post('/uploadfiledonate', 'Document\DocumentController@store_donatefiles')->name('uploadfiledonate');


Route::get('/choose-type','Document\DocumentController@index_choose')->name('choose');

Route::get('/seperated-arc', 'Document\DocumentController@table_seperated_files');
Route::get('/gallery-arc', 'Document\DocumentController@table_gallery_files');
Route::get('/event-arc', 'Document\DocumentController@table_event_files');
Route::get('/donatfiles-arc', 'Document\DocumentController@table_donate_files');

// Route::get('/archieves', function () {
//     return view('archive.index');
// });

Route::post('/choosetype', 'Document\DocumentController@type')->name('choosetype');

Route::get('/type', function () {return view('choosetype');});
Route::get('/arc', function () {return view('archive\basic');});
Route::get('/chose', function () {return view('archive\choose');});

