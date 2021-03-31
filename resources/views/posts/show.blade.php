@extends('layouts.userdashboard')

@section('title','View Post')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">

        <div class="card mb-3 wow fadeIn">
            <div class="card-header font-weight-bold">
                <h2 class="mb-2 mb-sm-0 pt-1">
                    <span>{{$post->title}}</span>
                </h2>
            </div>
        </div>

        <div class="card mb-3 wow fadeIn">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <img style="width: 900px;height: 500px" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                    </div>
                </div>
                <div class="row fadeInDown mt-5">
                    <p class="lead">{!! $post->body !!}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">
                            Edit or Delete your post...
                        </div>

                        <div class="card-body">
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
            </div>

            <div class="col-md-6">
                <div class="card mb-3 wow fadeIn">

                    <div class="card-header font-weight-bold">
                        Put your comments here...
                    </div>

                    <div class="card-body">

                    </div>

                </div>
            </div>
        </div>
</div>
@endsection
