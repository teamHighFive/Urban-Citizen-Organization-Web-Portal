@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

            <div class="container" style="min-height: 100vh; width:90%;">
                <div class="jumbotron">
                    <h3 class="text-center">Upcoming Meetings</h3>
                    <table class="table">
                        <tr>
                            <th>Meeting ID</th>
                            <th>Meeting Name</th>
                            <th>Description</th>
                            <th>Join Via</th>
                            <th></th>
                        </tr>

                        @foreach ($meetings as $meeting)
                        <tr>
                            <td>{{$meeting->meeting_id}}</td>
                            <td>{{$meeting->meeting_name}}</td>
                            <td>{{$meeting->meeting_description}}</td>
                            <td><a class="btn btn-info btn-sm" href="/join-details/{{$meeting->meeting_id}}">Join</a></td>
                            <td><a class="btn btn-success btn-sm" href="/send-meeting-notifications/{{$meeting->meeting_id}}">Send Invitations</a></td>
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
