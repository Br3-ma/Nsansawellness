<?php

namespace App\Traits;

use App\Models\Billing;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait PaymentTrait {

    public function recordTransaction($data){
      try {
        // dd($data);
          // Explode the string by slashes
          $segments = explode('/', $data->getRequestUri());

          // Get the last two elements from the array
          $billing_id = end($segments);
          $user_id = prev($segments);
          // Remove the comma from the string
          $numericValue = str_replace(',', '', $data['amount']);
          $amount = (float) $numericValue;
          if($data['paymentStatus'] == 'S' || $data['paymentStatus'] == 's'){
            $status = 'Success';
            $bool = 2;
          }else{
            $status = 'Failed';
            $bool = 3;
          }
          Auth::loginUsingId($user_id);
          Payment::create([
            'settled_amount' => $amount,
            'amount' => $data['amount'],
            // 'transaction_ref' => $data['paymentReference'],
            'paymentReference' => $data['paymentReference'],
            'payment_method' => $data['paymentChannel'],
            'paymentType' => $data['paymentChannel'],
            'user_id' => (int) $user_id,
            'billing_id' => $billing_id,
            'desc' => 'Nsansa Wellness Counseling Services',
            'transaction_status'=> $status
            // 'is_paid'=> 'F'
          ]);

          // Update billing status
          $billing = Billing::where('id', (int) $billing_id)->first();
          $billing->status = $bool;
          $billing->balance = $billing->charge_amount - $amount;
          $billing->save();

          return redirect()->route('billing');
      } catch (\Throwable $th) {
        dd($th);
      }
    }
}

// "",
// "companyName",
// "firstName",
// "lastName",
// "customerType",
// "email",
// "expiryDate",
// "mobile",
// "responseMethod",
// "sourceInstitution",
// "paymentDescription",
// "paymentReference",
// "",
// "redirectUrl",  
// "systemId",
// "password",
// "tpin"