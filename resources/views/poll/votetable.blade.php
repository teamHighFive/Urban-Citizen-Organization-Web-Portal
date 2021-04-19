@extends('layouts.main')

@section('title','Vote-Table')
@section('content')
<div class="container mt-5">

    <div class="jumbotron  blue-grey lighten-4">
      <div class="card">
        

            <table class="table table-responsive-md">
              <thead class="thead-dark">
                    <tr>
                    <th> <h6 class="text-center font-weight-bold">Poll ID</h6></th>
                    <th><h6 class="text-center font-weight-bold">Description</h6></th>
                        <th><h6 class="text-center font-weight-bold">Poll End Time</h6></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                  
                    @foreach($questions as $question)
                        <tbody>
                            <tr>
                                <td><div class="text-center font-weight-bold">{{ $question->id}}</div></td>
                                <td><div class="text-center font-weight-bold">{{ $question->descrition}}</div></td>
                                <td><div class="text-center font-weight-bold">{{ $question->end_date}}</div></td>

                                
                                <td><a class="btn btn-success btn-sm" href="/pollview/{{$question->id}}">vote to Poll</a></td>
                                <td><a class="btn btn-primary btn-lg active btn-sm" href="/pollresult/{{$question->id}}">View Poll result</a></td>
                                
                            </tr>
                        </tbody>
                    @endforeach
                
            </table>
           
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
   
@endsection