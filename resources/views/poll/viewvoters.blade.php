@extends('layouts.dashboard')
@section('title','Edit-Poll')
@section('content')   
   
  




    <div class="container mt-5">

        <div class="jumbotron mt-4">
          <h2 class="font-weight-bold text-center text-muted">Voter Details</h2>
          <hr>
          <br>
           <div class="col-sm-12 mb-4">
                <div class="col-sm-7 mb-2 mt-2">
                <h5><div class="font-weight-bold  text-muted " style="margin:0 auto">
                Poll Name:
                </div></h5>
                </div>
                <div class="col-sm-7  mb-4">
                <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">
                      {{$poll->descrition}}
               </div></h5>
                </div>
                
                <div class="col-sm-7 mb-2 mt-2">
                <h5><div class="font-weight-bold  text-muted " style="margin:0 auto">
                Option Name:
                </div></h5>
                </div>
                <div class="col-sm-7  mb-4">
                <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">
                {{$option->option_name}}
                </div></h5>
                </div>

                <div class="col-sm-7 mb-2 mt-2">
                <h5><div class="font-weight-bold  text-muted " style="margin:0 auto">
                Voters:
                </div></h5>
                </div>
               
                <div class="col-sm-7">
                @foreach($voters as $voter)
                <div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold"> 
                    <img src="{{$voter->avatar}}" class="md-avatar rounded" alt="..." style="width:30px">
                    <b>{{$voter->fname}} {{$voter->mname}} {{$voter->lname}}</b>
                </div>
                @endforeach
            
                </div>
            
            
            </div>
            
        
        </div>
    </div>
   <br>
   <br>
   <br>
   <br>
@endsection