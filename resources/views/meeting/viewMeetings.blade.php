@extends('layouts.main')

@section('title','Meetings')
@section('header')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }
    </script>
@endsection
@section('content')
    <div class="container" style="min-height: 100VH">
        <div class="jumbotron">
            <h3 class="text-center">All Meetings</h3>
            <table class="table">
                <tr>
                    <th>Meeting ID</th>
                    <th>Meeting Name</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach ($meetings as $meeting)
                <tr>
                    <td>{{$meeting->meeting_id}}</td>
                    <td>{{$meeting->meeting_name}}</td>
                    <td>{{$meeting->meeting_description}}</td>
                    <td><a class="btn btn-info btn-sm" href="/edit-meeting/{{$meeting->meeting_id}}">Edit</a></td>
                    <td><a class="btn btn-danger btn-sm" href="/delete-meeting/{{$meeting->meeting_id}}">Delete</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
