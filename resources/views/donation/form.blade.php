<!doctype html>
<html lang="en">
    <head>
        <link
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.css"
        rel="stylesheet"
        />
  
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>

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
        <!-- Form -->

        {{-- <br><br>Donation Details<br>
        <input type="text" name="order_id" value="12345">
        <input type="text" name="items" value="Donation1"><br>
        <input type="text" name="currency" value="LKR">
        <input type="text" name="amount" value="1000">  
        <br><br>Donner Details<br>
        <input type="text" name="first_name" value="Saman">
        <input type="text" name="last_name" value="Perera"><br>
        <input type="text" name="email" value="samanp@gmail.com">
        <input type="text" name="phone" value="0771234567"><br>
        <input type="text" name="address" value="No.1, Galle Road">
        <input type="text" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka"><br><br> 
        <input type="submit" value="Donate">    --}}
    </form> 




<!-- Material form contact -->
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.js"
></script>


<!--Bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>