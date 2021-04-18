@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <h3 class="mt-5 py-5">Edit Album</h3>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="form-group row">
                        {{-- {!!Form::open(array('url'=>'create-album','enctype'=>'multipart/form-data')) !!} --}}
                        {!! Form::open(['action' => ['Album\AlbumController@update', $album->id], 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
                        {!! csrf_field() !!}
                        {!!Form::label('title','Title') !!}
                        {!!Form::text('title',$album->title,$attributes=['placeholder'=>'Album Title','name'=>'title','required']) !!}
                        {!!Form::label('description','Description') !!}
                        {!!Form::text('description',$album->description,$attributes=['placeholder'=>'Album Description ','name'=>'description','required']) !!}
                        {!!Form::file('coverimage',$attributes=['class' => 'file-path validate px-4','placeholder'=>'Upload your file'])!!}
                        {{Form::hidden('_method', 'PUT')}}
                        {!!Form::submit('Edit',$attributes=['class'=>'btn btn-primary btn-sm'])!!}
                        @if($album->coverimage )
                        <img src= "/gallery-resourses/images/{{ $album->coverimage }}" style="width:50px;height:22px />
                        @endif
                        {!!Form::close() !!}



            
        </div>
    </div>

</div>
@endsection