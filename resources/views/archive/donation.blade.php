@extends('layouts.main')

@section('title','Archives')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Donation Archives
    </h2>
    <div class="links">
        <a href="/donate-file-form"><button type="submit" name="submit" class="btn btn-light btn-sm">Upload another file &emsp;<i class="fas fa-hand-holding-usd"></i></button></a>
    </div>
    <br><br>

<table class="table">
<thead class="color-block-dark teal lighten-1-color-dark z-depth-2 white-text">
    <tr>
        <th scope="col">File-ID</th>
        <th scope="col">Document details</th>
        <th scope="col">Uploaded By</th>
        <th scope="col">Description</th>       
        <th scope="col">File <br> (click to view)</th>  
        <th>Type</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->document_details}}</th>
        <th> {{App\User::find($item->created_by)->fname}} {{App\User::find($item->created_by)->lname}}</th>
        <th> {{$item->description}}</th>
        <th>            

            <a target="_blank" href="{{ asset ('uploads/donate_files'.$item->type.'/' . $item->file) }}">
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
        @if(!Auth::guest())
            @if (Auth::User()->id == $item->created_by)  
            <th><a href ="/edit_don/{{$item->id}}" class="btn btn-outline-warning btn-sm"> Edit </a></th>
            <th><a href = "/deletedon/{{$item->id}}" class="btn btn-outline-danger btn-sm"> Delete </a> </th>
            @endif
        @endif
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

