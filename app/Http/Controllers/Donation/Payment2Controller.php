<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Payment;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payer;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Session;
use URL;





class Payment2Controller extends Controller
{
        public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

//         public function create(){

//                 $apiContext = new \PayPal\Rest\ApiContext(
//                         new \PayPal\Auth\OAuthTokenCredential(
//                           'AUN_W7NPokKD6TBqjkKTCrjpQmH1lq5aIOz7UU8ulScuGl8PDup2bQxEMhmM4MMRXn_GNEkcmQtHlJMj',
//                           'EK_vh8n5Ni8ztoR7YzFpDvOKUFp7H-zgMkbim_zTziB2-ss5SgDHzy1Ar_1Rka9HlO5d502D_YVK-1wW'
//                         )
//                       );
//                 // Create new payer and method
//                 $payer = new Payer();
//                 $payer->setPaymentMethod("paypal");
        
//                 // Set item list
//                 $item1 = new Item();
//                 $item1->setName('Ground Coffee 40 oz')
//                 ->setCurrency('USD')
//                 ->setQuantity(1)
//                 ->setPrice(7.5);
//                 $item2 = new Item();
//                 $item2->setName('Granola bars')
//                 ->setCurrency('USD')
//                 ->setQuantity(5)
//                 ->setPrice(2);
        
//                 $itemList = new ItemList();
//                 $itemList->setItems(array($item1, $item2));
        
//                 //Set payment details
//                 $details = new Details();
//                 $details->setShipping(2.2)
//                 ->setTax(1.3)
//                 ->setSubtotal(17.50);
        
//                 // Set payment amount
//                 $amount = new Amount();
//                 $amount->setCurrency("USD")
//                 ->setTotal(21)
//                 ->setDetails($details);
        
//                 // Set transaction object
//                 $transaction = new Transaction();
//                 $transaction->setAmount($amount)
//                 ->setItemList($itemList)
//                 ->setDescription("Payment description")
//                 ->setInvoiceNumber(uniqid());
        
        
//                 $redirectUrls=new RedirectUrls();
//                 $redirectUrls->setReturnUrl("http://localhost:8000/execute-payment")
//                              ->setCancelUrl("http://localhost:8000/cancel-payment");
        
//                 $payment = new Payment();
//                 $payment->setIntent("sale")
//                         ->setPayer($payer)
//                         ->setRedirectUrls($redirectUrls)
//                         -> setTransactions([$transaction]);
                
//                 $payment->create($apiContext);

 
        
//                 return redirect($payment->getApprovalLink());

                

//         }
//     public function execute()
//     {
//         $apiContext = new \PayPal\Rest\ApiContext(
//                 new \PayPal\Auth\OAuthTokenCredential(
//                   'AUN_W7NPokKD6TBqjkKTCrjpQmH1lq5aIOz7UU8ulScuGl8PDup2bQxEMhmM4MMRXn_GNEkcmQtHlJMj',
//                   'EK_vh8n5Ni8ztoR7YzFpDvOKUFp7H-zgMkbim_zTziB2-ss5SgDHzy1Ar_1Rka9HlO5d502D_YVK-1wW'
//                 )
//               );
//         $paymentId= request('paymentId');
//         $payment=Payment::get($paymentId,$apiContext);

//         $execution=new PaymentExecution();
//         $execution->setPayerId(request('payerID'));

//         $transaction = new Transaction();
//         $amount=new Amount();
//         $details=new Details();

//         $details->setShipping(2.2)
//         ->setTax(1.3)
//         ->setSubtotal(17.50);
        
//         $amount->setCurrency('USD');
//         $amount->setTotal(21);
//         $amount->setDetails($details);
//         $transaction->setAmount($amount);

//         $execution->addTransaction($transaction);
//         $result=$payment->execute($execution,$apiContext);

//         return $result;
// }


public function index(){
        return view('donation.pay');
}

public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount')); //This amount should be in multiplication of $item_1's amount and quantity. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (Config(get('app.debug'))) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/payment');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/payment');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/payment');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(request()->get('PayerID')) || empty(request()->get('token'))) {
            \Session::put('error', 'Payment failed');
            return redirect()->back()->with('message', 'IT NOT WORKS!');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(request()->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            return redirect()->back()->with('message', 'Payment Successfully Received!');
        }
        \Session::put('error', 'Payment failed');
        return redirect()->back()->with('message', 'IT NOT WORKS!');
    }
}





// public function payWithpaypal(Request $request)
//     {
// $payer = new Payer();
//         $payer->setPaymentMethod('paypal');
// $item_1 = new Item();
// $item_1->setName('Item 1') /** item name **/
//             ->setCurrency('USD')
//             ->setQuantity(1)
//             ->setPrice($request->get('amount')); /** unit price **/
// $item_list = new ItemList();
//         $item_list->setItems(array($item_1));
// $amount = new Amount();
//         $amount->setCurrency('USD')
//             ->setTotal($request->get('amount'));
// $transaction = new Transaction();
//         $transaction->setAmount($amount)
//             ->setItemList($item_list)
//             ->setDescription('Your transaction description');
// $redirect_urls = new RedirectUrls();
//         $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
//             ->setCancelUrl(URL::route('status'));
// $payment = new Payment();
//         $payment->setIntent('Sale')
//             ->setPayer($payer)
//             ->setRedirectUrls($redirect_urls)
//             ->setTransactions(array($transaction));
//         /** dd($payment->create($this->_api_context));exit; **/
//         try {
// $payment->create($this->_api_context);
// } catch (\PayPal\Exception\PPConnectionException $ex) {
// if (\Config::get('app.debug')) {
// \Session::put('error', 'Connection timeout');
//                 return Redirect::route('paywithpaypal');
// } else {
// \Session::put('error', 'Some error occur, sorry for inconvenient');
//                 return Redirect::route('paywithpaypal');
// }
// }
// foreach ($payment->getLinks() as $link) {
// if ($link->getRel() == 'approval_url') {
// $redirect_url = $link->getHref();
//                 break;
// }
// }
// /** add payment ID to session **/
//         Session::put('paypal_payment_id', $payment->getId());
// if (isset($redirect_url)) {
// /** redirect to paypal **/
//             return Redirect::away($redirect_url);
// }
// \Session::put('error', 'Unknown error occurred');
//         return Redirect::route('paywithpaypal');
// }

