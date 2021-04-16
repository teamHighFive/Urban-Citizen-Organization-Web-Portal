@extends('layouts.dashboard')
@section('title','All Meetings')
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>
                <div class="container" style="min-height: 100VH; width:90%;">
                    <div class="jumbotron">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="text-center">All Meetings</h3>
                        <table class="table">
                            <tr>
                                <th>Meeting ID</th>
                                <th>Meeting Name</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                            @foreach ($meetings as $meeting)
                            <tr>
                                <td>{{$meeting->meeting_id}}</td>
                                <td>{{$meeting->meeting_name}}</td>
                                <td>{{$meeting->meeting_description}}</td>
                                <td><a class="btn btn-success btn-sm" href="/view-meeting-details/{{$meeting->meeting_id}}">View</a></td>
                                <td><a class="btn btn-info btn-sm" href="/edit-meeting/{{$meeting->meeting_id}}">Edit</a></td>
                                <td><a class="btn btn-danger btn-sm" href="/delete-meeting/{{$meeting->meeting_id}}">Delete</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1 class="text-center cyan-text pt-5 mb-3">Only Admins have the permission to access this page</h1>
        <?php
                }
        ?>
</div>


@endsection
