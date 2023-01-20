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

        public function my_role(){            
            return auth()->user()->roles->pluck('name')->first();
        }

        public function get_com(){            
            return $this->com_set->where('desc', 'global-commission')->where('status', 1)->first();
        }

        public function get_my_billings(){
            if($this->my_role() == 'patient'){
                return $this->billing->with(['user', 'counselor_billing'])
                                        ->where('user_id', auth()->user()->id)->get();
            }elseif($this->my_role() == 'counselor'){
                return $this->billing->with(['user', 'counselor_billing'])
                                        ->where('counselor_id', auth()->user()->id)->get();
            }else{
                return $this->billing->get();
            }
        }

        
}