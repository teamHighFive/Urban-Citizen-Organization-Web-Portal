<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Donation;

class DonateController extends Controller{
public function notifyUrl(Request $request){

//As their documentation
$merchant_id = $request -> input('merchant_id');
$order_id =  $request -> input('order_id');
$payhere_amount =  $request -> input('payhere_amount');
$payhere_currency =  $request -> input('payhere_currency');
$status_code =  $request -> input('status_code');
$md5sig =  $request -> input('md5sig');

$merchant_secret = '4a9tskvvIn78W8suR5e5MR4eU3B7lA24r48eZTzutsMW'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
// return $status_code;
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){

$newStatus = new Status();
$newStatus ->status= 2;
$newStatus ->save();

}elseif(($local_md5sig === $md5sig) AND ($status_code == 0) ){

$newStatus = new Status();
$newStatus ->status= 0;
$newStatus ->save();

}elseif(($local_md5sig === $md5sig) AND ($status_code == -1) ){

$newStatus = new Status();
$newStatus ->status= -1;
$newStatus ->save();

}elseif(($local_md5sig === $md5sig) AND ($status_code == -2) ){

$newStatus = new Status();
$newStatus ->status= -2;
$newStatus ->save();

}elseif(($local_md5sig === $md5sig) AND ($status_code == -3) ){

$newStatus = new Status();
$newStatus ->status= -3;
$newStatus ->save();

}else{

$newStatus = new Status();
$newStatus ->status= 'Fail';
$newStatus ->save();

}
}

public function cancelUrl(){
 return redirect()->route('shop.home'); 
}
public function returnUrl(){
 return redirect()->route('shop.cart'); 
}
}