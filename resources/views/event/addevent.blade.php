@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron blue-grey lighten-5">
        <h2 class="grey-text text-center"><strong> Add Event to Calendar</strong></h2>
      <div class="card" >
          <div class="row">
              <div class="col-md-8  col-md-offset-2">
                  <div class="panel panel-default">
                      <div class="panel-body"><br/><br/>
                          <div class="col-md-8  col-md-offset-2">
                              <form method="POST" action="{{url('/add-event') }}">
                                {{ csrf_field() }}
                                <label for=""><h5 class="blue-grey-text"><strong>Enter Event Name:</strong></h5></label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Name" Required><br/>
                                <label for=""><h5 class="blue-grey-text"><strong>Enter Description:</strong></h5></label>
                                <input type="text" class="form-control" name="description" placeholder="Description" Required><br/>
                                <label for=""><h5 class="blue-grey-text"><strong>Enter Location:</strong></h5></label>
                                <input type="text" class="form-control" name="location" placeholder="Location" Required><br/>
                                <label for=""><h5 class="blue-grey-text"><strong>Enter Color:</strong></h5></label>
                                <input type="color" class="form-control" name="color" placeholder="Enter the color" value="#cccccc" Required><br/>
                                <label for=""><h5 class="blue-grey-text"><strong>Enter Start Date:</strong></h5></label>
                                <input type="datetime-local" class="form-control" name="start_date" class="date" placeholder="Enter Start date"Required><br/>
                                <label for=""><h5 class="blue-grey-text"><strong>Enter End Date:</strong></h5></label>
                                <input type="datetime-local" class="form-control" name="end_date" class="date" placeholder="Enter End date"Required><br/>
                                <input type="submit" name="submit" class="btn btn-blue-grey" value="Add Event">
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
</div>
@endsection
