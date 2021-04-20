@extends('layouts.main')

@section('title','Upcoming Events')
@section('content')
<div class="container">
    <div class="jumbotron blue-grey lighten-4">
        <h2 class="font-weight-bold text-center text-muted"><strong> Add Event to Calendar</strong></h2>
        <hr>
        <div class="card" >
           
                <div class="col-sm-12">
                    <div class="panel panel-default">
                         <div class="panel-body"><br/><br/>
                            <div class="col-sm-12">
                                
                                <form method="POST" action="{{url('/add-event') }}">
                                    {{ csrf_field() }}


                                   

                                    <label for=""><h5 class="font-weight-bold"><strong>Event Name:</strong></h5></label>
                                    <input type="text" class="form-control col-sm-9" name="title" placeholder="Enter the Name" Required><br/>
                                    
                                    <label for=""><h5 class="font-weight-bold"><strong> Description:</strong></h5></label>
                                    <input type="text" class="form-control col-sm-9" name="description" placeholder="Enter the Description" Required><br/>
                                    
                                    <label for=""><h5 class="font-weight-bold"><strong> Location:</strong></h5></label>
                                    <input type="text" class="form-control col-sm-9" name="location" placeholder="Enter the Location" Required><br/>

                                                           
                                    <label for=""><h5 class="font-weight-bold"><strong> Color:</strong></h5></label>
                                    <input type="color" class="form-control col-sm-9" name="color" placeholder="Enter the color" value="#cccccc" Required><br/>
                                    
                                    <label for=""><h5 class="font-weight-bold"><strong> Start Date:</strong></h5></label>
                                    <input type="datetime-local" id="sDate" onChange="checkDates()" class="form-control col-sm-9" name="start_date" class="date" placeholder="Enter Start date"Required><br/>
                                    
                                    <label for=""><h5 class="font-weight-bold"><strong> End Date:</strong></h5></label>
                                    <input type="datetime-local" id="eDate" onChange="checkDates()" class="form-control col-sm-9" name="end_date" class="date" placeholder="Enter End date"Required><br/>
                                    
                                    <div class="text-center">
                                        <p id="err" style="color:red"></p>
                                        <input type="submit" id="submit" name="submit" disabled class="btn btn-primary float-center mb-5" value="Add Event">
                                    </div>
                                    

                                    <script>
                                        function checkDates(){
                                            var sDate = document.getElementById('sDate').value;
                                            var eDate = document.getElementById('eDate').value;
                                            var err =  document.getElementById('err');
                                            var sBtn = document.getElementById('submit');
                                            if(sDate != "" && eDate != ""){
                                                nsDate = new Date(sDate);
                                                neDate = new Date(eDate);
                                                if(+nsDate < +neDate){
                                                    err.innerHTML = `Loading...`;
                                                    //ajax start
                                                    var xmlhttp = new XMLHttpRequest();
                                                    xmlhttp.onreadystatechange = function() {
                                                    if (this.readyState === 4 && this.status == 200) {

                                                            // let data = this.responseText;
                                                            data = JSON.parse(this.responseText);

                                                            if(data.is_overlap){
                                                                err.innerHTML = "This event is overlaping with another event(s).If you are okay with that you can proceed and add event.";
                                                                sBtn.disabled  = false;
                                                            }else{
                                                                err.innerHTML = "";
                                                                sBtn.disabled  = false;
                                                            }
                                                            
                                                        }
                                                    };
                                                    xmlhttp.open("GET", `http://127.0.0.1:8000/api/is-event-overlap/${sDate}/${eDate}`, true);//generating  get method link
                                                    xmlhttp.send();
                                                    //ajax end
                                                }else{
                                                    err.innerHTML = `Selected dates are invalid. End date & time Should be greater than start date & time`;
                                                }
                                                
                                            }else{
                                                sBtn.disabled  = true;
                                            }
                                        }
                                    </script>
                                    
                                </form>
                                     
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
@endsection
