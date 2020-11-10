@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <form action="{{url('/event@update/'.$id)}}" method="POST">
        {{ csrf_field() }}
        <div class="container">
            <div class="jumbotron" style="margin-top: 5%;">
            <h2 class="grey-text text-center"><strong>Update Event Data</strong></h2>
            <div class="card" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2" ><br/><br/>


              <input type="hidden" name="_method" value="UPDATE"/>
                <div class="form-group">
                <div class="col-md-8  col-md-offset-2">

                  <label><h5 class="blue-grey-text"><strong>Name of Event:</strong></h5></label>
                  <input type="text" class="form-control" name="title" placeholder="Enter Name" value="{{$events->title}}">
                  </div>
                </div>
                    <div class="form-group">
                    <div class="col-md-8  col-md-offset-2">
                      <label><h5 class="blue-grey-text"><strong>Event Color:</strong></h5></label>
                      <input type="color" class="form-control" name="color" placeholder="Enter Color" value="{{$events->color}}">
                      </div>
                    </div>
                        <div class="form-group">
                        <div class="col-md-8  col-md-offset-2">
                          <label><h5 class="blue-grey-text"><strong>Start Date of Event:</strong></h5></label>
                          <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date" value="{{$events->start_date}}">
                          </div>
                        </div>
                            <div class="form-group">
                            <div class="col-md-8  col-md-offset-2">
                               <label><h5 class="blue-grey-text"><strong>End Date of Event:</strong></h5></label>
                               <input type="date" class="form-control" name="end_date" placeholder="Enter End Date" value="{{$events->end_date}}">
                               </div>
                            </div>
                               {{ method_field('PUT')}}
                               <button type="submit" name="submit" class="btn btn-success">Update</button>

               </div>
               </div>
               </div>
            </div>
        </div>
    </form>
</div>
@endsection
