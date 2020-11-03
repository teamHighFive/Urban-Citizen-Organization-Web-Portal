@extends('layouts.app')

@section('content')
	<a href="/posts" class="btn btn-primary">Go Back</a>
	<hr>
	<h1>{{$post->title}}</h1>
	<div class="row">
		<div class="col-md-10">
			<img style="width: 50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
			<p class="lead">{{$post->body}}</p>
		</div>	
	<div class="col-md-2">
		<div class="well">
		<dl class="dl-horizontal">
			<dt>Created At:</dt> 
			<dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
		</dl>
		<dl class="dl-horizontal">
			<dt>Last Updated: </dt>
			<dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
		</dl>
		<hr>
		<div class="row">
		@if(!Auth::guest())
			@if(Auth::user()->id == $post->user_id)
				<div class="col-md-6">
				<a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">Edit</a>
				</div>
				<div class="col-md-6"> 
				{!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
				{{Form::hidden('_method','DELETE')}}
				{{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
				{!!Form::close()!!}
				</div>
			@endif
		@endif
		</div>
		</div>
		</div>
	</div>
@endsection