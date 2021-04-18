@extends('layouts.main')

@section('title','Poll result')

@section('content')
    <div class="container">
        <div class="jumbotron blue-grey lighten-4 mt-5">
         <h2 class="font-weight-bold text-center text-muted"> Latest Result </h2>
         <hr>
         <h4 value="{{$question->id}}"> <div class="p-2 mb-3 mt-3 bg-success text-white text-left font-weight-bold ">{{ $question->descrition}}</div></h4>
        
            @foreach($options as $option)
                <div class="card mb-3 mt-3">
                    <div class="card-body">
                    <h5 class="mb-2"><strong>{{$option->option_name}}</strong></h5>
                    <h3 class="text-center"><span class="badge badge-warning">{{($option->votes/10)*100}}%</span></h3>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{($option->votes/10)*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="10"></div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection