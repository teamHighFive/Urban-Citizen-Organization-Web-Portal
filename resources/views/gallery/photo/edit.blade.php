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
    <div>
        <div class="p-3 py-5">
        <div class="row column">

            <p class="lead">Edit Uploads</p>
        </div>
        </div>


        <div class="container py-5">
        <div class="">
        <div class="md-form p-3 ">

            {{-- //TODO photot controller store --}}
        {!!Form::open(array('url'=>'add-photo-to-album','enctype'=>'multipart/form-data')) !!}
        {!!Form::label('caption','Caption') !!}
        <input type="text" name="caption" class="form-control">
        {!!Form::label('description','Description') !!}
        <input type="text" name="description" class="form-control">

        <div class="file-field">
            <div class="file-path-wrapper">
                {!!Form::file('image',$attributes=['class' => 'file-path validate','placeholder'=>'Upload images'])!!}
            </div>
        </div>

        <input type="hidden" name="album_id"  value="{{$album_id}}">
        {!!Form::submit('Edit',$attributes=['class'=>'btn btn-primary btn-sm float-left'])!!}
        {!!Form::close() !!}

    </div>
@endsection
