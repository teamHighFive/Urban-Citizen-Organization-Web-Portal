@extends('layouts.dashboard')
@section('title','Membership fees')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    <div class="card text-body bg-info mb-3 mt-2">
        <div class="card-header font-weight-bold">
            <h2><b>My Membership Payments</b></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card mb-4 wow fadeIn">
                <div class="card-body">
                    @if(count($payments)>0)
                        <table class="table table-bordered table-striped">
                            <thead class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Description</th>
                                    <th>Which Year</th>
                                    <th>Amout</th>
                                    <th>Payment Date</th>

                                </tr>
                            </thead>

                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->payment_id}}</td>
                                    <td>Membership fees</td>
                                    <td>{{$payment->year}}</td>
                                    <th>Rs.750.00</th>
                                    <td>{{ date('M j, Y',strtotime($payment->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not any payments.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">
                            Pay membership fees
                        </div>

                    <div class="card-body">
                        <div class="row">
                                <form action="/do-payments" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Select the year you are paying for,</label>
                                            <select class="form-control" name="year">
                                                <?php
                                                for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                                <option value="<?=$year;?>"><?=$year;?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <button type="submit" id="submit" class="btn btn-info btn-sm">Pay</button>
                                </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection