@extends('layouts.dashboard')

@section('title','Registered Users')
@section('content')
<div class="container" style="height:auto;min-height: 100vh">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <span>Registered Users-Edit role</span>
        </h4>

      </div>

    </div>
    <!-- Heading -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                                    <option value="">User</option>
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

@endsection
