<?php

namespace App\Traits;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Chat;
use App\Models\CommissionSetting;
use App\Models\PatientFile;
use App\Models\User;

trait BillingTrait {
    public $users, $billing, $com_set;

        public function __construct(User $users, Billing $billing, CommissionSetting $com_set)
        {
            $this->middleware('auth');
            $this->users = $users;
            $this->billing = $billing;
            $this->com_set = $com_set;
            $this->middleware(['auth', 'verified']);
        }

        public function role(){            
            return auth()->user()->roles->pluck('name')->first();
        }

        public function get_com(){            
            return $this->com_set->where('desc', 'global-commission')->where('status', 1)->first();
        }

        public function create_billing($id){
            try {
                $plan = $this->get_plan($id);
                
                if((Billing::has_no_bill())){
                    $billing = Billing::create([
                        'user_id' => auth()->user()->id,
                        'charge_amount' => $plan->price,
                        'package_id' => $plan->id,
                        'remainder_count' => 0,
                        'balance' => $plan->price,
                        'desc' => $plan->name,
                        'status' => 0
                    ]);
                    return $billing;
                }else{
                    $update = Billing::current_bill();
                    $update->charge_amount = $plan->price;
                    $update->package_id = $plan->id;
                    $update->balance = $plan->price;
                    $update->desc = $plan->name;
                    $update->save();
                    return $update;
                }
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function get_my_billings(){
            if($this->role() == 'patient'){
                return Billing::with(['user', 'counselor_billing'])
                                        ->where('user_id', auth()->user()->id)->get();
            }elseif($this->role() == 'counselor'){
                return Billing::with(['user', 'counselor_billing'])
                                        ->where('counselor_id', auth()->user()->id)->get();
            }else{
                return Billing::get();
            }
        }

        public function autoBillingUpdate($val){
            $update = Billing::current_bill();
            $update->status = $val;
            $update->save();
            return $update;
        }

        
}