<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Payment;
use App\Models\User;
use App\Traits\BillingTrait;
use App\Traits\CounselorTrait;
use App\Traits\PaymentTrait;
use App\Traits\SubscriptionTrait;
use Illuminate\Http\Request;

class PaymentController extends Controller
{    
    use SubscriptionTrait, BillingTrait, CounselorTrait, PaymentTrait;
    public $users, $payments, $plans;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users, Payment $payments)
    {
        $this->plans = $this->get_subscriptions();
        $this->payments = $payments;
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('page.payments',[
            'plans' => $this->plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create a Payment
        $payload = [
            'name' => $request->fname.' '.$request->lname,
            'invoice_id' => $request->invoice_id,
            'total' => $request->total,
            'phone' => $request->phone,
            'email' => $request->email,
            ''
        ];
    }

    public function bill($id){
        try {
            $billing = $this->create_billing($id);
            return view('page.payment-summary',[
                'billing' => $billing
            ]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function gateway(Request $request){

        $data = $this->requestPayment($request);
        $data = $this->getAllTransactions();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
