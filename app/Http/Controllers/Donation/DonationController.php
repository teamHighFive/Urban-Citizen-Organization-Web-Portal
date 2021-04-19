<?php

namespace App\Http\Controllers\Donation;

use App\DonationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Donation;




class DonationController extends Controller
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


public function index($id){
        $donationEvents = DonationEvent::where('id', $id)->get();
        
        
        return view('donation.form')->with('donationEvents', $donationEvents);
}

public function payWithpaypal(Request $request){

    $request->validate([
        'donner_fullname' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'donner_phone' => 'required|numeric|min:10',
        'donner_email' => 'required|email',
        'is_member'=>'required',
    ]);

        $donation = new Donation();
        $donation->donner_fullname = $request->input('donner_fullname');
        $donation->amount = $request->input('amount');
        $donation->donation_event_id = $request->input('donation_event_id');
        $donation->donner_country = $request->input('donner_country');
        $donation->donner_city = $request->input('donner_city');
        $donation->donner_address = $request->input('donner_address');
        $donation->donner_phone = $request->input('donner_phone');
        $donation->donner_email = $request->input('donner_email');
        $donation->comment = $request->input('comment');
        $donation->is_member = $request->input('is_member');
        $donation->save();
        $donation_id=$donation->id;

        

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
        $redirect_urls->setReturnUrl(URL::to('donationstatus/'.$donation_id)) /** Specify return URL **/
            ->setCancelUrl(URL::to('donationstatus/'.$donation_id));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        // dd($payment->create($this->_api_context));
        // exit;
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
            return Redirect::to('/donation');
            if (Config(get('app.debug'))) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/donation');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/donation');
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
        return Redirect::to('/donation');
    }

    public function getPaymentStatus($donation_id)
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
            \Session::put('success', 'Donation success.Thank you!!!');
            $donation = Donation::find($donation_id);
            $donation->is_success = 'yes';
            $donation->update();
            return redirect()->back()->with('message', 'Donation Successfully Received!');
        
        }
        \Session::put('error', 'Donation failed');
         return redirect()->back()->with('message', 'IT NOT WORKS!');
        

    }

    public function show($id)

    {
        $donations = Donation::Where('is_success', "yes")->where('donation_event_id', $id)->get();
        return view('donation.show', compact('donations'))->with('id', $id);
    }

   

}






