
@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mb-3 wow fadeIn">
            <div class="card-header font-weight-bold">
                <h2 class="mb-2 mb-sm-0 pt-1">
                    <span>Your Blog Posts</span>
                    <span>/</span>
                    <a href="{{ url('/posts/create') }}">Create New</a>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(count($posts)>0)
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>View Post</th>
                                    <th>Edit Post</th>
                                    <th>Delete Post</th>
                                </tr>
                                @foreach($posts as $post)
                                    @if(!Auth::guest())
                                        @if(Auth::user()->id == $post->user_id)
                                            <tr>
                                                <th>{{$post->title}}</a></th>
                                                <th><a href="/posts/{{$post->id}}"><img style="width: 150px;height: 100px" src="/storage/cover_images/{{$post->cover_image}}" alt=""></a></th>
                                                <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a></th>
                                                <th>{!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                    {!!Form::close()!!}
                                                </th>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection


