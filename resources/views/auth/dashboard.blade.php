
@extends('layouts.dashboard')

@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh; width:90;">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

                    <a href="{{ url('online-conferences') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-bullhorn mr-3"></i>Make Online conferences</a>

                    <a href="{{ url('createdonevent') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-newspaper mr-3"></i>Create New Donation</a>

                    <a href="{{ url('/posts/create') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-mail-bulk mr-3"></i>Create New Post</a>

        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1>Dash-board</h1>

                    <a href="{{ url('donation') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>view Donations</a>
        <?php
                }
        ?>
</div>


@endsection
