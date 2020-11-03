@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>Posts of Our Organization</h1>
		</div>
		<div class="col-md-2">
			<a href="/posts/create" class="btn btn-lg btn-block btn-primary">Create Post</a>
		</div>
</div>
	@if(count($posts) > 0)
	<div class="card" style="background-color: #e3f2fd;">
		<ul class="list-group list-group-flush">
			@foreach($posts as $post)

			<div class="row">
				<div class="col-md-4">
					<img style="width: 100%;height: 200px" src="/storage/cover_images/{{$post->cover_image}}" alt="">
				</div>
				<div class="col-md-8">

		            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
					<small>Created At : {{date('M j, Y h:ia',strtotime($post->created_at))}}</small> <br>
					<small>Last Updated : {{date('M j, Y h:ia',strtotime($post->updated_at))}}</small>

				</div>

			</div>
				<hr>
			@endforeach
		</ul>
	</div>

	@else
@endif
@endsection
