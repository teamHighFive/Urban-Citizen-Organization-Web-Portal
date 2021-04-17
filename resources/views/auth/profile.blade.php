@extends('layouts.dashboard')

@section('title','My Profile')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>

            <div class="card text-body bg-info mb-3 mt-2">
                <div class="card-header font-weight-bold">
                    <h2><b>My Profile</b></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <form action="{{ url('my-profile-update') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-4">
                                        <img src="{{ asset(Auth::user()->avatar) }}" style="height:260px;width:300px;border-radius:50%" class="w-75" alt=""> <br> <br>
                                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>

                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ Auth::user()->fname }}" required>
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middle Name</label>
                                            <input type="text" name="mname" class="form-control @error('mname') is-invalid @enderror" value="{{ Auth::user()->mname }}" required>
                                            @error('mname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ Auth::user()->lname }}" required>
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="0{{substr( Auth::user()->contact, 3)}}" required>
                                            @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Home City</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ Auth::user()->city }}" required>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
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
                                            <input type="text" class="form-control" readonly value="{{date('M j, Y   h:ia',strtotime(Auth::user()->created_at))}}">
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
