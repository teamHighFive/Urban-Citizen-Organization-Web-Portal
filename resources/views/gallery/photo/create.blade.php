@extends('layouts.main')

@section('content')
    <div>
        <div class="p-3 py-5">
        <div class="row column">

            <p class="lead">Upload photos</p>
        </div>
        </div>


        <div class="container py-5">
        <div class="">
        <div class="md-form p-3 ">

            {{-- //TODO photot controller store --}}
        {!!Form::open(array('url'=>'add-photo-to-album','enctype'=>'multipart/form-data')) !!}
        {!!Form::label('caption','Caption') !!}
        {!!Form::text('caption',$value=null,$attributes=['placeholder'=>'Photo Caption','name'=>'caption']) !!}
        {!!Form::label('description','Description') !!}
        {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Photo Description','name'=>'description']) !!}
        {!!Form::label('location','Location') !!}
        {!!Form::text('location',$value=null,$attributes=['placeholder'=>'Photo Location','name'=>'location']) !!}

        <div class="file-field">
            <div class="file-path-wrapper">
                {!!Form::file('image',$attributes=['class' => 'file-path validate','placeholder'=>'Upload images'])!!}
            </div>
        </div>

        <input type="hidden" name="album_id"  value="{{$album_id}}">
        {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm float-left'])!!}
        {!!Form::close() !!}

    </div>
@endsection
