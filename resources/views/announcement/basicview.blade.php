@extends('layouts.dashboard')

@section('title','Announcements')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->


<meta name="viewport" content="width=device-width, initial-scale=1">
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
</style>

</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<style>
.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}


</style>

    <div class="row w-100">
        <div class="col-md-10" >            
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


  <div class="jumbotron">    
  <h1 class="text-center red-text"><strong><i class="fas fa-scroll"></i> &nbsp; Announcements</strong></h1> 
  <br> &emsp; <br>
      @foreach ($upload as $item)
        <div class="card">
          <div class="row">
            <div class="col"><h2 class="text-left orange-text pt-3 mb-3"> &nbsp; <i class="fas fa-bullhorn"></i></i>&nbsp; {{$item->topic}}</h2><hr></div>
          </div>
          <div class="row">
            <div class="col"> <h4> &nbsp; <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;{{$item->body}} </h4><hr style="width:40%" align="right"></div>
          </div>
          <div class="row">          
            <div class="col" align="right" ><strong> Announced by administrator : </strong> {{App\User::find($item->user_id)->fname}} {{App\User::find($item->user_id)->lname}} &nbsp;<br>
            <a href="/deleteann/{{$item->id}}" class="btn btn-outline-danger btn-sm">Delete announcement</a></div>
          </div>
        </div><br>
        <!-- <table class="table table-borderless">
          <thead class="">
            <tr>
                <th scope="col"><h2 class="text-left blue-text">{{$item->topic}}</h2></th>
            </tr>
          </thead>

          <tbody>                        
            <tr>
              <th><h4> {{$item->body}} </h4></th>
            </tr>
            <tr>            
              <div class="col-md-100">
                <th> <strong>Announced by administrator : </strong> {{App\User::find($item->user_id)->fname}} {{App\User::find($item->user_id)->lname}}</th>
              </div>
            </tr>              
          </tbody>
        </table>   -->
       

      @endforeach 
    </div>
  </div>



<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// function filterFunction() {
//   var input, filter, ul, li, a, i;
//   input = document.getElementById("myInput");
//   filter = input.value.toUpperCase();
//   div = document.getElementById("myDropdown");
//   a = div.getElementsByTagName("a");
//   for (i = 0; i < a.length; i++) {
//     txtValue = a[i].textContent || a[i].innerText;
//     if (txtValue.toUpperCase().indexOf(filter) > -1) {
//       a[i].style.display = "";
//     } else {
//       a[i].style.display = "none";
//     }
//   }
// }
</script>


</body>
@endsection