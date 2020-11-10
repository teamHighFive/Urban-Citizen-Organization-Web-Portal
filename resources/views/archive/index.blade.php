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
        <th scope="col">Document ID</th>
        <th scope="col">Document Name</th>
        <th scope="col">User ID</th>
        <th scope="col">Event Name</th>
        <th scope="col"><strong>File </strong><br> (click to view)</th>
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->document_id}}</th>
        <th> {{$item->document_name}}</th>
        <th> {{$item->created_by}}</th>
        <th> {{$item->event}}</th>
        <th>
            @if($item->type == 'img')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="far fa-file-image"></h1>
                </a>
            @endif

            @if($item->type == 'doc')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="fas fa-file-word"></h1>
                </a>
            @endif

            @if($item->type == 'exel')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="far fa-file-excel "></h1>
                </a>
            @endif

            @if($item->type == 'pdf')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="far fa-file-pdf"></h1>
                </a>
            @endif

            @if($item->type == 'video')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="fas fa-video"></h1>
                </a>
            @endif

        </th>

    </tr>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

