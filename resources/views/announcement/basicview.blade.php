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
        <div class="col-md-10" >   
        <h1 class="text-center red-text"><strong><i class="fas fa-scroll"></i> &nbsp; Announcements</strong></h1>          
        </div>
    <div class="dropdown">
            <button onclick="myFunction()" class="btn btn-info dropdown-toggle">Manage &emsp;</button>
        <div id="myDropdown" class="dropdown-content">
        <!-- <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()"> -->
                <a class="dropdown-item" href="/form">Add announcement</a>
            <div class="dropdown-divider"><hr></div>
                <a class="dropdown-item" href="#">Update</a> 
            </div>
        </div>
    </div> 
  <br> &emsp; <br>
      @foreach ($upload as $item)
        <div class="card">
          <div class="row">
            <div class="col"><h5 class="text-left orange-text pt-1 mb-1"> &nbsp; <i class="fas fa-bullhorn"></i></i>&nbsp; {{$item->topic}}</h5><hr></div>
          </div>
          <div class="row">
            <div class="col"> &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;{{$item->body}} <hr style="width:40%" align="right"></div>
          </div>
          <div class="row">          
            <div class="col" align="right" ><strong> Announced by administrator : </strong> {{App\User::find($item->user_id)->fname}} {{App\User::find($item->user_id)->lname}} &nbsp;
            @if(!Auth::guest())
              @if (Auth::User()->role_as == "admin")
                <a href="/deleteann/{{$item->id}}" class="btn btn-outline-danger btn-sm">Delete announcement</a></div>
              @endif
            @endif
          </div>
        </div><br>   
      @endforeach 
    </div>
  </div>
</div>


@endsection