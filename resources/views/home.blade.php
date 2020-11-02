@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="{{asset(Auth::user()->avatar)}}" style="height:60px;width:60px;border-radius:50%;margin-right:15px" alt="" ><b>You are logged in as User!</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
