@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">Upcoming Meetings</h3>
            <table class="table">
                <tr>
                    <th>Meeting ID</th>
                    <th>Meeting Name</th>
                    <th>Description</th>
                    <th>Join Via</th>
                </tr>

                @foreach ($meetings as $meeting)
                <tr>
                    <td>{{$meeting->meeting_id}}</td>
                    <td>{{$meeting->meeting_name}}</td>
                    <td>{{$meeting->meeting_description}}</td>
                    <td><a class="btn btn-info btn-sm" href="/join-details/{{$meeting->meeting_id}}">Join</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
