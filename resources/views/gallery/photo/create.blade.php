@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <h3 class="mt-5 py-5">Upload Photos</h3>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="form-group row">
            {!!Form::open(array('url'=>'add-photo-to-album','enctype'=>'multipart/form-data')) !!}
            {!!Form::label('caption','Caption') !!}
            {!!Form::text('caption',$value=null,$attributes=['placeholder'=>'Photo Caption','name'=>'caption']) !!}
            {!!Form::label('description','Description') !!}
            {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Photo Description','name'=>'description']) !!}
            {!!Form::label('location','Location') !!}
            {!!Form::text('location',$value=null,$attributes=['placeholder'=>'Photo Location','name'=>'location']) !!}
            {!!Form::file('image[]',['multiple'=>'multiple'],$attributes=['class' => 'file-path validate','placeholder'=>'Upload images'])!!}
            <input type="hidden" name="album_id"  value="{{$album_id}}">
            {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm float-left'])!!}
            {!!Form::close() !!}
        </div>
    </div>

</div>
@endsection






