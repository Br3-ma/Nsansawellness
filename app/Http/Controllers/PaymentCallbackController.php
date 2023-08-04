<?php

namespace App\Http\Controllers;

use App\Traits\BillingTrait;
use App\Traits\PaymentTrait;
use Illuminate\Http\Request;

class PaymentCallbackController extends Controller
{
    use PaymentTrait, BillingTrait;
    public function index(Request $request){
        dd($request);

        // record transaction
        // $data = $this->recordTransaction($request);
        // update billing status, balance
        // if(){
        //     $this->autoBillingUpdate(1);
        // }
        // Send Email to User and Admin
    
    }
}
