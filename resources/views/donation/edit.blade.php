@extends('layouts.main')


@section('content')

<div class="container" style="min-height: 100vh">
    
    <h3 class="text-center cyan-text pt-5 mb-3"> Edit Donation Event</h3>
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <div class="jumbotron px-3">
            <div class="form-group">
                {!! Form::open(['action' => ['Donation\DonationEventController@update', $donevent->id], 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
                {!! csrf_field() !!}
                {!!Form::label('name','Name') !!}
                <input type="text" name="name" value="{{$donevent->name}}" class="form-control">
                {!!Form::label('description','Description') !!}
                <input type="text" name="description" value="{{$donevent->description}}" class="form-control">
                {!!Form::label('coverimage') !!}
                {!!Form::file('coverimage')!!}
                {{Form::hidden('_method', 'PUT')}}
                </br>
                @if($donevent->coverimage )
                {!!Form::label('Previous image :') !!}
                        <img src= "/donation-resourses/events/images/{{ $donevent->coverimage }}" style="width:100px;">
                        </br>
                @endif
                {!!Form::submit('Edit',$attributes=['class'=>' form-control btn btn-primary btn-sm '])!!}
               
               {!!Form::close() !!}
                </div>
    </div>
    </div>
    <div class="col-lg-3"></div>
    </div>
</div>
@endsection
