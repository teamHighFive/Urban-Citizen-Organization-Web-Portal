@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    @if (Auth::check())
    <h3 class="mt-5 py-5">Create New Album</h3>
    @endif
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="form-group row">
                        {!!Form::open(array('url'=>'create-album','enctype'=>'multipart/form-data')) !!}
                        {!!Form::label('title','Title') !!}
                        {!!Form::text('title',$value=null,$attributes=['placeholder'=>'Album Title','name'=>'title','required']) !!}
                        {!!Form::label('description','Description') !!}
                        {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Album Description ','name'=>'description','required']) !!}
                        {!!Form::file('coverimage',$attributes=['class' => 'file-path validate px-4','placeholder'=>'Upload your file','required'])!!}
                        {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm'])!!}
                        {!!Form::close() !!}



            
        </div>
    </div>

</div>
@endsection
