@extends('layouts.main')

@section('title','Edit Meeting')
@section('content')
        <div class="container"  style="min-height: 100vh">
            <h1 class="text-center cyan-text pt-5 mb-3">Edit Meeting</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
                    <div class="jumbotron">
                        <h3 class="text-center">{{$meeting->meeting_name}}</h3>
                        <form action="/save-edited-meeting" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="id"value="{{$meeting->meeting_id}}" hidden>
                            <input type="text" name="user" class="form-control my-1" placeholder="Your Name" value="{{$meeting->creator}}" required disabled>
                            <input type="text" name="meetingName" class="form-control my-1" placeholder="Meeting Name" value="{{$meeting->meeting_name}}" required disabled>
                            <textarea name="description" cols="30" rows="3" class="form-control my-1" placeholder="Description" required>{{$meeting->meeting_description}}</textarea>
                            <input type="date" name="date" class="form-control my-1" value="{{$meeting->date}}" min="<?php echo date("Y-m-d"); ?>" required>
                            <input type="time" name="time" class="form-control my-1" value="{{$meeting->time}}" onChange="checkDateAndTime()" required>
                            <input type="text" name="moderatorPwd" class="form-control my-1" placeholder="Set Moderator Password (Not Required)" value="<?php echo $meeting->moderator_password != 'moderator_pwd'? $meeting->moderator_password:''; ?>">
                            <input type="text" name="attendeePwd" class="form-control my-1" placeholder="Set Attendee Password (Not Required)" value="<?php echo $meeting->attendee_password != 'attendee_pwd'? $meeting->attendee_password:''; ?>">
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="recording" <?php if($meeting->recording == true) echo 'checked';?>>
                                    <label class="form-check-label" for="recording">Allow Recording</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="calendar" <?php if($meeting->display_on_calendar == true) echo 'checked';?>>
                                    <label class="form-check-label" for="calendar">Put on Calendar</label>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="text-center">
                                <p id="err" style="color:red"></p>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary mt-3" value="Save">
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
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
