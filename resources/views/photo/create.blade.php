@extends('layouts.main')
@section('content')
    <div class="callout primary">
        <div class="row column">
            <h1>Upload Photo</h1>
            <p class="lead"Upload  photos to create gallery></p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="form-group">
            {!!Form::open(array('action'=>'PhotoController@store','enctype'=>'multipart/form-data')) !!}
            {!!Form::label('title','Title') !!}
            {!!Form::text('title',$value=null,$attributes=['placeholder'=>'Photo Title','name'=>'title']) !!}
            {!!Form::label('description','Description') !!}
            {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Photo Description','name'=>'description']) !!}
            {!!Form::label('location','Location') !!}
            {!!Form::text('location',$value=null,$attributes=['placeholder'=>'Photo Location','name'=>'location']) !!}
            {!!Form::label('owner_id','owner_id') !!}
            {!!Form::text('owner_id',$value=null,$attributes=['placeholder'=>'Photo Location','name'=>'owner_id']) !!}
            {!!Form::label('image','Photo') !!}
            {!!Form::file('image')!!}
            <input type="hidden" name="gallery_id"  value="{{$gallery_id}}">
            {!!Form::submit('Submit',$attributes=['class'=>'button'])!!}
            {!!Form::close() !!}
        </div>
    </div>
@endsection
