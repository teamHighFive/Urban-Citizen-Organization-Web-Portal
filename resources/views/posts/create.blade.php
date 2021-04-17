@extends('layouts.userdashboard')

@section('title','Create Post')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
    <div class="card text-body bg-info mb-3 mt-2">
        <div class="card-header font-weight-bold text-white">
            <h1><b>Create New Post</b></h1>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-body">
                    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::text('title','',['class'=> 'form-control','required' => '', 'placeholder'=> 'Title'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::textarea('body','',['class'=> 'form-control','required' => '', 'placeholder'=> 'Body'])}}
                    </div>

                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>
                    {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
