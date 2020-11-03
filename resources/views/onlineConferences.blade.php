@extends('layouts.main')

@section('title','Online Conferences')
@section('content')
    <div class="welcome-body">
        <div class="title flex-center position-ref">Online Conferencing</div>

        <?php
            // ToDo - Get the logged user
            $logged = 1; // 1 for true, 0 for false
        ?>
        @if ($logged == 1){{--If a user has logged in--}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="jumbotron content">
                            <div class="subtitle flex-center position-ref">Create & Join</div>
                            <form action="/meeting-create-and-join" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="user" class="form-control" placeholder="Your Name" required>
                                <input type="text" name="meetingName" class="form-control" placeholder="Meeting Name" required>
                                <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Description" required></textarea>
                                <input type="text" name="moderatorPwd" class="form-control" placeholder="Set Moderator Password (Not Required)">
                                <input type="text" name="attendeePwd" class="form-control" placeholder="Set Attendee Password (Not Required)">
                                <div class="form-check margin-10" align='left'>
                                    <input type="checkbox" class="form-check-input" name="recording">
                                    <label class="form-check-label" for="recording">Allow Recording</label>
                                </div>
                                <input type="submit" class="btn btn-primary margin-10" value="Create & Join">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="jumbotron content">
                            <div class="subtitle flex-center position-ref">Schedule</div>
                            <form action="/meeting-schedule" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="user" class="form-control" placeholder="Your Name" required>
                                <input type="text" name="meetingName" class="form-control" placeholder="Meeting Name" required>
                                <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Description" required></textarea>
                                <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required>
                                <input type="time" name="time" class="form-control" value="<?php echo date("H:i"); ?>" required>
                                <input type="text" name="moderatorPwd" class="form-control" placeholder="Set Moderator Password (Not Required)">
                                <input type="text" name="attendeePwd" class="form-control" placeholder="Set Attendee Password (Not Required)">
                                <div class="row margin-10">
                                    <div class="col-md-2"></div>
                                    <div class="form-check col-md-4" >
                                        <input type="checkbox" class="form-check-input" name="recording">
                                        <label class="form-check-label" for="recording">Allow Recording</label>
                                    </div>
                                    <div class="form-check col-md-4">
                                        <input type="checkbox" class="form-check-input" name="calendar">
                                        <label class="form-check-label" for="calendar">Put on Calendar</label>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <input type="submit" class="btn btn-primary margin-10" value="Schedule">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


