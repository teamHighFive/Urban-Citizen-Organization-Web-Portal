@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Conference details and Files
    </h2>
    <div class="links">
        <a href="/conf-file-form"><button type="submit" name="submit" class="btn btn-light btn-sm">Upload another file &emsp;<i class="fas fa-users"></i></button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="color-block-dark teal lighten-1-color-dark z-depth-2 white-text">
    <tr>
        <th scope="col">File-ID</th>
        <th scope="col">Document name</th>
        <th scope="col">Description</th>       
        <th scope="col">File <br> (click to view)</th>  
        
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    
    <tr>

        <th> {{$item->document_id}}</th>
        <th> {{$item->document_name}}</th>
        <th> {{$item->description}}</th>
        <th>
            <a target="_blank" href="{{ asset ('uploads/conf_files/'.$item->file .'/' ) }}">
            <h1 class="fas fa-book"></h1>                   
            </a> 
        </th>
        
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

