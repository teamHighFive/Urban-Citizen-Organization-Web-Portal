@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Event Archives
    </h2>
    <div class="links">
        <a href="/event-file-form"><button type="submit" name="submit" class="btn btn-light btn-sm">Upload another file &emsp;<i class="fas fa-hand-holding-usd"></i></button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="color-block-dark teal lighten-1-color-dark z-depth-2 white-text">
    <tr>
        <th scope="col">Event-ID</th>
        <th scope="col">Event name</th>
        <th scope="col">Doc ID</th>
        <th scope="col">Location</th> 
        <th scope="col">Description </th> 
        <th scope="col">Created by</th>        
        <th scope="col">File <br> (click to view)</th>  
        <th>Edit</th>
        <th>Delete</th>
        <th>Download </th>
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    
    <tr>

        <th> {{$item->event_id}}</th>
        <th> {{$item->event}}</th>
        <th> {{$item->document_name}}</th>
        <th> {{$item->location}}</th>
        <th> {{$item->created_by}}</th>
        <th> {{$item->description}}</th>
        <th>
            <a target="_blank" href="{{ asset ('uploads/event_files/'.$item->file .'/' ) }}">
            <h1 class="fas fa-book"></h1>                   
            </a> 
        </th>
        <th><a href ="/edit/{{$item->id}}" class="btn btn-outline-warning btn-sm"> Edit </a></th>
        <th><a href = "/delete/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Delete </a> </th>
        <th><a href = "/download/{{$item->id}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-download"></i></a></th>

    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

