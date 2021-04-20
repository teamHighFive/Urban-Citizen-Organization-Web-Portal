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
                    <div class="form-group mb-3">
                        <input onKeyDown="onChangeInput(<?php echo($option->id)  ?>)" type="text" name="option[]" class="form-control mb-2 col-sm-7" placeholder="Type Second Option" value="{{$option->option_name}}"Required>
                        <div class="btn btn-sm btn-danger" onClick="alert('this is delete')">X</div>
                        <div class="btn btn-sm btn-primary" onClick="alert('this is update')" id="op<?php echo($option->id)  ?>"  style="visibility:hidden">Update</div>
                    </div>
                @endforeach
                
              <script>
                  function onChangeInput(op) {
                    var btn = document.getElementById(`op${op}`);
                    btn.style.visibility = "visible";
                  }
              </script>
                
                

            
        
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection