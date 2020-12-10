@extends('layouts.main')


@section('content')

<div class="container" style="min-height: 100vh">
    <h3 class="mt-5 py-5">Edit Donation Event</h3>

    <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="form-group row">
                {{-- //TODO --}}
                {!!Form::open(array('url'=>'update-donevent/{id}','enctype'=>'multipart/form-data')) !!}
                @csrf
            
                {!!Form::label('name','Name') !!}
                {!!Form::text('name',$donevent->name,$attributes=['placeholder'=>'Event Name','name'=>'name','required']) !!}
                {!!Form::label('description','Description') !!}
                {!!Form::text('name',$donevent->description,$attributes=['placeholder'=>'Event Description','name'=>'description','required']) !!}
                {!!Form::label('coverimage') !!}
                {{-- {!!Form::file('coverimage',('url'->'donation-resourses/events/images'/.$donevent->coverimage)!!} --}}
                {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm '])!!}
                {!!Form::close() !!}


            </div>
    </div>
</div>
@endsection
