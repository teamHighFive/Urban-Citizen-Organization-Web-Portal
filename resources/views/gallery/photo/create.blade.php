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
    
    <h3 class="text-center cyan-text pt-5 mb-3">Upload Photos</h3>
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <div class="jumbotron px-3">
            <div class="form-group">
            {!!Form::open(array('url'=>'add-photo-to-album','enctype'=>'multipart/form-data')) !!}
            {!!Form::label('caption','Caption') !!}
            <input type="text" name="caption" class="form-control">
            {!!Form::label('description','Description') !!}
            <input type="text" name="description" class="form-control">
            <input type="file" name="image[]" id="image" class="form-control" multiple="multiple" required>
            <input type="hidden" name="album_id"  value="{{$album_id}}">
            {!!Form::submit('Submit',$attributes=['class'=>' form-control btn btn-primary btn-sm float-left'])!!}
            {!!Form::close() !!}
            </div>
    </div>
    </div>
    <div class="col-lg-3"></div>
    </div>
</div>
@endsection






