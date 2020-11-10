@extends('layouts.dashboard')

@section('title','Online Conferences')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
	<div class="row">
		<div class="col-md-10">
            <div class="card-header font-weight-bold"><h1>Posts of Organization</h1></div>
		</div>
		<div class="col-md-2">
			<a href="/posts/create" class="btn btn-primary btn-block">Create Post</a>
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
</div>
@endsection
