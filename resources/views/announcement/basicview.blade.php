@extends('layouts.main')
@section('title','Announcements')
@section('header')

<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}
</style>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>

@endsection
@section('content')

  <div style="min-height:100vh">

    <div class="jumbotron">   
      <div class="row w-100">

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <div class="col-md-8" >   
          <h1 class="text-center deep-purple-text"><strong><i class="fas fa-scroll"></i> &nbsp; Announcements</strong></h1>          
          </div>        
          <div class="col-md-4" align="right">
          @if(!Auth::guest())
            @if (Auth::User()->role_as == "admin")
              <a href="/form"><button class="btn btn-outline-primary mt-1 btn-md"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ADD </button></a>   
              <button type="button" class="btn btn-outline-primary mt-1 btn-md" data-toggle="modal" data-target="#basicExampleModal"><i class="fas fa-tasks"></i>&nbsp; Check list</button></a>
                    <!-- Modal -->
                    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="display-6">Announcement list</h1>                        
                          </div>
                          <div>
                            <a href="/list" class="btn btn-dark btn-sm">Go to Table</a>
                          </div>
                          <table class="table">
                            <div class="modal-body">
                              <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Annoucment Topic</th>
                                    <th>Time period</th>
                                    <th>Delete</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($upload as $item)
                                  <tr>
                                      <th> {{$item->topic}}</th>                                    
                                      <th> {{$item->schedulestart}}<b> &nbsp; - &nbsp;</b><br> {{$item->scheduleend}}</th>
                                      <th> <a href="/deleteann/{{$item->id}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></a>
                                  </tr>
                                  @endforeach
                              </tbody>                          
                            </div>                          
                          </table>
                        </div>
                      </div>
                    </div>
            @endif
          @endif
          </div>
      </div> 
    <br> &emsp; <br>
        @foreach ($upload as $item)
          <div class="card">
            <div class="row">
              <div class="col"><h5 class="text-left indigo-text pt-1 mb-0"> &nbsp; <i class="fas fa-bullhorn"></i></i>&nbsp; {{$item->topic}}</h5><hr></div>
            </div>
            <div class="row">
              <div class="col"> &nbsp; <p class="note note-primary"> &nbsp;{{$item->body}} </p><hr style="width:40%" align="right"></div>
            </div>
            <div class="row">          
              <div class="col" align="right" ><strong> Announced by administrator : </strong> {{App\User::find($item->user_id)->fname}} {{App\User::find($item->user_id)->lname}} &nbsp;
            </div>
          </div><br>   
        @endforeach 
      </div>
    </div>
  </div>

@endsection