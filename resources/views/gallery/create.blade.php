@extends('layouts.main')

@section('content')
<div class="callout primary">
    <div class="row column">
        <h1>Create gallery</h1>
        <p class="lead">Create a new gallery and start uploading</p>
    </div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
    <div class="form-group row">

        {!!Form::open(array('action'=>'GalleryController@store','enctype'=>'multipart/form-data')) !!}
        {!!Form::label('name','Name') !!}
        {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Gallery Name','name'=>'name']) !!}
        {!!Form::label('description','Description') !!}
        {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Gallery Description','name'=>'description']) !!}
        {!!Form::label('coverimage','coverimage') !!}
        {!!Form::file('coverimage',$attributes=['class' => 'cropit-image-input'])!!}
        {!!Form::submit('Submit',$attributes=['class'=>'button'])!!}
        {!!Form::close() !!}



    </div>
</div>
@endsection
