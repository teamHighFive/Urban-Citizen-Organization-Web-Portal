@extends('layouts.dashboard')
@section('title','CreatePollForm')
    
@section('content')  


  @include('poll.flash')
  
 <div class="row">
  <div class="col-sm-12">
  <div class="btn-group float-right mt-4" role="group" aria-label="Basic example">
  
  <a href="/pollhome" button type="button" class="btn btn-blue-grey ">Poll Home</button></a>
  <a href="addmore" button type="button" class="btn btn-blue-grey y">Add More Options</button><a>
</div>
</div>
</div>


  
 
 
  <div class="row">
  <div class="col-sm-12">
  <div class="container">
    <div class="jumbotron blue-grey lighten-4 mt-2">
      <h2 class="font-weight-bold text-center text-muted"> Create Poll </h2>
      <hr>

      <form action="{{route('create-poll')}}" method="post"> 
        {{ csrf_field() }}
        
        <div class="form-group mt-4 mb-4">
            <label><strong>Question:</strong></label>
            <input class="form-control form-control-lg" type="text" placeholder="Type the Poll Question" name="Question"Required>
        </div>
        
        <div class="form-group mb-3">
            <label><strong>Options:</strong></label>
            <input type="text" name="Optionone" class="form-control mb-2 col-sm-7" placeholder="Type Second Option"Required>
        </div>
        
        <div class="form-group mb-4">
          <input type="text" name="Optiontwo" class="form-control mb-2 col-sm-7" placeholder="Type Second Option"Required>
        </div>
        
        <div class="form-group mb-1">
          <label><strong>End date & Time:</strong></label>
          <input type="datetime-local" class="form-control" name="end_date" min="{{Carbon\Carbon::now()->format('Y-m-d').'T'.Carbon\Carbon::now()->format('H:i')}}" class="date" placeholder="Enter End date"Required><br/>
        </div>

        <div class="form-group mb-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="anonymous">
          <label class="form-check-label" for="flexCheckDefault">
              make this poll anonymous
          </label>
          </div>
          </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary float-center"><strong>Submit</strong></button>
        </div>
        
       
      </form>
    
    </div>
  </div>
  </div>
  </div>
  <br>
  <br><br>
  <br>

@endsection