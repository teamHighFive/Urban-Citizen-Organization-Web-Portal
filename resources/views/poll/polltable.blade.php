@extends('layouts.dashboard')
@section('title','Poll-Home')
@section('content')

<div class="container mt-5">

    <div class="jumbotron  blue-grey lighten-4">
        <div class="card">
        

            <table class="table">
                <thead class="thead-dark">
                    <tr class="warning">
                    <th> <h6 class="text-center font-weight-bold">ID</h6></th>
                        <th><h6 class="text-center font-weight-bold">Description</h6></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                  
                    @foreach($questions as $question)
                        <tbody >
                            <tr>
                                <td><div class="text-center font-weight-bold">{{ $question->id}}</div></td>
                                <td><div class="text-center font-weight-bold">{{ $question->descrition}}</div></td>
                                

                                
                                <td><a class="btn btn-success btn-sm" href="/polledit/{{$question->id}}">Edit</a></td>
                                <td><a class="btn btn-danger btn-sm" href="/polldestroy/{{$question->id}}">Delete</a></td>
                                
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