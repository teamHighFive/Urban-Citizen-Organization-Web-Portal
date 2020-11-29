@extends('layouts.userdashboard')

@section('title','Dashboard')
@section('content')

<div class="container" style="height:60vh">
    @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
    @endif
    <img src="https://www.strikingly.com/content/static/a78ab36a143f10abeafab282e4164a8b/6f021/2019-10-29-site-under-construction.jpg" width="500" >

</div>

@endsection
