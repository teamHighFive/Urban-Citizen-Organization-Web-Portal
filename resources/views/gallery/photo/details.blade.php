@extends('layouts.main')

@section('content')

<div class="container-fluid">

        <p class="cyan-text pt-5 mb-3 font-weight-bold">{{$photo->caption}}</p>
        
        <p class="cyan-text mb-3 font-weight-bold">{{$photo->description}}</p>


    <div class="row">
        <div class="col=lg-2 col-md-4 col-sm-3 ">
            <img class="main-img" src="/gallery-resourses/images/{{$photo->image}}" alt="..." style="width: 1075px; height: 550px">
        </div>
    </div>
</div>
</br>
@endsection
