@extends('layouts.dashboard')

@section('title','Posts')
@section('content')

{{-- <script src="https://cdn.tiny.cloud/1/8qpvqjbcsz9ifv2ptfvle3168jgjt47d15bzgj2szu2dylwq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mb-3 wow fadeIn">
            <div class="card-header font-weight-bold">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card-header font-weight-bold"><h1>Posts of Organization</h1></div>
                    </div>
                    <div class="col-md-2">
                        <a href="/posts/create" class="btn btn-primary btn-block">Create Post</a>
                        <a href="/viewcomments" class="btn btn-primary btn-block">comments</a>
                    </div>
                </div>
            </div>
        </div>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card mb-3 wow fadeIn">
                            <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{App\User::find($post->user_id)->avatar}}" style="height:35px;width:35px;border-radius:50%;margin-right:15px" alt="" >
                                                {{App\User::find($post->user_id)->fname}} {{App\User::find($post->user_id)->mname}} <br><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row justify-content-center " >
                                                    <img style="width: 550px;height: 350px" src="/storage/cover_images/{{$post->cover_image}}" alt=""> <br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h2><b><a href="/posts/{{$post->id}}">{{$post->title}}</a></b></h2>

                                        <p>{{substr($post->body, 0, 450) }}{{ strlen($post->body) > 450 ? '...' : "" }}</p>
                                        {{-- <p>{!! $post->body !!}</p> --}}
                                        <div class="row">
                                            <div class="col-md-8">
                                                <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More</a>
                                            </div>
                                            <div class="col-md-4">
                                                <small>Created At : {{date('M j, Y h:ia',strtotime($post->created_at))}}</small> <br>
                                                <small>Last Updated : {{date('M j, Y h:ia',strtotime($post->updated_at))}}</small> <br>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        @endif

</div>
@endsection
