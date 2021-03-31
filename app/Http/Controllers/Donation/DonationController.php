<?php
namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Donation\Payment2Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PayPal\Api\Order;
use App\Donation;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Donation.payment');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = (new Payment2Controller)->payWithpaypal();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'donner_fullname' => 'required',
            'amount' => 'required',
            'donner_country' => 'required',
            'donner_city' => 'required',
            'donner_address' => 'required',
            'donner_phone' => 'required',
            'donner_email' => 'required',
            'is_member'=>'required',
            'payment_method' => 'required',
        ]);

        $donation = new Donation();

        $donation->donation_id = uniqid('donation_id');
        $donation->donner_fullname = $request->input('donner_fullname');
        $donation->amount = $request->input('amount');
        $donation->id = $request->input('donation_event_id');
        $donation->donner_country = $request->input('donner_country');
        $donation->donner_city = $request->input('donner_city');
        $donation->donner_address = $request->input('donner_address');
        $donation->donner_phone = $request->input('donner_phone');
        $donation->donner_email = $request->input('donner_email');
        $donation->payment_method = $request->input('payment_method');
        $donation->is_member = $request->input('is_member');
        $donation->save();

        return redirect()->route('Donation')->withMessage('Donation has been created');


        // $donation->grand_total = \Cart::session(auth()->id())->getTotal();
        // $donation->item_count = \Cart::session(auth()->id())->getContent()->count();

        // $donation->user_id = auth()->id();

        // if (request('payment_method') == 'paypal') {
        //     $donation->payment_method = 'paypal';

        // }

        

        // $cartItems = \Cart::session(auth()->id())->getContent();

        // foreach($cartItems as $item) {
        //     $donation->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        // }

        // $donation->generateSubOrders();

        // if (request('payment_method') == 'paypal') {

        //     return redirect()->route('paypal.checkout', $donation->id);

        // }

        // \Cart::session(auth()->id())->clear();

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Order $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $donation)
    {
        //
    }
}