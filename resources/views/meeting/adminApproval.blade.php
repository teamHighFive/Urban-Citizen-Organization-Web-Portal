@extends('layouts.dashboard')
@section('title','Admin Approval')
@section('content')

<div class="container" style="min-height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>



            <div class="container" style="min-height: 100VH; width:90%;">
                <div class="jumbotron">
                    <h3 class="text-center">Pending for Admin Approval</h3>
                    <table class="table">
                        <tr>
                            <th>Meeting ID</th>
                            <th>Meeting Name</th>
                            <th>Description</th>
                            <th>Approval</th>
                            <th>Rejection</th>
                        </tr>

                        @foreach ($meetings as $meeting)
                        <tr>
                            <td>{{$meeting->meeting_id}}</td>
                            <td>{{$meeting->meeting_name}}</td>
                            <td>{{$meeting->meeting_description}}</td>
                            <td><a class="btn btn-info btn-sm" href="/approve-meeting/{{$meeting->meeting_id}}">Approve</a></td>
                            <td><a class="btn btn-danger btn-sm" href="/reject-meeting/{{$meeting->meeting_id}}">Reject</a></td>
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

