@extends('layouts.userdashboard')

@section('title','View Post')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
    <div class="row">
    <div class="col-lg-12">
        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold text-white">

                <div class="row">
                    <div class="col-md-8">
                        <h2><b>{{$post->title}}</b></h2>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id] ,'method'=>'POST' ,'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                        
                            <script>
                    
                                function getClapCount(){
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState === 4 && this.status == 200) {

                                            // let data = this.responseText;
                                            data = JSON.parse(this.responseText);
                                            console.log(data.clapCount);
                                            
                                            document.getElementById("clapCount").innerHTML  =  data.clapCount;
                                            
                                        
                                        }
                                    };
                                    // TODO - URL
                                    xmlhttp.open("GET", 'http://127.0.0.1:8000/api/get-clap-count/{{$post->id}}', true);//generating  get method link
                                    xmlhttp.send();
                                    }

                                    function updateClapCount(){
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                        if (this.readyState === 4 && this.status == 200) {

                                                // let data = this.responseText;
                                                data = JSON.parse(this.responseText);
                                                console.log(data.clapCount);
                                                
                                                document.getElementById("clapCount").innerHTML  =  data.clapCount;
                                                
                                            
                                            }
                                        };
                                        // TODO - URL
                                        xmlhttp.open("GET", 'http://127.0.0.1:8000/api/post-clap-count/{{$post->id}}', true);//generating  get method link
                                        xmlhttp.send();
                                    }

                                    getClapCount();
                        </script>
                        <div class="row">
                        <button class="badge badge-pill btn-warning px-3 py-2" onClick="updateClapCount()"><span id="clapCount"></span>&emsp;<i class="fas fa-sign-language"></i> &emsp; Clap </button>
                        </div>
                            <div class="row justify-content-center mt-2">
                                <img style="height: 250px;" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                            <div class="row">
                                <p class="lead">{{ $post->body }}</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
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
                        <img src="{{App\User::find($comment->user_id)->avatar}}" class="card-img-top" alt="..." style="height:30px;width:30px;border: radius 5px;50%;margin-right:15px;padding:1px;">
                        <b>{{App\User::find($comment->user_id)->fname}} {{App\User::find($comment->user_id)->lname}}</b>
                    </div>  
                </div>
            </div>
            <div class="card-text"><br> 
                <div class="col-md-10">
                        <p class="card-title"> <i class="fas fa-comment-dots"></i> &nbsp; {{$comment->comment_body}}</p>                       
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
@endsection




