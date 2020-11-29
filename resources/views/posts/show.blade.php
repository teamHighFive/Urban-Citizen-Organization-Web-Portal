@extends('layouts.userdashboard')

@section('title','View Post')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <hr>
    <div class="card mb-3 wow fadeIn">
            <div class="card-header font-weight-bold"><h1><b>{{$post->title}}</b></h1></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <img style="width: 50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        <div class="row fadeInDown mt-5">
                            <p class="lead">{{$post->body}}</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="card mb-3 wow fadeIn">
        <div class="card-header font-weight-bold">Do you want to change your created post...?</div>
            <div class="card-body">
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

                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-success btn-sm">Edit</a>


                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}

                            @endif
                        @endif
		            </div>
		    </div>

    </div>
@endsection
