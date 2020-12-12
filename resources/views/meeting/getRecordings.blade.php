@extends('layouts.main')

@section('title','Meeting Recordings')
@section('content')
    <div class="container" style="min-height: 100vh">
        <div class="jumbotron">
            @if($message == "UNSUCCESS")
                <h3 class="text-center">Somthing went wrong. Please try again later.</h3>
            @elseif($message == "NODATA")
                <h3 class="text-center">No recordings found.</h3>
            @elseif($message == "SUCCESS")
                <h3 class="text-center">Meeting Recordings</h3>
                <table class="table">
                    <tr>
                        <th>Meeting ID</th>
                        <th>Meeting Name</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>

                    @foreach ($recordings as $recording)
                    <tr>
                        <td>{{$recording->meetingID}}</td>
                        <td>{{$recording->name}}</td>
                        <td>{{$recording->name}}</td>
                        <td>{{$recording->name}}</td>
                        <td>{{$recording->name}}</td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
