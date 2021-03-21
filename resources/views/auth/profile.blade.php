@extends('layouts.dashboard')

@section('title','My Profile')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="card mb-4 wow fadeIn">
                <div class="card-header font-weight-bold">
                  <h2 class="mb-2 mb-sm-0 pt-1">
                    <span>My Profile Page</span>
                  </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('my-profile-update') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-md-4">
                                        <img src="{{ asset('uploads/profile/'.Auth::user()->image) }}" class="w-75" alt=""> <br> <br>
                                        <input type="file" name="image" class="form-control"> <br>
                                    </div>

                                    <div class="col-md-8">
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" class="form-control" value="{{ Auth::user()->fname }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middle Name</label>
                                            <input type="text" name="mname" class="form-control" value="{{ Auth::user()->mname }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" class="form-control" value="{{ Auth::user()->lname }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="text" name="contact" class="form-control" value="{{ Auth::user()->contact }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">E-mail Address</label>
                                            <input type="text" class="form-control" readonly value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Current Role</label>
                                            <input type="text" class="form-control" readonly value="{{ Auth::user()->role_as }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Date Joined</label>
                                            <input type="text" class="form-control" readonly value="{{ Auth::user()->created_at }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">User ID</label>
                                            <input type="text" class="form-control" readonly value="{{ Auth::user()->id }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Profile Updation</label>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection
