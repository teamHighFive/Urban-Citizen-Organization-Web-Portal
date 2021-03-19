@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron  blue-grey lighten-5">
        <div class="card" >

         <table class="table table-hover">
             <thead class="thead">
                 <tr class="warning">
                     <th>ID</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Location</th>
                     <th>Color</th>
                     <th>Start</th>
                     <th>End</th>
                     <th></th>
                     <th></th>
                 </tr>
             </thead>
           @foreach($events as $event)
                     <tbody>
                         <tr>
                             <td>{{ $event->id}}</td>
                             <td>{{ $event->title}}</td>
                             <td>{{ $event->description}}</td>
                             <td>{{ $event->location}}</td>
                             <td><div style="background-color: {{ $event->color}};width:100%;height:25px"></div> </td>
                             <td>{{ $event->start_date}}</td>
                             <td>{{ $event->end_date}}</td>

                              <!-- Edit/Delete buttons -->
                             <td><a class="btn btn-success btn-sm" href="/event@edit/{{$event->id}}">Edit</a></td>
                             <td><a class="btn btn-danger btn-sm" href="/event@destroy/{{$event->id}}">Delete</a></td>
                         </tr>
                      </tbody>
             @endforeach
        </table>

     </div>
</div>
@endsection
