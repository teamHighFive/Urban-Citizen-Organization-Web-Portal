@extends('layouts.main')


@section('content')

<div class="container" style="min-height: 100vh">
    <h3 class="mt-5 py-5">Create New Donation Event</h3>

    <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="form-group row">
                
                {!!Form::open(array('url'=>'create-donation','enctype'=>'multipart/form-data')) !!}
                @csrf
                {!!Form::label('name','Name') !!}
                {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Event Name','name'=>'name','required']) !!}
                {!!Form::label('description','Description') !!}
                {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Event Description','name'=>'description','required']) !!}
                {!!Form::label('coverimage') !!}
                {!!Form::file('coverimage')!!}
                {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm '])!!}
                {!!Form::close() !!}


            </div>
    </div>
</div>
@endsection
