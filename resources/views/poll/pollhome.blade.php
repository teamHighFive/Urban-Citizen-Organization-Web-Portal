@extends('layouts.dashboard')

@section('title','Poll-Home')
@section('content')
  @include('poll.flash')
 
  
  <div class="container">
    <div class="jumbotron mb-2">

    
     <h3><div class="p-2 mb-4 bg-info text-white text-center font-weight-bold col-sm-10" style="margin:0 auto">POLLS</div></h3>
      
     

        <div class="col-sm-10" style="margin:0 auto">
          <h5> <div class="p-2 mb-2 mt-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">VOTTING </h5>
          <a href="/votetable" class="btn btn-success mb-3" role="button" aria-pressed="true">VOTE TO POLL</a>
        </div>
      

        <div class="col-sm-10" style="margin:0 auto">
            <h5> <div class="p-2 mb-2 mt-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">POLL RESULT </h5>
            <a href="/votetable" class="btn btn-info mb-3" role="button" aria-pressed="true">VIEW POLL RESULT</a>
        </div>
       

        @if(!Auth::guest())
        @if (Auth::user()->role_as == "admin")
        <div class="col-sm-10" style="margin:0 auto">
       <h5> 
        <div class="p-2 mb-2 mt-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">POLL MANAGEMENT</h5>
        <div class="row">
        <div class="col-sm-12" style="margin:0 auto">
          <a href="/create-poll-form " class="btn btn-primary" role="button" aria-pressed="true">CREATE POLL</a>
          <a href="/polltable-view" class="btn btn-danger" role="button" aria-pressed="true">EDIT | DELETE </a>
          
        </div>
        </div>
        </div>
        
       @endif
       @endif
          
        
        











                 
      </div>
    </div>
  </div>  
 <br>
 <br>
 <br><br>
@endsection
