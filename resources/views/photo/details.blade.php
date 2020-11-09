@extends('layouts.main')

@section('content')

<div class="container-fluid">

    <div class="row column">
        <a href="/album/show/{{$photo->album_id}}">Back to Allbum</a>
        <h1>{{$photo->title}}</h1>
        <p class="lead">{{$photo->description}}</p>
        <p class="lead">Location:{{$photo->location}}</p>

    </div>


    <div class="row">
        <div class="col=lg-2 col-md-4 col-sm-3 ">
            <img class="main-img" src="/Template/images/{{$photo->image}}" alt="...">
        </div>
    </div>
</div>
@endsection

