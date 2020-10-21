<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />

    <title>Join Details</title>
</head>
<body>
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
</body>
</html>




