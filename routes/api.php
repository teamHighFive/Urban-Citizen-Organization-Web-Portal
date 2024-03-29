<?php

use App\Post;
use App\User;
use App\event;
use App\Option;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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


Route::get('/get-clap-count/{id}',function($id){

    $post = Post::find($id);
    return ['clapCount'=>$post->clap_count];
});


Route::get('/is-membership-payment-year-available/{id}/{year}',function($id, $year){

    $payments = Payments::all()->where('user_id', $id)->where('is_success', "yes")->where('year', $year);

    return ['is_available'=>(count($payments) == 0 ? false: true)];
});

Route::get('/is-event-overlap/{startDate}/{endDate}',function($startDate, $endDate){

    $events=DB::table('events')->where('start_date', '<=', $startDate)->where('end_date', '>=', $startDate)->orWhere('start_date', '<=', $endDate)->where('end_date', '>=', $endDate);

    return ['is_overlap'=>($events->count() == 0 ? false: true)];
});

Route::get('/edit-option/{optionId}/{text}',function($optionId, $text){
    try {
        $option=Option::find($optionId);
        $option->option_name = $text;
        $option->update();
        return ['status'=>true];
    } catch (Throwable $e) {
        report($e);
        return ['status'=>false];
    }
});
Route::get('/delete-option/{optionId}',function($optionId){
    try {
        $option=Option::find($optionId);
        $option->delete();
        return ['status'=>true];
    } catch (Throwable $e) {
        report($e);
        return ['status'=>false];
    }
});
