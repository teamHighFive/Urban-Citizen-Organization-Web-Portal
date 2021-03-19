@extends('layouts.main')

@section('title','Online Conferences')
@section('header')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('title','Event Calendar')
@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron  blue-grey lighten-5">
      <h2 class="grey-text text-center"><strong>Event Calendar</strong></h2>
         <div class="card" >
             <div class="row">
                 <div class="col-md-8 col-md-offset-2" ><br/><br/>
                    <!-- Add Event button -->
                   <a href="/addeventurl"  class=" btn btn-blue-grey"> <strong >Add Event</strong> </a>
                   <!-- Edit Event button -->
                   <a href="/view-event" class="btn btn-light-blue"> <strong>Edit Event </strong></a>
                   <!-- Delete Event button -->
                   <a href="/deleteeventurl" class="btn btn-yellow"><strong> Delete Event </strong></a>
                 </div>
             </div><br/>

             <div class="col-md-11 col-md-offset-2" >
             <div class="row">

             <!-- Session State -->
               @if(count($errors)>0)
                 <div class="alert alert-danger">
                     <ul>
                       @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                       @endforeach
                     </ul>
                 </div>
               @endif
               @if(\Session::has('success'))
                     <div class="alert alert-success">
                       <p>{{ \Session::get('success') }}</p>
                     </div>

               @endif
               </div>

                           <div class="col-md-16 col-md-offset-2" >
                             <div class="panel panel-default">
                                     <!-- Calendar Code -->
                                         <div class="panel-body" style="center">
                                         <div class="col-md-18 col-md-offset-2 pb-5" >
                                            {!! $calendar->calendar() !!}
                                            {!! $calendar->script() !!}
                                         </div>
                                         </div>
                             </div>
                          </div>
              </div>
         </div>
     </div>

@endsection
