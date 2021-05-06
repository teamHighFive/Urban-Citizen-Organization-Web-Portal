@extends('layouts.dashboard')
@section('title','Payments Details')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
    <div class="card text-body bg-info mb-3 mt-2">
        <div class="card-header font-weight-bold text-white">
            <h2><b>Membership Payment Details</b></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(count($payments)>0)
                        <table class="table table-bordered table-striped">
                            <thead class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                                <tr>
                                    <th>User_Id</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <th>Membership Payment Date</th>
                                    <th>Which Year</th>

                                </tr>
                            </thead>
                            @foreach($payments as $payment)

                                    <?php
                                    $user = Auth::user();
                                    if($user['role_as'] == 'admin'){
                                    ?>
                                        <tr>
                                            <th>{{App\User::find($payment->user_id)->id}}</th>
                                            <th>{{App\User::find($payment->user_id)->fname}} {{App\User::find($payment->user_id)->mname}}</th>
                                            <th>Rs.750.00</th>
                                            <th>{{ date('M j, Y',strtotime($payment->created_at)) }}</th>
                                            <th>{{$payment->year}}</th>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                            @endforeach
                        </table>
                    @else
                        <p>Member have not any payments.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
