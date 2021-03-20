@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <div class="row mt-5 px-5">
        

        <h2>{{$album->title}}</h2>

        

    </div>
    <div class="row px-5">

        <a href="/gallery">Back to Gallery</a>

    </div>
    <div class="row mt-2">

        <div class="col px-5">
            @if (Auth::check())
            <a class="btn btn-primary" href="/photo/create/{{$album->id}}" role="button">Add Photo</a>
            @endif
        </div>
    </div>






        <div class="row px-5 py-5">
            @foreach ($photos as $photo)
            <div class="col-lg-4 col-md-12 mb-3">

                        <div class="thumbnail">
                            <a href="/photo/details/{{$photo->id}}">
                                <img class="img-fluid z-depth-1" src="/album-template/images/{{$photo->image}}" alt="responsive image">
                            </a>
                            <h5>{{$photo->caption}}</h5>
                            <div class="caption">
                                <h5>{{$photo->description}}</h5>
                            </div>
                        </div>
            </div>
            @endforeach

        </div>

</div>
@endsection
