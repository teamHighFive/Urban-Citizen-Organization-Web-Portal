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
            <div class="card-header font-weight-bold">
                <div class="row">
                    <div class="col-md-8">
                        <h1><b>Urban Citizen Organization</b></h1>
                    </div>
                    <div class="col-md-4">
                        <a href="/posts/create" class="btn btn-success btn-lg">Create Post</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($posts) > 0)
                                <table class="table table-striped">
                                    @foreach($posts as $post)
                                        <tr>
                                            <th>
                                                <img style="width: 500px;height: 300px" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                                            </th>
                                            <th>
                                                <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                                                <small>Created At : {{date('M j, Y h:ia',strtotime($post->created_at))}}</small> <br>
                                                <small>Last Updated : {{date('M j, Y h:ia',strtotime($post->updated_at))}}</small> <br>
                                            </th>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
        </div>
</div>
@endsection
