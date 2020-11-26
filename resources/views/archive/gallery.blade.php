@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Gallery Archives
    </h2>
    <div class="links">
        <a href="/gallery"><button type="submit" name="submit" class="btn btn-light btn-sm">Upload photos to gallery &emsp;<i class="fas fa-camera"></i></button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="color-block default-color z-depth-2 white-text">
    <tr>
        <th scope="col">G-ID</th>
        <th scope="col">Caption</th>
        <th scope="col">Description</th>        
        <th scope="col"><strong>Image </strong><br> (click to view)</th>
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->caption}}</th>
        <th> {{$item->description}}</th>
        <th> 
                            <!-- <a target="_blank" href="{{ asset ('album-template/images/'.$item->image .'/' ) }}">
 for image symbol->         <h1 class="far fa-images"></h1>                    
                            </a> -->
 <!-- for image -> -->      <img src="{{ asset ('album-template/images/' . $item->image .'/') }}" width="100px" height="100px" alt="image"></th> 
        </th>

    </tr>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

