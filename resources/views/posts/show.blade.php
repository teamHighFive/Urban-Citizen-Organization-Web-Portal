@extends('layouts.dashboard')

@section('title','Blog')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">

    <div class="row">  
        <div class="col-sm-8 col-md-8">
        
            <hr>
            <h1>{{$post->title}}</h1>
            <div class="row">
                <div class="col-md-10">
                    <img style="width: 50%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                    <p class="lead">{{$post->body}}</p>
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

        </div>
        <hr>
        <div class="col-sm-4 col-md-4">  
        <hr>
            <h2 class="text-center"><b>Comments</b></h2>
        <hr>
                <div class="card mb-3 wow fadeIn">
                    <form action="/storecomment/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}  
                        <div class="card-body">  
                            <div class="row">
                                <div class="col-md-12">                  
                                    <div class="form-outline">
                                        <i class="fas fa-pencil-alt input-prefix">&nbsp; Share your idea using comment</i><br>                                        
                                        <div class="md-form input-with-pre-icon">
                                            <i class="fas fa-signature input-prefix"></i>
                                            <input type="text" name="comment_body" id="comment_body" rows="4" class="form-control my-1" placeholder="type here.." required>
                                        </div>
                                    </div>   
                                </div>    
                                <div class="col-md-10">              
                                    <button type="submit" id="submit" class="badge badge-pill btn-info px-4 py-2">Add</button>
                                </div>
                            </div>
                        </div>                    
                    </form>
                </div>

                @foreach ($comments as $comment)
                <div class="card">
                    <div class="card-header">
                        <div class="row">   
                            <div class="col-sm-12 col-md-12"> 
                                <img src="{{App\User::find($comment->user_id)->avatar}}" class="card-img-top" alt="..." style="height:60px;width:60px;border-radius:50%;margin-right:15px;padding:10px;">
                                <b>{{App\User::find($comment->user_id)->fname}} {{App\User::find($comment->user_id)->lname}}</b>
                            </div>  
                        </div>
                    </div>
                    <div class="card-text"><br> 
                        <div class="col-md-10">
                                <h5 class="card-title"> <i class="fas fa-comment-dots"></i> &nbsp; {{$comment->comment_body}}</h5>                       
                                <div class="card-text" align="right">  
                        </div> 
                        @if(!Auth::guest())
                            @if (Auth::User()->id == $comment->user_id)
                                <a href="/editcomment/{{$comment->id}}/{{$post->id}}" class="btn btn-outline-warning btn-sm">EDIT</a>
                                <a href="/deletecomment/{{$comment->id}}/{{$post->id}}" class="btn btn-outline-danger btn-sm">DELETE</a>
                            @endif
                        @endif
                        </div>
                    </div>
                </div>  <br>                
                @endforeach   
            </div>
        </div>
    </div>
</div>
@endsection
