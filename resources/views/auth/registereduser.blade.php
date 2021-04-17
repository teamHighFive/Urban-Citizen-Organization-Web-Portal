@extends('layouts.dashboard')

@section('title','Registered Users')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold">
                <h2><b>Registered Users</b></h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>
                                            <div class="card">
                                            <div class="card-body">
                                                <div class="row note note-info">
                                                    <div class="col-lg-7">
                                                        <h5 class="card-title">{{ $item->fname }} {{ $item->mname }} {{ $item->lname }} (User ID : {{$item->id}})</h5>
                                                    </div>
                                                    <div class="col-lg-5 d-flex justify-content-end">
                                                        <a href="{{ url('role-edit/'.$item->id) }}" class="btn btn-primary mx-2">EDIT</a>
                                                        <a href="/view-payments/{{$item->id}}" class="btn btn-primary">View Payment History</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <br>
                                                        <p class="card-text"><b>Contact Number : </b>{{ $item->contact }}</p>
                                                        <p class="card-text"><b>Email : </b>{{ $item->email }}</p>
                                                        <p class="card-text"><b>Role : </b>{{ $item->role_as }}</p>
                                                        <p class="card-text"><b>Is Banned : </b>
                                                            @if($item->isban == '0')
                                                                <label class="badge badge-pill btn-primary px-3 py-2">Not Banned</label>
                                                            @elseif($item->isban == '1')
                                                                <label class="badge badge-pill btn-danger px-3 py-2">Banned</label>
                                                            @endif
                                                        </p>
                                                        @if(Auth::user()->id == $item->id)
                                                            <button type="button" class="btn btn-success" disabled>My Account</button>
                                                        @else
                                                            <form action="{{ url('role-delete/'.$item->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                                            </form>
                                                        @endif
                                                        
                                                    </div>
                                                </div> 
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection


