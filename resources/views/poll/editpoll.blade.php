@extends('layouts.dashboard')
@section('title','Edit-Poll')
@section('content')   
   
  




    <div class="container mt-5">

        <div class="jumbotron mt-4">
          <h2 class="font-weight-bold text-center text-muted"> Update Poll </h2>
          <hr>
            <form  action="{{url('/pollupdate/'.$id)}}" method="POST"> 
              {{ csrf_field() }}
                
                <div class="form-group mb-4">
                  <label><strong>Question:</strong></label>
                  <input class="form-control form-control-lg" type="text" placeholder="Type the Poll Question" name="Question" value="{{$questions->descrition}}"Required>
                </div>
                <div class="form-group mt-4 mb-4">
                  <!-- <label><strong>Pool Count</strong></label> -->
                  
                  <input class="form-control form-control-lg" type="hidden" id="poolCount" value="<?php echo(count($options)) ?>" name="poolCount">
                </div>

                <div class="form-group mb-4">
                  <label><strong>End date & Time:</strong></label>
                  <input type="datetime-local" class="form-control" name="end_date" class="date" min="{{Carbon\Carbon::now()->format('Y-m-d').'T'.Carbon\Carbon::now()->format('H:i')}}" placeholder="Enter End date"  value="{{ date('Y-m-d\TH:i', strtotime($questions->end_date))}}"Required>
                </div>

                <div class="form-group mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="anonymous"  <?php if($questions->is_anonymous == true) echo 'checked';?>>
                  <label class="form-check-label" for="flexCheckDefault">
                      make this poll anonymous
                  </label>
                  </div>
                  </div>



                <div class="text-center">
                  {{ method_field('PUT')}}
                  <button type="submit" name="submit" class="btn btn-primary float-center"><strong>Update</strong></button>
                </div>
                <hr>
                </form>
                <label><strong>Options:</strong></label>
                @foreach($options as $option)
                    <div class="form-group mb-3" id="optionDiv<?php echo($option->id) ?>">
                        <input id="opinput<?php echo($option->id) ?>" onKeyDown="onChangeInput(<?php echo($option->id)  ?>)" type="text" name="option[]" class="form-control mb-2 col-sm-7" placeholder="Type Second Option" value="{{$option->option_name}}"Required>
                        <p style="color:red" id="opErr<?php echo($option->id) ?>"></p>
                        <div class="btn btn-sm btn-danger"  onClick="deleteOption(<?php echo($option->id) ?>)">X</div>
                        <div class="btn btn-sm btn-primary" onClick="editOption(<?php  echo($option->id) ?>)" id="op<?php echo($option->id)  ?>"  style="visibility:hidden">Update</div>
                    </div>
                @endforeach


                <div  class="form-group mb-34" id="poolOptions">
        
                </div>
                <!-- //TODO -->
                <!-- <div class="btn btn-primary btn-sm" onClick="addNewOption()">+</div> -->
                
              <script>
                  function onChangeInput(op) {
                    var btn = document.getElementById(`op${op}`);
                    btn.style.visibility = "visible";
                  }

                  function deleteOption(op){
                    var content = document.getElementById(`optionDiv${op}`);
                    content.innerHTML = "<p style='color:red'>Deleting.....</p>"

                    //ajax start
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                        if (this.readyState === 4 && this.status == 200) {
                                                content.remove();
                                                // let data = this.responseText;
                                                data = JSON.parse(this.responseText);
                                                console.log(data);
                                                // console.log(data.clapCount);
                                                
                                                // document.getElementById("clapCount").innerHTML  =  data.clapCount;
                                                
                                            
                                            }
                                        };
                                        xmlhttp.open("GET", 'http://127.0.0.1:8000/api/delete-option/'+op, true);//generating  get method link
                                        xmlhttp.send();
                    //ajax end
                  }

                  function editOption(op){
                    text = document.getElementById(`opinput${op}`).value;
                    err = document.getElementById(`opErr${op}`);
                    err.innerHTML = "Updating....";
                    if(text != ""){
                                        var xmlhttp = new XMLHttpRequest();
                                        xmlhttp.onreadystatechange = function() {
                                        if (this.readyState === 4 && this.status == 200) {
                                                // let data = this.responseText;
                                                data = JSON.parse(this.responseText);
                                                console.log(data);
                                                err.innerHTML = "";
                                                // console.log(data.clapCount);
                                                
                                                // document.getElementById("clapCount").innerHTML  =  data.clapCount;
                                                
                                            
                                            }
                                        };
                                        xmlhttp.open("GET", 'http://127.0.0.1:8000/api/edit-option/'+op+'/'+text, true);//generating  get method link
                                        xmlhttp.send();
                    }
                                        
                  }

          function addNewOption(){
            poolCount = document.getElementById("poolCount");

            var newcontent = document.createElement('div');
            newcontent.innerHTML = poolContent(++poolCount.value);
            var theDiv = document.getElementById("poolOptions");
            theDiv.appendChild(newcontent);//
          }


          function poolContent(op){
              return `<div class="form-group mb-4"><input type="text" name="op${op}" class="form-control mb-2 col-sm-7" placeholder="Type  Option" Required></div>`;
          }
              </script>
                
                

            
        
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection