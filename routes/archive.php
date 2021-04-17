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

Route::get('/arc', function () {return view('archive\basic');});
//Route::get('/ann', function () {return view('announcement\basicview');});

Route::get('/seperated-arc', 'Document\DocumentController@table_seperated_files');
Route::get('/gallery-arc', 'Document\DocumentController@table_gallery_files');
Route::get('/event-arc', 'Document\DocumentController@table_events');
Route::get('/donatfiles-arc', 'Document\DocumentController@table_donate_files');
Route::get('/conffiles-arc', 'Document\DocumentController@table_conf_files');
Route::get('/post-arc', 'Document\DocumentController@table_post_files');
Route::get('/eventfiles-arc', 'Document\DocumentController@table_event_files');
Route::get('/announcement', 'Document\DocumentController@announcements');

Route::group(['middleware' => ['auth','isAdmin']], function () {

Route::get('/submission_table', 'Document\DocumentController@table_submission_files');
Route::get('/form', function () {return view('announcement\Announceform');});
Route::post('/submit', 'Document\DocumentController@storeann')->name('submit');
Route::get('/deleteann/{id}','Document\DocumentController@announcementdelete');


});

// Route::get('/archieves', function () {
//     return view('archive.index');
// });

Route::group(['middleware' => ['auth','isUser']], function () {

    Route::get('/choose-type','Document\DocumentController@index_choose')->name('choose');
    
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

    Route::post('/choosetype', 'Document\DocumentController@type')->name('choosetype');

    Route::get('/type', function () {return view('choosetype');});

    Route::get('/edit/{id}','Document\DocumentController@editfile');
    Route::put('/updatefile/{id}','Document\DocumentController@update');
    Route::get('/delete/{id}','Document\DocumentController@delete');

    Route::get('/edit_don/{id}','Document\DocumentController@editdon');
    Route::put('/updatedon/{id}','Document\DocumentController@updatedon');
    Route::get('/deletedon/{id}','Document\DocumentController@deletedon');

    Route::get('/editconf/{id}','Document\DocumentController@editconf');
    Route::put('/updateconf/{id}','Document\DocumentController@updateconf');
    Route::get('/deleteconf/{id}','Document\DocumentController@deleteconf');

    Route::get('/editeventfile/{id}','Document\DocumentController@editeventfile');
    Route::put('/updateeventfile/{id}','Document\DocumentController@updateeventfile');
    Route::get('/deleteeventfile/{id}','Document\DocumentController@deleteeventfile');

    Route::get('/deletsubmissionfile/{id}','Document\DocumentController@deletsubmissionfile');


});
