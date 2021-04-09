@extends('layouts.dashboard')

@section('title','Registered Users')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">


    <div class="card text-body bg-info mb-3 mt-2">
        <div class="card-header font-weight-bold">
            <h2><b>Registered Users-Edit role</b></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h4>Current Role: {{ $user_roles->role_as }}</h4>
                            <h5>
                                isBan Status:
                                    @if( $user_roles->isban == '0')
                                        <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                                    @elseif( $user_roles->isban == '1')
                                        <label class="py-2 px-3 badge btn-danger">Banned</label>
                                    @endif
                            </h5>

                            <form action="{{ url('role-update/'.$user_roles->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('GET')
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="{{ $user_roles->fname }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="{{ $user_roles->email }}">
                                    </div>

                                    <div class="form-group">
                                        <select name="roles" class="form-control">
                                            <option value="">--Select Role--</option>
                                            <option value="member">Member</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="isban" class="form-control">
                                            <option value="">--Select Ban or Un-Ban--</option>
                                            <option value="0">Un-Ban</option>
                                            <option value="1">Ban now</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                            </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
