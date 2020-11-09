@extends('layouts.dashboard')

@section('title','Online Conferences')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <hr>
	<h1>Create New Post</h1>
	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
    	{{Form::label('title','Title')}}
    	{{Form::text('title','',['class'=> 'form-control', 'placeholder'=> 'Title'])}}
    </div>

    <div class="form-group">
    	{{Form::label('body','Body')}}
    	{{Form::textarea('body','',['class'=> 'form-control', 'placeholder'=> 'Body'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block'])}}
	{!! Form::close() !!}
</div>
@endsection
