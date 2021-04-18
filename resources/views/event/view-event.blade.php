@extends('layouts.main')

@section('title','Upcoming Events')
@section('content')
<div class="container">
    <div class="jumbotron  blue-grey lighten-5">
        <div class="card" >

            <table class="table table-responsive-md">
                <thead class="table-dark">
                    <tr>
                        <th><h6 class="font-weight-bold text-center">ID</h6></th>
                        <th><h6 class="font-weight-bold text-center">Title</h6></th>
                        <th><h6 class="font-weight-bold">Description</h6></th>
                        <th><h6 class="font-weight-bold">Location</h6></th>
                        <th><h6 class="font-weight-bold">Color</h6></th>
                        <th><h6 class="font-weight-bold text-center">Start</h6></th>
                        <th><h6 class="font-weight-bold text-center">End</h6></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                
                @foreach($events as $event)
                    <tbody>
                        <tr>
                            <td><p class="font-weight-bold">{{ $event->id}}</p></td>
                            <td><p class="font-weight-bold">{{ $event->title}}</p></td>
                            <td><p class="font-weight-bold">{{ $event->description}}</p></td>
                            <td><p class="font-weight-bold">{{ $event->location}}</p></td>
                            <td><div style="background-color: {{ $event->color}};width:100%;height:25px"></div> </td>
                            <td>{{ $event->start_date}}</td>
                            <td>{{ $event->end_date}}</td>

                            <!-- Edit/Delete buttons -->
                            <td><a class="btn btn-success btn-sm" href="/event@edit/{{$event->id}}">Edit</a></td>
                            <td><a class="btn btn-danger btn-sm mb-5" href="/event@destroy/{{$event->id}}">Delete</a></td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
@endsection
