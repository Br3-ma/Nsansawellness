<?php

namespace App\Traits;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Chat;
use App\Models\CommissionSetting;
use App\Models\PatientFile;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

trait SubscriptionTrait {
    use WithPagination;
    public function get_subscriptions(){
        return Cache::remember('plan_list', 60 * 60, function () {
            return Plan::with('feature')->latest()->paginate(10);
        });
    }

}