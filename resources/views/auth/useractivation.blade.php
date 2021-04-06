@extends('layouts.dashboard')

@section('title','User Activation')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>


                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif

                        <div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">
                                <h2><b>User Approval Page</b></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                    <thead class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Verfied At:</th>
                                            <th>Email</th>
                                            <th>Current Status</th>
                                            <th>Approve/Not approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->fname }}</td>
                                            <td>{{ $user->mname }}</td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ date('M j, Y',strtotime($user->email_verified_at)) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <th>@if($user->status == 0) Not approved @else Approved @endif</th>
                                            <td><a href="{{ route('status', ['id'=>$user->id]) }}">@if($user->status == 1) Not approve @else Approve @endif</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1>I'm still Member</h1>
        <?php
                }
        ?>
</div>
@endsection
