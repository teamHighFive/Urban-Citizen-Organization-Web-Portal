@extends('layouts.dashboard')

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
                        <img style="width: 100%;height: 100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                    </div>
                </div>
                <div class="row fadeInDown mt-5">
                    <p class="lead">{{$post->body}}</p>
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
                        hyjyj
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3 wow fadeIn">
        <div class="card-header font-weight-bold">Leave a reply</div>
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
                                <div class="col-md-6">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">Edit</a>
                                </div>
                                <div class="col-md-6">
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
                                        {!!Form::close()!!}
                                </div>
                            @endif
                        @endif
		        </div>

		    </div>
		</div>
<hr>

<h3 class="text-center">Comments</h3>
            <table class="table">



                @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->comment_body}}</td>
                    <td>{{App\User::find($comment->user_id)->fname}} {{App\User::find($comment->user_id)->lname}}</td>


                </tr>
                @endforeach

            </table>

    <hr>
    <div class="card mb-3 wow fadeIn">
        <form action="/storecomment/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
		            <div class="col-md-10">
                        <div class="form-outline">
                            <i class="fas fa-pencil-alt input-prefix">&nbsp; Share your idea using comment</i><br>
                            <textarea class="form-control" name="comment_body" id="comment_body" rows="4" placeholder="type here.."></textarea>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <button type="submit" id="submit" class="btn btn-info btn-sm">Add</button>
                    </div>
                </div>
            </div>

        </form>
    </div>


</div>
@endsection
