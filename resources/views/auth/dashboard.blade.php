
{{-- sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss --}}

@extends('layouts.dashboard')

@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

                    <a href="{{ url('online-conferences') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>Make Online conferences</a>
        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1>Tharindu</h1>
        <?php
                }
        ?>
</div>


@endsection
