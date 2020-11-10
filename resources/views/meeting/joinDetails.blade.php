@extends('layouts.main')

@section('title','Join Details')
@section('content')



    <?php
        use App\Meeting;
        //get meeting details from DB using $meeting_id
        $meeting = Meeting::find($meeting_id);

        $meetingID = $meeting->meeting_id;
        $meetingName = $meeting->meeting_name;

        $moderatorPassword = $meeting->moderator_password;
        $attendeePassword = $meeting->attendee_password;

    ?>
    <div class="container"  style="min-height: 100VH">
        <h2 class="text-center cyan-text pt-2">Join</h2>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="jumbotron content">
                    <h5 class="text-center">{{$meetingName}}</h5>
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

                        <div class="text-center">
                            <input type="submit" class="btn btn-primary " value="Continue">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
