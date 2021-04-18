@extends('layouts.main')


@section('content')

<div class="container" style="min-height: 100vh">
    <h3 class="mt-5 py-5">Edit Donation Event</h3>

    <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="form-group row">
               
                
                {!! Form::open(['action' => ['Donation\DonationEventController@update', $donevent->id], 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
                {!! csrf_field() !!}
                {!!Form::label('name','Name') !!}
                {!!Form::text('name',$donevent->name,$attributes=['placeholder'=>'Event Name','name'=>'name','required']) !!}
                {!!Form::label('description','Description') !!}
                {!!Form::text('name',$donevent->description,$attributes=['placeholder'=>'Event Description','name'=>'description','required']) !!}
                {!!Form::label('coverimage') !!}
                {!!Form::file('coverimage')!!}
                {{Form::hidden('_method', 'PUT')}}
                {!!Form::submit('Edit',$attributes=['class'=>'btn btn-primary btn-sm '])!!}
                <img src= "/donation-resourses/events/images/{{ $donevent->coverimage }}" style="width:50px;height:22px />
                {!!Form::close() !!}

            </div>
    </div>
</div>
@endsection
