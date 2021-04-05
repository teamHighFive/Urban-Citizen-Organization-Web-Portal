@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
    <div class="container" >
        <h2 class="text-center cyan-text pt-5 mb-3">Edit file</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <form action="/updatefile/{{ $upload->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}                
                    {{ method_field('PUT')}}

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
                        <h5 class="card-title"> &emsp; &emsp; <i class="fas fa-comment-dots"></i> &nbsp; {{$comment->comment_body}}</h5>                       
                        <div class="card-text" align="right">    
                                <a href="/editcomment/{{$item->id}}" class="btn btn-outline-warning btn-sm">EDIT</a>
                                <a href="#" class="btn btn-outline-danger btn-sm">DELETE</a>
                            </div>
                    </div>
                </div> 