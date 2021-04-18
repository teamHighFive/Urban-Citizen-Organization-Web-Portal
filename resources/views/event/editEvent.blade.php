@extends('layouts.main')

@section('title','Upcoming Events')
@section('content')
<div class="container">
   
  <form action="{{url('/event@update/'.$id)}}" method="POST">
    {{ csrf_field() }}
    <div class="container">
      <div class="jumbotron blue-grey lighten-4  mt-5">
        <h2 class="font-weight-bold text-center text-muted"><strong>Update Event Data</strong></h2>
        <hr>
        
        <div class="card mb-3" >
         
            <div class="col-md-12" >
            
              <div class="form-group">
                <div class="col-md-10 mt-5">
                  <label><h5 class="font-weight-bold"><strong>Event Name:</strong></h5></label>
                  <input type="text" class="form-control" name="title" placeholder="Enter Name" value="{{$events->title}}">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-10">
                  <label><h5 class="font-weight-bold mt-3"><strong>Description:</strong></h5></label>
                  <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{$events->description}}">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-10">
                  <label><h5 class="font-weight-bold mt-3"><strong>Location:</strong></h5></label>
                  <input type="text" class="form-control" name="location" placeholder="Enter Location" value="{{$events->location}}">
                </div>
              </div>
                
              <div class="form-group">
                <div class="col-md-10">
                  <label><h5 class="font-weight-bold mt-2"><strong> Color:</strong></h5></label>
                  <input type="color" class="form-control" name="color" placeholder="Enter Color" value="{{$events->color}}">
                </div>
              </div>
                      
              <div class="form-group">
                <div class="col-md-10">
                  <label><h5 class="font-weight-bold mt-3"><strong>Event Start Date:</strong></h5></label>
                  <input type="datetime-local" class="form-control" name="start_date" placeholder="Enter Start Date" value="{{ date('Y-m-d\TH:i', strtotime($events->start_date)) }}">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-10">
                  <label><h5 class="font-weight-bold mt-3"><strong>Event End Date:</strong></h5></label>
                  <input type="datetime-local" class="form-control" name="end_date" placeholder="Enter End Date" value="{{ date('Y-m-d\TH:i', strtotime($events->end_date)) }}">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="text-center">
                {{ method_field('PUT')}}
                <button type="submit" name="submit" class="btn btn-success float-center mb-5">Update</button>
                </div>
              </div>
             

            </div>
          
        </div>
      </div>
    </div>
  </form>
</div>

<br>
<br>
<br>
<br>
@endsection
