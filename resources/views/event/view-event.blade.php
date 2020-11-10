@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron  blue-grey lighten-5">
        <div class="card" >

         <table class="table table-striped table-bordered table-hover">
             <thead class="thead">
                 <tr class="warning">
                     <th>ID</th>
                     <th>Title</th>
                     <th>Color</th>
                     <th>Start Date</th>
                     <th>End Date</th>
                     <th>Edit</th>
                     <th>Delete</th>
                 </tr>
             </thead>
           @foreach($events as $event)
                     <tbody>
                         <tr>
                             <td>{{ $event->id}}</td>
                             <td>{{ $event->title}}</td>
                             <td><div style="background-color: {{ $event->color}};width:100%;height:25px"></div> </td>
                             <td>{{ $event->start_date}}</td>
                             <td>{{ $event->end_date}}</td>
                              <!-- Edit button -->
                             <th><a href="{{url('/event@edit/'.$event['id'])}}" class="btn btn-success"> Edit</a></th>
                             <th>
                                 <form method="DELETE" action="{{url('/event@destroy/'.$event['id'])}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                 <form>
                             </th>
                         </tr>
                      </tbody>
             @endforeach
        </table>

     </div>
</div>
@endsection
