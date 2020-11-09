@extends('layouts.main')
@section('content')
<div class="p-3">
    <div class="row column">
        <h1>Create Album</h1>
        <p class="lead">Create a new Album and start uploading</p>
    </div>
</div>
<div class="container">
    <div class="mt-10">
        <div class="md-form p-3">
            {!!Form::open(array('action'=>'AlbumController@update','enctype'=>'multipart/form-data')) !!}
                <div class="file-path-wrapper">
                    {!!Form::label('title','Title') !!}
                    {!!Form::text('title',$value=null,$attributes=['placeholder'=>'Album Title','name'=>'title']) !!}
                    
                    {!!Form::label('description','Description') !!}
                    {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Album Description','name'=>'description']) !!}
                </div>
            
                <div class="file-field">
                    <div class="file-path-wrapper">
                    {!!Form::file('coverimage',$attributes=['class' => 'file-path validate','placeholder'=>'Upload your file'])!!}
                    {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm float-left '])!!}
                    </div>
                </div>
            {!!Form::close() !!}
            
            
    
        </div>
    </div>
</div>


@endsection






