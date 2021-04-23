@extends('layouts.dashboard')
@section('title','CreatePollForm')
    
@section('content')  


  @include('poll.flash')
  


  
 
 
  <div class="row">
  <div class="col-sm-12">
  <div class="container">
    <div class="jumbotron  mt-5">
      <h2 class="font-weight-bold text-center text-muted"> Create Poll </h2>
      <hr>

      <form action="{{route('create-poll')}}" method="post"> 
        {{ csrf_field() }}
        

        
        <div class="form-group mt-4 mb-4 col-md-12">
            <label><strong>Question:</strong></label>
            <input class="form-control form-control-lg" type="text" placeholder="Type the Poll Question" name="Question"Required>
        </div>

        <div class="form-group mt-4 mb-4">
            <!-- <label><strong>Pool Count</strong></label> -->
            <input class="form-control form-control-lg" type="hidden" id="poolCount" value="2" name="poolCount">
        </div>
        
        <div class="form-group mb-3 col-md-12">
            <label><strong>Options:</strong></label>
            <input type="text" name="op1" class="form-control mb-2 col-sm-7" placeholder="Type Option 1"Required>
        </div>

        
        <div class="form-group mb-3 col-md-12 ">
          <input type="text" name="op2" class="form-control mb-2 col-sm-7" placeholder="Type  Option 2"Required>
        </div>

        <div  class="form-group mb-3 col-md-12" id="poolOptions">
        
        </div>
        <div class="col-md-12">
        <div class="btn btn-primary btn-sm mb-3" onClick="addNewOption()">+</div>
        </div>

        
        <div class="form-group mb-1 col-md-12">
          <label><strong>End date & Time:</strong></label>
          <input type="datetime-local" class="form-control" name="end_date" min="{{Carbon\Carbon::now()->format('Y-m-d').'T'.Carbon\Carbon::now()->format('H:i')}}" class="date" placeholder="Enter End date"Required><br/>
        </div>

        <div class="form-group mb-4 col-md-12" style="margin:0 auto">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="anonymous">
          <label class="form-check-label" for="flexCheckDefault">
              <strong>make this poll anonymous</strong>
          </label>
          </div>
          </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary float-center"><strong>Submit</strong></button>
        </div>
        
       
      </form>

      <script>
          function addNewOption(){
            poolCount = document.getElementById("poolCount");

            var newcontent = document.createElement('div');
            newcontent.innerHTML = poolContent(++poolCount.value);
            var theDiv = document.getElementById("poolOptions");
            theDiv.appendChild(newcontent);//
          }


          function poolContent(op){
              return `<div class="form-group mb-4"><input type="text" name="op${op}" class="form-control mb-2 col-sm-7" placeholder="Type  Option ${op}" Required></div>`;
          }
      </script>
    
    </div>
  </div>
  </div>
  </div>
  <br>
  <br><br>
  <br>

@endsection