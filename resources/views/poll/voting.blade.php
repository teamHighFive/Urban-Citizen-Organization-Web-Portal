@extends('layouts.dashboard')

@section('title','vote-to-poll')

@section('content')
    <div class="container">
        <div class="jumbotron mt-5">
         <h2 class="font-weight-bold text-center text-muted"> Vote To Poll </h2>
         <hr>
            <form action="{{url('/castvote/'.$id)}}" method="post">
             {{ csrf_field() }}
                <fieldset class="form-group text-center">
                    <div class="row">
                        <div class="col-sm-10" style="margin:0 auto">
                        
                         <h4 value="{{$question->id}}"> <div class="p-2 mb-4 mt-2 bg-success text-white text-left font-weight-bold ">{{ $question->descrition}}</div></h4>
                        
                            @foreach($options as $option)
                                <div class="p-1 bg-light text-dark bg-transparent text-dark col-sm-8" style="margin:0 auto">
                                    <div class="form-check mb-3 ">
                                      <input class="form-check-input" type="radio" name="optionid" id="exampleRadios1" value="{{$option->id}}" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                         <h5><strong>{{$option->option_name}}</strong></h5>
                                        </label>
                                    </div>
                                </div>
                             <br>
                            @endforeach
                            
                            <div class="form-group row ">
                                <div class="col-sm-10" style="margin:0 auto">
                                    <button type="submit" class="btn btn-primary">Vote</button>
                                </div>
                            </div>
                        </div>
                     </div>
                </fieldset>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection