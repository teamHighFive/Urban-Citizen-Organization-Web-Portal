<form method="post" action="https://sandbox.payhere.lk/pay/checkout" >  

    <input type="hidden" name="merchant_id" value="1215680">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="{{route ( 'shop.returnUrl' )}}">
    <input type="hidden" name="cancel_url" value="{{route ( 'shop.cancelUrl' )}}">
    <input type="hidden" name="notify_url" value="{{route ( 'shop.notifyUrl' )}}">  

    <input hidden type="text" name="order_id" value="xxxxx">
    <input hidden type="text" name="items" value="xxxxxx">
    <input hidden type="text" name="currency" value="LKR">
    <input hidden type="text" name="amount" value="5000.0"> 

    <br><br>Customer Details</br></br>
    <input type="text" name="first_name" value="xxxxx">
    <input type="text" name="last_name" value="xxxx">
    <input type="text" name="email" value="xxxx">
    <input type="text" name="phone" value="xxxx">
    <input type="text" name="address" value=" xxxxx / xxxxxx/ xxxxxx/ Sri Lanka">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka">  
</form> 