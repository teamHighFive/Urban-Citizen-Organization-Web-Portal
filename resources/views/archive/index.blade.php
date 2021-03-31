@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
     Document Archieves
    </h2>
    <div class="links">
        <a href="/choose-type"><button type="submit" name="submit" class="btn btn-light btn-sm">Upload another file</button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="thead-dark">
    <tr>
        <th scope="col">File ID</th>
        <th scope="col">File Name</th>
        <th scope="col">Uploader's ID</th>
        <th scope="col">Event Name</th>
        <th scope="col"><strong>File </strong><br> (click to view)</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Download </th>

    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->document_name}}</th>
        <th> {{$item->created_by}}</th>
        <th> {{$item->event}}</th>
        <th>            

            @if($item->type == 'doc')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="fas fa-file-invoice"></h1>
                </a>
            @endif

            @if($item->type == 'exel')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="far fa-file-excel "></h1>
                </a>

            @endif

        </th>
        <th><a href ="/edit/{{$item->id}}" class="btn btn-outline-warning btn-sm"> Edit </a></th>
        <th><a href = "/delete/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Delete </a> </th>
        <th><a href = "/download/{{$item->id}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-download"></i></a></th>

    </tr>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

