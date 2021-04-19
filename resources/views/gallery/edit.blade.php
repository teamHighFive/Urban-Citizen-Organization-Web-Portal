@extends('layouts.main')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container" style="min-height: 100vh">
    
    <h3 class="text-center cyan-text pt-5 mb-3">Edit Album</h3>
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <div class="jumbotron px-3">
            <div class="form-group">
                        {{-- {!!Form::open(array('url'=>'create-album','enctype'=>'multipart/form-data')) !!} --}}
                        {!! Form::open(['action' => ['Album\AlbumController@update', $album->id], 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
                        {!! csrf_field() !!}
                        {!!Form::label('title','Title') !!}
                        <input type="text" name="title" class="form-control" value="{{$album->title}}">
                        {!!Form::label('description','Description') !!}
                        <input type="text" name="description" value="{{$album->description}}" class="form-control">
                        {!!Form::label('coverimage','Cover Image') !!}
                        {!!Form::file('coverimage',$attributes=['class' => 'form-control','placeholder'=>'Upload your file'])!!}
                        {{Form::hidden('_method', 'PUT')}}
                        </br>
                        @if($album->coverimage )
                        {!!Form::label('Previous image :') !!}
                        <img src= "/gallery-resourses/images/{{ $album->coverimage }}" style="width:100px;">
                        @endif
                        </br>
                        {!!Form::submit('Edit',$attributes=['class'=>'form-control btn btn-primary btn-sm'])!!}
                        
                        {!!Form::close() !!}
                        
                        



            
        </div>
    </div>

</div>
@endsection