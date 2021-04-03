<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
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
Route::get('/upload_doc', 'Document\DocumentController@index_files');
Route::get('/upload_exel', 'Document\DocumentController@index_submission');

Route::post('/uploadfiledoc', 'Document\DocumentController@storedoc')->name('uploadfiledoc');
Route::post('/uploadfileexel', 'Document\DocumentController@storeexel')->name('uploadfileexel');

Route::post('/uploadfiledonate', 'Document\DocumentController@store_donatefiles')->name('uploadfiledonate');
Route::post('/uploadfileconf', 'Document\DocumentController@store_conffiles')->name('uploadfileconf');
Route::post('/uploadfileevent', 'Document\DocumentController@store_events')->name('uploadfileevent');

Route::get('/donate-file-form', 'Document\DocumentController@donate_form');
Route::get('/conf-file-form', 'Document\DocumentController@conference_form');
Route::get('/event-file-form', 'Document\DocumentController@event_form');
Route::get('/gallery-file-form', 'Document\DocumentController@gallery_form');

Route::get('/choose-type','Document\DocumentController@index_choose')->name('choose');

Route::get('/seperated-arc', 'Document\DocumentController@table_seperated_files');
Route::get('/gallery-arc', 'Document\DocumentController@table_gallery_files');
Route::get('/event-arc', 'Document\DocumentController@table_events');
Route::get('/donatfiles-arc', 'Document\DocumentController@table_donate_files');
Route::get('/conffiles-arc', 'Document\DocumentController@table_conf_files');
Route::get('/post-arc', 'Document\DocumentController@table_post_files');
Route::get('/eventfiles-arc', 'Document\DocumentController@table_event_files');

// Route::get('/archieves', function () {
//     return view('archive.index');
// });

Route::post('/choosetype', 'Document\DocumentController@type')->name('choosetype');

Route::get('/type', function () {return view('choosetype');});
Route::get('/arc', function () {return view('archive\basic');});

Route::get('/edit/{id}','Document\DocumentController@edit');
Route::put('/updatefile/{id}','Document\DocumentController@update');
Route::get('/delete/{id}','Document\DocumentController@delete');

Route::get('/download','Document\DocumentController@download');