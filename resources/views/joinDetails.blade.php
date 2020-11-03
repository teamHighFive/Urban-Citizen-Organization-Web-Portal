@extends('layouts.main')

@section('title','Join Details')
@section('content')
    <div class="title flex-center position-ref">Join</div>

    <?php
        use App\Meeting;
        //get meeting details from DB using $meeting_id
        $meeting = Meeting::find($meeting_id);

        $meetingID = $meeting->meeting_id;
        $meetingName = $meeting->meeting_name;

        $moderatorPassword = $meeting->moderator_password;
        $attendeePassword = $meeting->attendee_password;

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="jumbotron content">
                    <div class="subtitle flex-center position-ref">{{$meetingName}}</div>
                    <br>
                    <form action="/meeting-join-pwd" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="user" class="form-control" placeholder="Your Name" required>
                        <br>

                        <div class="row margin-10">
                            <div class="form-check col-md-6" >
                                <input class="radio-inline" type="radio" id="attendee" name="userType" value="attendee" checked>
                                <label class="control-label" for="attendee">Join as an Attendee</label>
                            </div>
                            <div class="form-check col-md-6">
                                <input class="radio-inline" type="radio" id="moderator" name="userType" value="moderator">
                                <label class="control-label" for="moderator">Join as an Moderator</label>
                            </div>
                        </div>
                        <br>

                        <input type="hidden" name="meetingID" value="{{$meetingID}}">

                        <input type="submit" class="btn btn-primary margin-10" value="Continue">
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
