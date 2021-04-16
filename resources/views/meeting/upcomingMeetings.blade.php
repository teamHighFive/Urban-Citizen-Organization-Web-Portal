@extends('layouts.dashboard')
@section('header')
    <script>
        function copyToClipboard(id) {
            // document.getElementById(id).select();
            // document.execCommand('copy');
            // alert(document.getElementById(id).value);
            var copyText = document.getElementById(id);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copied Link: " + copyText.value);
        }
    </script>
@endsection
@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

            <div class="container" style="min-height: 100vh; width:100%;">
                <div class="jumbotron">
                    <h3 class="text-center">Upcoming Meetings</h3>
                    <table class="table">
                        @foreach ($meetings as $meeting)
                        <tr>
                            <td>
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$meeting->meeting_name}} (Meeting ID : {{$meeting->meeting_id}})</h5>
                                    <p class="card-text">{{$meeting->meeting_description}}</p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="card-text"><b>Date : </b>{{$meeting->date}}</p>
                                            <p class="card-text"><b>Time : </b><?php echo substr($meeting->time, 0, 5); ?></p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="card-text"><b>Attendee Password : </b><?php echo $meeting->attendee_password != 'attendee_pwd'? $meeting->attendee_password:'No password'; ?></p>
                                            <p class="card-text"><b>Moderator Password : </b><?php echo $meeting->moderator_password != 'moderator_pwd'? $meeting->moderator_password:'No password'; ?></p>
                                        </div>
                                    </div> 
                                    <br>  
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="btn btn-info btn-md my-0 mx-0" href="/join-details/{{$meeting->meeting_id}}">Join</a>
                                            <a class="btn btn-success btn-md my-0 mx-0" href="/send-meeting-notifications/{{$meeting->meeting_id}}">Send Invitations</a>
                                        </div>
                                        <div class="col-lg-6 input-group mb-1">
                                            <input class="form-control" type="text" id="{{$meeting->meeting_id}}" value="{{getenv('APP_URL')}}:8000/join-via-link/{{$meeting->meeting_id}}">
                                            <div class="input-group-append">
                                                <button class="btn btn-warning btn-sm my-0 mx-0" type="button" onclick="copyToClipboard('{{$meeting->meeting_id}}')">Copy Link</button>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                </div>
                            </td>
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
