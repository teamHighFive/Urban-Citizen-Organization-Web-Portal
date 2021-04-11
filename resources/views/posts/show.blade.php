@extends('layouts.userdashboard')

@section('title','View Post')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold">

                <div class="row">
                    <div class="col-md-9">
                        <h2><b>{{$post->title}}</b></h2>
                    </div>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                                <div class="col-md-3">
                                    <div class="row justify-content-center">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-success btn-lg">Edit Your post</a>
                                    </div>
                                </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="card bg-light mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center mt-2">
                            <img style="width: 900px;height: 500px" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                        <div class="row justify-content-center">
                            <p class="lead">{{ $post->body }}</p>
                        </div>
                </div>
            </div>
        </div>

        {{-- @if(!Auth::guest())
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">
                            Edit or Delete your post...
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    @if(Auth::user()->id == $post->user_id)
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                            {!!Form::close()!!}
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
        @endif --}}
</div>
@endsection
