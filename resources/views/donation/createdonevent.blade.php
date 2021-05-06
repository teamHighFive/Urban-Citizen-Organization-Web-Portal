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
    
    <h3 class="text-center cyan-text pt-5 mb-3">Create New Donation Event</h3>
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <div class="jumbotron px-3">
            <div class="form-group">
                {!!Form::open(array('url'=>'create-donation','enctype'=>'multipart/form-data')) !!}
                @csrf
                {!!Form::label('name','Name') !!}
                <input type="text" name="name" class="form-control" required>
                {!!Form::label('description','Description') !!}
                <input type="text" name="description" class="form-control" required>
                {!!Form::label('coverimage','Cover Image') !!}
                </br>
                {!!Form::file('coverimage',$attributes=['name'=>'coverimage','required'])!!}
                </br>
                {!!Form::submit('Submit',$attributes=['class'=>'form-control btn btn-primary btn-sm '])!!}
                {!!Form::close() !!}

             </div>
    </div>
    </div>
    <div class="col-lg-3"></div>
    </div>
</div>
@endsection
