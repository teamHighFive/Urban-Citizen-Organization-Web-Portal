@extends('layouts.dashboard')

@section('title','Upcoming Meetings')
@section('content')
    <div class="container" >
        <h2 class="text-center cyan-text pt-5 mb-3">Edit file</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <form action="/updatecomment/{{$comment->id}}/{{$post_id}}" class="form-popup" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}                
                    

                    <div class="card">
                    <div class="card-header">
                        <div class="row">   
                            <div class="col-sm-6 col-md-4"> 
                                <img src="{{asset(Auth::user()->avatar)}}" class="card-img-top" alt="..." style="height:60px;width:60px;border-radius:50%;margin-right:15px;padding:10px;">
                                <b>{{App\User::find($comment->user_id)->fname}} {{App\User::find($comment->user_id)->lname}}</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-text"><br>
                        <textarea class="form-control" name="comment_body" id="comment_body" rows="4" placeholder="type here..">{{$comment->comment_body}}</textarea>                               
                        <button type="submit" id="submit" class="btn btn-info btn-sm">Save</button>
                    </div>
                    </form>
                </div> 