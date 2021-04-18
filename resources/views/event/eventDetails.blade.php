@extends('layouts.main')

@section('title','Event Details')
@section('header')
@endsection
@section('content')
    <div class="container"  style="min-height: 100VH">
    <br><br>
    <h1><div class="p-2 mb-4 bg-success text-white text-center font-weight-bold col-md-6 mt-5" style="margin:0 auto">{{$event->title}}</div></h1>
       
           
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="jumbotron blue-grey lighten-4">
                        <div>
                        <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">Description &nbsp  :{{$event->description}}</h5>
                            <br>
                            <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">Starts &nbsp &nbsp  : {{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}</div></h5>
                            <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">Ends  &nbsp &nbsp  &nbsp : {{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}</div></h5>
                            <h5><div class="p-2 mb-3 bg-light text-dark bg-transparent text-dark font-weight-bold " style="margin:0 auto">Venue   &nbsp &nbsp : {{$event->location}}</div></h5>
                            <br>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <br>
<br>
<br>
<br>
@endsection