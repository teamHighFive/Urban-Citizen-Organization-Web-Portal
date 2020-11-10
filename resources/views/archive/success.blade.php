@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <h2 class="text-center #000-text pt-5 mb-3">Uploaded successfuly</h2>
    <h5 class="text-center #000-text ">(files can be view in Warehouse)</h5>
    <div class="container" >
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="jumbotron">
              <div class="center">
                <div class="row" >
                    <div class="col-md-12">
                      <center>
                        <img src="images/tick.png" width="120px" height="120px"></a>

                        <div class="row py-5" >
                        <div class="col-md-6">
                            <a href="choose-type">
                            <button  class="btn btn-success btn-lg">Upload another file</button>
                            </a> <br>
                        </div>
                        <div class="col-lg-6">
                            <a href="archieves">
                            <button  class="btn btn-warning btn-lg">View Uploaded Files</button>
                            </a> <br>
                        </div>
                        </div>
                        </center>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

{{--

<!DOCTYPE html>
<html>
<head>
<style>
.column {
  float: left;
  width: 25%;
  padding: 25px;
}
/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

 <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>


    <body>




    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
   </body>
</html> --}}
