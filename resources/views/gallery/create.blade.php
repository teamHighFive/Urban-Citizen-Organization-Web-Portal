@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <div class="p-5 ">
        <div class="row column">
            <h3>Create Album</h3>
            <p class="lead ">Create a new Album and start uploading</p>
        </div>
    </div>
    <div class="container py-5">
        <div class="">
            <div class="md-form p-3">
                        {!!Form::open(array('url'=>'create-album','enctype'=>'multipart/form-data')) !!}
                        {!!Form::label('title','Title') !!}
                        {!!Form::text('title',$value=null,$attributes=['placeholder'=>'Album Title','name'=>'title']) !!}
                        {!!Form::label('description','Description') !!}
                        {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Album Description ','name'=>'description']) !!}
                        {!!Form::file('coverimage',$attributes=['class' => 'file-path validate px-4','placeholder'=>'Upload your file'])!!}
                        {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm '])!!}
                        {!!Form::close() !!}



            </div>
        </div>
    </div>

</div>
@endsection
