@extends('layouts.dashboard')
@section('title','Meeting Details')
@section('content')

<div class="container" style="min-height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

            <div class="container" style="min-height: 100vh; width:100%;">
                <div class="jumbotron">
                    <div class="card">
                    <div class="card-body">
                        <h1 class="card-title my-3 text-center text-primary">{{$meeting->meeting_name}} (Meeting ID : {{$meeting->meeting_id}})</h1>
                        <div class="note note-primary my-1"> 
                            <p class="card-text">{{$meeting->meeting_description}}</p>
                        </div>
                        <div class="note note-info my-1"> 
                            <p class="card-text"><b>Created By : </b>{{$meeting->creator}}</p>
                            <p class="card-text"><b>Recording : </b>{{$meeting->recording == 1 ? 'Allowed' : 'Not Allowed'}}</p>
                            <p class="card-text"><b>Display on Calendar : </b>{{$meeting->display_on_calendar == 1 ? 'Allowed' : 'Not Allowed'}}</p>
                            <p class="card-text"><b>Admin Approval : </b>{{$meeting->approval == 1 ? 'Done' : 'Pending for admin approval'}}</p>
                            <p class="card-text"><b>Status : </b>{{$meeting->status == 1 ? 'Ended/Canceled' : 'Available'}}</p>
                        </div>
                        <div class="note note-success my-1"> 
                            <p class="card-text"><b>Date : </b>{{$meeting->date}}</p>
                            <p class="card-text"><b>Time : </b><?php echo substr($meeting->time, 0, 5); ?></p>
                        </div>
                        <div class="note note-danger my-1">    
                            <p class="card-text"><b>Attendee Password : </b><?php echo $meeting->attendee_password != 'attendee_pwd'? $meeting->attendee_password:'No password'; ?></p>
                            <p class="card-text"><b>Moderator Password : </b><?php echo $meeting->moderator_password != 'moderator_pwd'? $meeting->moderator_password:'No password'; ?></p>
                        </div>
                    </div>
                    </div>
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
