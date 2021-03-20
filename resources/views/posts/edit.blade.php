@extends('layouts.userdashboard')

@section('title','Edit Post')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
    {{-- <a href="/posts" class="btn btn-primary">Go Back</a> --}}
    <hr>
        <h1>Edit Post</h1>
    <hr>
	{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
    	{{Form::label('title','Title')}}
    	{{Form::text('title', $post->title,['class'=> 'form-control', 'placeholder'=> 'Title'])}}
    </div>

    <div class="form-group">
    	{{Form::label('body','Body')}}
    	{{Form::textarea('body', $post->body,['class'=> 'form-control', 'placeholder'=> 'Body'])}}
    </div>

    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}
</div>
@endsection
