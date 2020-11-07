@extends('layouts.main')

@section('title','Join Details')
@section('content')
    <div class="title flex-center position-ref">Join</div>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="jumbotron content">
                    <br>
                    <form action="/meeting-join" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="meetingID" value="{{$meetingID}}">
                        <input type="hidden" name="userType" value="{{$userType}}">
                        <input type="hidden" name="user" value="{{$user}}">

                        <?php
                            use App\Meeting;
                            //get meeting details from DB using $meeting_id
                            $meeting = Meeting::find($meetingID);

                            $meetingID = $meeting->meeting_id;
                            $meetingName = $meeting->meeting_name;

                            $moderatorPassword = $meeting->moderator_password;
                            $attendeePassword = $meeting->attendee_password;
                        ?>

                        @if($userType == 'attendee' && $attendeePassword != 'attendee_pwd')
                            <input type="text" name="password" class="form-control" placeholder="Attendee Password">
                        @elseif($userType == 'attendee' && $attendeePassword == 'attendee_pwd')
                            <p>This session doesn't need any password</p>
                            <input type="hidden" name="password" value="attendee_pwd">
                        @elseif($userType == 'moderator' && $moderatorPassword != 'moderator_pwd')
                            <input type="text" name="password" class="form-control" placeholder="Moderator Password">
                        @elseif($userType == 'moderator' && $moderatorPassword == 'moderator_pwd')
                            <p>This session doesn't need any password</p>
                            <input type="hidden" name="password" value="moderator_pwd">
                        @endif

                        <input type="submit" class="btn btn-primary margin-10" value="Join">
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection




