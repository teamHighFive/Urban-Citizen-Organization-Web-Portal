<?php
//TODO delete me too
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
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
 Route::post('/storecomment/{post_id}', 'CommentController@store')->name('storecomment');; 
 Route::get('/viewcomments', 'CommentController@table_comments_files');

 Route::get('/editcomment/{id}/{post_id}','CommentController@editcomment');
 Route::post('/updatecomment/{id}/{post_id}','CommentController@updatecomment');
 
 Route::get('/deletecomment/{id}/{post_id}','CommentController@deletecomment');
 //Route::resources('comments','CommentController');
