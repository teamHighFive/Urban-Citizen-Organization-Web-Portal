@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron">
    <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
    Event Archives
    </h2>
    <div class="links">
        <a href="/event-calendar"><button type="submit" name="submit" class="btn btn-light btn-sm">Return to Event-Calender &emsp;<i class="fas fa-eye pr-2"></i></button></a>
    </div>
    <br><br>

<table class="table table-stripped table-bordered">
<thead class="color-block-dark default-color-dark z-depth-2 white-text">
    <tr>
        <th scope="col">Event-ID</th>
        <th scope="col">Title</th>
        <th scope="col">Colour code</th>       
        <th scope="col">Start date</th> 
        <th scope="col">End date</th>  
        
    </tr>
</thead>

<tbody>
    @foreach ($upload as $item)
    <tr>
    <tr>

        <th> {{$item->id}}</th>
        <th> {{$item->title}}</th>
        <th> {{$item->color}}</th>
        <th> {{$item->start_date}}</th>
        <th> {{$item->end_date}}</th>
    @endforeach
</tbody>
</table>

    </div>
</div>
@endsection

