@extends('layouts.dashboard')

@section('title','Create Post')
@section('content')
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin">></script>

<script>
    tinymce.init({
      selector: 'textarea'
    });
  </script> --}}

<div class="container" style="height:auto;min-height: 100vh">

    {{-- <a href="/posts" class="btn btn-primary">Go Back</a> --}}
    <div class="card mb-3 wow fadeIn">
        <div class="card-header font-weight-bold">
            <h1><b>Create New Post</b></h1>
        </div>
    </div>
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
