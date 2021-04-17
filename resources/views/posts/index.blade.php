@extends('layouts.userdashboard')

@section('title','Posts')
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
                    <div class="col-md-9 text-white">
                        <h1><b>Urban Citizen Organization</b></h1>
                    </div>
                    <div class="col-md-3">
                        @if(!Auth::guest())
                            <div class="row justify-content-center">
                                <a href="/posts/create" class="btn btn-success btn-lg">Create New Post</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if(App\User::find($post->user_id) == null)
                                                    <img src="/images/unregisteredUser.jpg" style="height:50px;width:50px;border-radius:60%;margin-right:15px" alt="" >
                                                    User is not available <br><br>
                                                @else
                                                    <img src="{{App\User::find($post->user_id)->avatar}}" style="height:50px;width:50px;border-radius:60%;margin-right:15px" alt="" >
                                                    {{App\User::find($post->user_id)->fname}} {{App\User::find($post->user_id)->mname}} <br><br>
                                                @endif
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

                                        <p>{{ str_limit($post->body, $limit = 150, $end = '...') }}</p>
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
