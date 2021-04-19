<?php

namespace App\Http\Controllers;

use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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

class MembershipPaymentsController extends Controller
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

    public function mpayments()
    {
        $payments = Payments::all()->where('is_success', "yes")->where('user_id', Auth::user()->id)->sortby('year');
        return view('auth.payments')->with('payments', $payments);
    }

    public function membersPayments($id){
        $payments = Payments::all()->where('is_success', "yes")->where('user_id', $id)->sortby('year');
        return view('auth.members_payments')->with('payments', $payments);
    }

    public function createPayments(Request $request)
    {
        $mpayment = new Payments();
        $mpayment->year = $request->input('year');
        $mpayment->user_id = Auth::user()->id;
        $mpayment->save();
        $mpayment_id=$mpayment->id;

        //================================================================
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(3); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(3); //This amount should be in multiplication of $item_1's amount and quantity. 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('membership-payment-status/'.$mpayment_id)) /** Specify return URL **/
            ->setCancelUrl(URL::to('membership-payment-status/'.$mpayment_id));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        

        \Session::put('error', '');
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
            return Redirect::to('/membership-payments');
            if (Config(get('app.debug'))) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/membership-payments');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/membership-payments');
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
            return $data;
        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/membership-payments');
        //================================================================

    }

    public function getPaymentStatus($mpayment_id)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(request()->get('PayerID')) || empty(request()->get('token'))) {
            \Session::put('error', 'Payment failed');
            return redirect()->back()->with('message', 'IT NOT WORKS!');
            
            // return 'error';
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(request()->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success.Thank you!!!');
            $mpayment = Payments::find($mpayment_id);
            $mpayment->is_success = 'yes';
            $mpayment->update();

            $text = 'Your mambership payment of LKR 750.00, for the year '.$mpayment->year.' has been made successfully.';

            $response = app('App\Http\Controllers\SMSController')->send(Auth::user()->contact, $text);

            if($response == 'SMS notifications sent successfully.'){
                return redirect()->back()->with('status','Your Membership Payment has been made successfully. You will recieve a confirmation SMS soon.');
            }else{
                return redirect()->back()->with('status','Your Membership Payment has been made successfully. '.$response);
            }
        
        }
        \Session::put('error', 'Payment failed');
         return redirect()->back()->with('message', 'IT NOT WORKS!');
        

    }
}
