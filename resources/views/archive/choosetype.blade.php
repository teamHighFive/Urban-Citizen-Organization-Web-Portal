@extends('layouts.main')

@section('title','Archives')
@section('header')
<style>
    body, html {
     height: 100%;
     margin: 0;
     font-family: Arial, Helvetica, sans-serif;
   }

   .bg-image {
     background: url("../images/archives/urban citizen.png") no-repeat center center fixed;
     filter: blur(8px);
     -webkit-filter: blur(8px);
     height: 100vh;
     background-size: 100vw 100vw;
     background-position: center;
     background-repeat: no-repeat;


   }

   .bg-text {
     background-color: rgb(0,0,0); /* Fallback color */
     background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
     color: white;
     font-weight: bold;

     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     z-index: 2;
     width: 80%;
     padding: 20px;
     text-align: center;
   }

   {
     box-sizing: border-box;
   }
   .column {
     float: left;
     width: 50%;
     padding: 25px;
   }
   /* Clearfix (clear floats) */
   .row::after {
     content: "";
     clear: both;
     display: table;
   }
   </style>
@endsection
@section('content')
<div class="container " style="min-height: 100vh">
    <div class="bg-image">wd</div>

<div class="bg-text">
  <h1> Separated Document Uploading</h2>
   
    <div class="row py-15">
        <div class="column">
        <a href="upload_doc">
            <img height="130px" width="200px" src="images/archives/file.png" alt="file" style="width:30%">
        </a>
        <p>&nbsp;</p><p>Files upload</p>
        </div>

        <div class="column">
        <a href="upload_exel">
            <img height="130px" width="200px" src="images/archives/submission link.png" alt="submission" style="width:30%">
        </a>
        <p>&nbsp;</p><p>Submission link</p>
        </div>
      

    </div>
</div>
</div>
@endsection

{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



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
