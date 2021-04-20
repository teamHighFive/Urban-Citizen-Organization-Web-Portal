@extends('layouts.dashboard')
@section('title','Edit-Poll')
@section('content')   
   
  




    <div class="container mt-5">

        <div class="jumbotron blue-grey lighten-4 mt-4">
          <h2 class="font-weight-bold text-center text-muted"> Update Poll </h2>
          <hr>
            <form  action="{{url('/pollupdate/'.$id)}}" method="POST"> 
              {{ csrf_field() }}
                
                <div class="form-group mb-4">
                  <label><strong>Question:</strong></label>
                  <input class="form-control form-control-lg" type="text" placeholder="Type the Poll Question" name="Question" value="{{$questions->descrition}}"Required>
                </div>

                
                <label><strong>Options:</strong></label>
                @foreach($options as $option)
                    <div class="form-group mb-3">
                        <input type="text" name="option[]" class="form-control mb-2 col-sm-7" placeholder="Type Second Option" value="{{$option->option_name}}"Required>
                    </div>
                @endforeach
                
              
                
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

            </form>
        
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection