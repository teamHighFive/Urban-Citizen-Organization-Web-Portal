@extends('layouts.main')

@section('title','Join Meeting')
@section('header')
@endsection
@section('content')
        <div class="container"  style="min-height: 100VH">
            <h1 class="text-center cyan-text pt-5 mb-3">{{$meeting->meeting_name}}</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        <div>
                            <h6>{{$meeting->meeting_description}}</h6>
                            <br>
                            <h6><b>Date : {{$meeting->date}}</b></h6>
                            <h6><b>Time : {{$meeting->time}}</b></h6>
                            <br>
                            <h6>Join via following button</h6>
                            <a class="btn btn-info btn-sm" href="/join-details/{{$meeting->meeting_id}}">Join</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
@endsection