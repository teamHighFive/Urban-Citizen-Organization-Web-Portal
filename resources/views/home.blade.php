@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="{{asset(Auth::user()->avatar)}}" style="height:60px;width:60px;border-radius:50%;margin-right:15px" alt="" ><b>You are logged in as User!</b>
                    <hr>
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <hr>
                    <h4>Your Blog Posts</h4>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit Post</th>
                            <th>Delete Post</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">Edit</a></th>
                            <th>{!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                                {!!Form::close()!!}
                            </th>
                        </tr>
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
