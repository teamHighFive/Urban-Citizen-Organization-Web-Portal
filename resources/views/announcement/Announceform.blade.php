@extends('layouts.dashboard')
@section('title','Announcements')
@section('content')

    <div class="container" >
        <h2 class="text-center cyan-text pt-5 mb-3">Add Announcement</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                
                
                    <form action="{{ route('submit') }}" name="myform" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}   
                    {{ method_field('POST')}}                                

                            <input type="text" name="topic" class="form-control my-1" placeholder="What is announcement about" required>

                            <div class="form-outline">
                                <textarea class="form-control" name="body" id="body" rows="4" placeholder="Announcement" required></textarea>
                            </div>
<br>
                            <label class="my-1">Set permission to view</label>
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="permissionmember" value="editor">
                                    <label for="permissionmember" class="form-check-label">Members</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="permissionvisitor" value="editor">
                                    <label for="permissionvisitor" class="form-check-label">Visitors</label>
                                </div>
                                <br>   <br>                                
                            </div>
                            <div>                       
                                <p> Select the date schedule for show announcement </p> </div>
                                <label for="schedulestart">Since:</label>
                                <input onChange="dateVal()" type="date" id="schedulestart" name="schedulestart" required>
                                <label for="scheduleend">&emsp; To: </label>
                                <input onChange="dateVal()" type="date" id="scheduleend" name="scheduleend" required>
                        <br>
                            

                            <br>
                            <p id="err" style="color:red"></p>
                            <!-- <button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button> -->
                            <button type="submit" id="announceButton" name="submit" class="btn btn-primary waves-effect waves-light" data-toggle="modal">PUBLISH &nbsp; <i class="fas fa-volume-up"></i></button>
                                                     
                    </form>  
                    <script>
                    

                    

                    function dateVal(){
                        var since = document.getElementById("schedulestart").value ;
                        var to = document.getElementById("scheduleend").value ;

                        

                        if(since != "" && to != ""){
                             since = new Date(since);
                             to = new Date(to);
                            var now = new Date();

                            now = new Date(formatDate(now));
                            if(+since <= +to && +to >= +now){
                                document.getElementById("announceButton").disabled = false;
                                document.getElementById("err").innerHTML = "";
                            }else{
                                document.getElementById("announceButton").disabled = true;
                                document.getElementById("err").innerHTML = "Please provide a valide time period";
                            }
                        }else{
                            document.getElementById("announceButton").disabled = true;
                            document.getElementById("err").innerHTML = "Please provide a valide time period";
                        }
                        
                    }

                    function formatDate(date) {
                        var d = new Date(date),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();

                        if (month.length < 2) 
                            month = '0' + month;
                        if (day.length < 2) 
                            day = '0' + day;

                        return [year, month, day].join('-');
                    }
                </script>
                    <br>
                            <a href="/announcement"><button type="submit" name="submit" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal"><i class="fas fa-arrow-circle-left"></i> &nbsp;Back to announcement page</button></a>
                            <a href="/"><button type="submit" name="submit" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal"><i class="fas fa-home"></i> &nbsp; Back to home</button></a>
                  
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
