@extends('layouts.main')

@section('title','Event Details')
@section('header')
@endsection
@section('content')
        <div class="container"  style="min-height: 100VH">
            <h1 class="text-center cyan-text pt-5 mb-3">{{$event->title}}</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <div>
                            <h6>{{$event->description}}</h6>
                            <br>
                            <h6><b>Starts   : {{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}</b></h6>
                            <h6><b>Ends     : {{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}</b></h6>
                            <h6><b>Venue    : {{$event->location}}</b></h6>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
@endsection