@extends('layouts.main')

@section('title','Online Conferences')
@section('content')
        <div class="container"  style="min-height: 100VH">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-center cyan-text pt-5 mb-3">Online Conferencing</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3 class="text-center">Create & Join</h3>
                        <form action="/meeting-create-and-join" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="user" class="form-control my-1" placeholder="Your Name" value="{{ Auth::user()->fname.' '.Auth::user()->mname }}" hidden>
                            <input type="text" name="meetingName" class="form-control my-1" placeholder="Meeting Name" required>
                            <textarea name="description" cols="30" rows="3" class="form-control my-1" placeholder="Description" required></textarea>
                            <input type="text" name="moderatorPwd" class="form-control my-1" placeholder="Set Moderator Password (Not Required)">
                            <input type="text" name="attendeePwd" class="form-control my-1" placeholder="Set Attendee Password (Not Required)">
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="recording">
                                    <label class="form-check-label" for="recording">Allow Recording</label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input type="checkbox" class="form-check-input" name="calendar">
                                    <label class="form-check-label" for="calendar">Display on Calendar</label>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Create & Join">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3 class="text-center">Schedule</h3>
                        <form action="/meeting-schedule" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="user" class="form-control my-1" placeholder="Your Name" value="{{ Auth::user()->fname.' '.Auth::user()->mname }}" hidden>
                            <input type="text" name="meetingName" class="form-control my-1" placeholder="Meeting Name" required>
                            <textarea name="description" cols="30" rows="3" class="form-control my-1" placeholder="Description" required></textarea>
                            <input type="date" name="date" class="form-control my-1" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required>
                            <input type="time" name="time" class="form-control my-1" value="<?php echo date("H:i"); ?>" onChange="checkDateAndTime()" required>
                            <input type="text" name="moderatorPwd" class="form-control my-1" placeholder="Set Moderator Password (Not Required)">
                            <input type="text" name="attendeePwd" class="form-control my-1" placeholder="Set Attendee Password (Not Required)">
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="recording">
                                    <label class="form-check-label" for="recording">Allow Recording</label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input type="checkbox" class="form-check-input" name="calendar">
                                    <label class="form-check-label" for="calendar">Display on Calendar</label>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="text-center">
                                <p id="err" style="color:red"></p>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary mt-3" value="Schedule">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkDateAndTime(){
                var sDate = document.getElementsByName('date')[0].value;
                var sTime = document.getElementsByName('time')[0].value;
                var err =  document.getElementById('err');
                var sBtn = document.getElementsByName('submit')[0];

                err.innerHTML = "";
                sBtn.disabled  = false;

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var h = today.getHours();
                var m = today.getMinutes();
                today = yyyy + '-' + mm + '-' + dd;
                
                newSTime = sTime.split(":")
                nH = newSTime[0];
                nM = newSTime[1];

                if(sDate == today){

                    if(h == nH){
                        if(nM < m){
                            err.innerHTML = `Invalid time. You cannot schedule a meeting for a past time.`;
                            sBtn.disabled  = true;
                        }
                    }else if(nH < h){
                        err.innerHTML = `Invalid time. You cannot schedule a meeting for a past time.`;
                        sBtn.disabled  = true;
                    }
                   
                }
            }

            checkDateAndTime();
        </script>
@endsection
