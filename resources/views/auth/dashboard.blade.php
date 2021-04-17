@extends('layouts.dashboard')

@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh; width:90%;">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

                    
                    <h1>Admin Dash-board</h1> <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border border-primary shadow-0 mb-3">
                                <div class="card-body">
                                  <h5 class="card-title">Online conferences</h5>
                                  <p class="card-text">
                                    Click here to make quick Online conferences
                                  </p>
                                  <a href="{{ url('online-conferences') }}" class="btn btn-primary btn-sm">Click</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border border-primary shadow-0 mb-3">
                                <div class="card-body">
                                  <h5 class="card-title">Donation</h5>
                                  <p class="card-text">
                                    Click here to create new donation
                                  </p>
                                  <a href="{{ url('createdonevent') }}" class="btn btn-primary btn-sm">Click</a>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border border-primary shadow-0 mb-3">
                                <div class="card-body">
                                  <h5 class="card-title">Blog Posts</h5>
                                  <p class="card-text">
                                    Click here to create new blog post quckly
                                  </p>
                                  <a href="{{ url('/posts/create') }}" class="btn btn-primary btn-sm">Click</a>
                                </div>
                              </div>
                        </div>
                    </div>



        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1>Member Dash-board</h1> <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card border border-primary shadow-0 mb-3">
                                <div class="card-body">
                                  <h5 class="card-title">Blog Posts</h5>
                                  <p class="card-text">
                                    Click here to create new blog post quckly
                                  </p>
                                  <a href="{{ url('/posts/create') }}" class="btn btn-primary btn-sm">Click</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border border-primary shadow-0 mb-3">
                                <div class="card-body">
                                  <h5 class="card-title">Donation</h5>
                                  <p class="card-text">
                                    Click here to create new donation
                                  </p>
                                  <a href="{{ url('createdonevent') }}" class="btn btn-primary btn-sm">Click</a>
                                </div>
                              </div>
                        </div>
                    </div>
        <?php
                }
        ?>
</div>


@endsection
