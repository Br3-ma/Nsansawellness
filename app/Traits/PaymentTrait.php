<?php

namespace App\Traits;

use App\Models\Billing;
use App\Models\Payment;
use App\Models\User;

trait PaymentTrait {

    public function recordTransaction($data){
      return Payment::create([
        'settled_amount' => $data['amount'],
        'transaction_ref' => $data['amount'],
        'payment_method' => $data['amount'],
        'user_id' => $data['amount'],
        'billing_id' => $data['amount'],
        'desc' => $data['amount']
      ]);
    }
}