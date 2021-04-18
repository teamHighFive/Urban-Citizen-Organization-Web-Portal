@extends('layouts.main')

@section('title','Poll-Home')
@section('content')
  @include('poll.flash')
 
  
  <div class="container">
    <div class="jumbotron blue-grey lighten-4 mt-4 mb-1">

    
     <h3><div class="p-2 mb-4 bg-success text-white text-center font-weight-bold col-sm-10" style="margin:0 auto">POLL HOME PAGE</div></h3>
      
      <div class="col-sm-10" style="margin:0 auto">
       <h5> 
        <div class="p-2 mb-2 mt-5 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">POLL MANAGEMENT</h5>
        <div class="row">
        <div class="col-sm-12" style="margin:0 auto">
          <a href="/polltable-view" class="btn btn-primary active float-right" role="button" aria-pressed="true">EDIT & DELETE </a>
          <a href="/create-poll-form " class="btn btn-primary active float-right mb-3" role="button" aria-pressed="true">CREATE POLL</a>
        </div>
        </div>
        </div>
        
        
         

        <div class="col-sm-10" style="margin:0 auto">
          <h5> <div class="p-2 mb-2 mt-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">VOTTING </h5>
          <a href="/votetable" class="btn btn-primary active float-right" role="button" aria-pressed="true">VOTE TO POLL</a>
        </div>
          
          <br>
          <br>
          <br>

        <div class="col-sm-10" style="margin:0 auto">
            <h5> <div class="p-2 mb-2 mt-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">POLL RESULT </h5>
            <a href="/votetable" class="btn btn-primary active float-right" role="button" aria-pressed="true">VIEW POLL RESULT</a>
        </div>
        
        <br>
        <br>
        <br>
                 
      </div>
    </div>
  </div>  
 <br>
 <br>
 <br><br>
@endsection
