<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/post',function(){
    return Post::all();
});

Route::get('/post-clap-count/{id}',function($id){

    $post = Post::find($id);
    $post->clap_count = $post->clap_count + 1;
    $post->update();
    return ['clapCount'=>$post->clap_count];
});
