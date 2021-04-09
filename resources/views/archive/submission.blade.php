@extends('layouts.main')

@section('title','Archives')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Submissions
    </h2>
    <div class="links">
        <a href="/arc"><button type="submit" name="submit" class="btn btn-light btn-sm">Check archives &emsp;<i class="fas fa-file"></i></button></a>
    </div>
    <br><br>

<table class="table">
<thead class="color-block default-color z-depth-2 white-text">
    <tr>
        <th scope="col">Submission file name</th>
        <th scope="col">Uploaded by</th>
        <th scope="col">Owner ID</th>
        <th scope="col">Description</th>        
        <th scope="col"><strong>File </strong><br> (click to view)</th>
        <th scope="col">Remove</th>
        
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->file_name}}</th>        
        <th> {{App\User::find($item->created_by)->fname}} {{App\User::find($item->created_by)->lname}} </th>
        <th> {{$item->created_by}}</th>
        <th> {{$item->Description}}</th>
        <th>            

            <a target="_blank" href="{{ asset ('uploads/files/exel'.$item->type.'/' . $item->file) }}">
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

        <th><a href = "/deletsubmissionfile/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Remove </a> </th>

    </tr>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

