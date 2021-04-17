@extends('layouts.main')

@section('title','Archives')
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

<table class="table">
<thead class="thead-dark">
    <tr>
        <th scope="col">File ID</th>
        <th scope="col">File Name</th>
        <th scope="col">Uploaded By</th>
        <th scope="col">Event Name</th>
        <th scope="col"><strong>File </strong><br> (click to view)</th>
        <th scope="col">File Type</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->document_name}}</th>
        <th> {{App\User::find($item->created_by)->fname}} {{App\User::find($item->created_by)->lname}}</th>
        <th> {{$item->event}}</th>
        <th>            

            <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
            @if($item->type == 'doc'||$item->type =='docx'||$item->type =='txt'||$item->type =='pptx')
                    <h1 class="fas fa-file-invoice"></h1>
            @elseif($item->type =='pdf')
                    <h1 class="far fa-file-pdf"></h1>
            @elseif($item->type =='zip')
                    <h1 class="far fa-file-archive"></h1>
            @elseif($item->type == 'jpg'||$item->type == 'png'||$item->type =='png'||$item->type =='jpeg')
                    <h1 class="fas fa-file-image"></h1>
            @elseif($item->type == 'excel'||$item->type == 'xlsm'||$item->type =='xls' ||$item->type =='xlsx')
                    <h1 class="fas fa-excel"></h1>
            @elseif($item->type == 'mkv'||$item->type == 'mp4'||$item->type == 'mov'||$item->type == '3gp'
            ||$item->type == 'wmv'||$item->type == 'avi'||$item->type == 'webm'||$item->type == 'flv')
                    <h1 class="fas fa-file-video"></h1>      
            @else
                    <h1 class="fas fa-info"></h1>
            @endif
            </a>

            <!-- @if($item->type == 'exel')
                <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                    <h1 class="far fa-file-excel "></h1>
                </a>

            @endif -->

            <th> {{$item->type}}</th>
        </th>
        @guest
        @else
            @if (Auth::User()->id == $item->created_by || Auth::User()->role_as == "admin")
            <th><a href ="/edit/{{$item->id}}" class="btn btn-outline-warning btn-sm"> Edit </a></th>
            <th><a href = "/delete/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Delete </a> </th>
            @endif
        @endguest
    </tr>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

