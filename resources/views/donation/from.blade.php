@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <form class="p-5"method="post" action="https://sandbox.payhere.lk/pay/checkout">
        @csrf
        <input type="hidden" name="merchant_id" value="1215680">    <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="http://127.0.0.1:8000/donation/sucess">
        <input type="hidden" name="cancel_url" value="http://127.0.0.1:8000/donation/failed">
        <input type="hidden" name="notify_url" value="http://example.com">


        <!-- Material form contact -->
<div class="card col-md-4">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Donation</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <!-- Name -->
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">First Name</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Last Name</label>
            </div>

            <!-- E-mail -->
            <div class="md-form">
                <input type="email" id="materialContactFormEmail" class="form-control">
                <label for="materialContactFormEmail">E-mail</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Phone</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Address</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">City</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Country</label>
            </div>
            <div class="md-form mt-1">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Amount</label>
            </div>

            <!-- Subject -->
            <span>curency</span>
            <select class="mdb-select">

                <option value="1" selected>Rs</option>
                <option value="2">US Dollar (USD)</option>
                <option value="3">Euro (EUR)</option>
                <option value="4">Sterling (GBP)</option>
            </select>


            <!-- Copy -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialContactFormCopy">
                <label class="form-check-label" for="materialContactFormCopy">Send me emails</label>
            </div>

            <!-- Send button -->
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Donate</button>


    </div>

</div>

        </form>
</div>
@endsection
