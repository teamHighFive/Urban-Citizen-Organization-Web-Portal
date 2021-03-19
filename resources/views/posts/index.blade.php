@extends('layouts.userdashboard')

@section('title','Posts')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
        <div class="card mb-3 wow fadeIn">

            <div class="card-header font-weight-bold"><h1><b>Posts of Organization</b></h1>
                <hr>
                <a href="/posts/create" class="btn btn-success btn-block">Create Post</a>
            </div>
            <div class="card-body">

                        @if(count($posts) > 0)
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

                                    @endforeach

                                </ul>


                        @else
                        @endif
                    <hr>

            </div>
        </div>
</div>
@endsection
