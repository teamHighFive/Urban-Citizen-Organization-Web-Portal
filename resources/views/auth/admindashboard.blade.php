@extends('layouts.dashboard')

@section('title','Dashboard')
@section('content')

<div class="container" style="height:60vh">
    <img src="https://www.strikingly.com/content/static/a78ab36a143f10abeafab282e4164a8b/6f021/2019-10-29-site-under-construction.jpg" width="500" >
    <a href="{{ url('online-conferences') }}" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-user mr-3"></i>Make Online conferences</a>
</div>


@endsection
