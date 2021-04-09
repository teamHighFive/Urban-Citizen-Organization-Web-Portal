@extends('layouts.dashboard')

@section('title','Blog')
@section('content')

<table class="table table-stripped table-bordered">
<thead class="color-block-dark teal lighten-1-color-dark z-depth-2 white-text">
    <tr>
        <th scope="col">commentid-ID</th>
        <th scope="col">comment</th>
        <th scope="col">post_id</th>
        <th scope="col">edit</th> 
        <th scope="col">delete </th> 
        
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    
    <tr>

        <th> {{$item->comment_id}}</th>
        <th> {{$item->comment_body}}</th>
        <th> {{$item->post_id}}</th>
        <th><a href ="/edit/{{$item->id}}" class="btn btn-outline-warning btn-sm"> Edit </a></th>
        <th><a href = "/delete/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Delete </a> </th>
        <th><a href = "/download/{{$item->id}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-download"></i></a></th>

        
    @endforeach
</tbody>
</table>


    @endsection