@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Blog Archives
    </h2>
    <div class="links">
        <a href="/posts/create"><button type="submit" name="submit" class="btn btn-light btn-sm">Posts details of blog &emsp;<i class="fas fa-camera"></i></button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="color-block default-color z-depth-2 white-text">
    <tr>
        <th scope="col">Post ID</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>        
        <th scope="col"><strong>Cover Image </strong><br> (click to view)</th>
        
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->title}}</th>
        <th> {{$item->body}}</th>
        <th> {{$item->cover_image}}</th>
        
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

