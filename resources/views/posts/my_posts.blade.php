
@extends('layouts.dashboard')
@section('title','My Posts')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <?php
        $user = Auth::user();
        if($user['role_as'] == 'admin'){
        ?>
        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold">
                <h2><b>Blog Posts</b></h2>
            </div>
        </div>

        <?php
        }else if($user['role_as'] == 'member'){
        ?>

        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold">
                <h2><b>My Blog Posts</b></h2>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(count($posts)>0)
                            <table class="table table-bordered table-striped">
                                <thead class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                                    <tr>
                                        <th>Title</th>
                                        <th>View Post</th>
                                        <th>Created At</th>
                                        <th>Edit Post</th>
                                        <th>Delete Post</th>
                                    </tr>
                                </thead>
                                @foreach($posts as $post)
                                    @if(!Auth::guest())
                                        <?php
                                        $user = Auth::user();
                                        if($user['role_as'] == 'admin'){
                                        ?>
                                            <tr>
                                                <th>{{$post->title}}</a></th>
                                                <th><a href="/posts/{{$post->id}}"><img style="width: 150px;height: 100px" src="/storage/cover_images/{{$post->cover_image}}" alt=""></a></th>
                                                <th>{{date('M j, Y',strtotime($post->created_at))}}</a></th>

                                                @if(Auth::user()->id == $post->user_id)
                                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a></th>
                                                    @else
                                                    <th>
                                                        <button type="button" class="btn btn-primary btn-sm" disabled>Not Allowed</button>
                                                    </th>
                                                @endif

                                                <th>{!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                    {!!Form::close()!!}
                                                </th>
                                            </tr>
                                        <?php
                                        }else if($user['role_as'] == 'member'){
                                        ?>
                                            @if(Auth::user()->id == $post->user_id)
                                                <tr>
                                                    <th>{{$post->title}}</a></th>
                                                    <th><a href="/posts/{{$post->id}}"><img style="width: 150px;height: 100px" src="/storage/cover_images/{{$post->cover_image}}" alt=""></a></th>
                                                    <th>{{date('M j, Y',strtotime($post->created_at))}}</a></th>
                                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-sm">Edit</a></th>
                                                    <th>{!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                        {!!Form::close()!!}
                                                    </th>
                                                </tr>
                                            @endif
                                        <?php
                                        }
                                        ?>
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


