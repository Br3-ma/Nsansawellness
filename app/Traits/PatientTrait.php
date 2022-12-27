<?php

namespace App\Traits;

use App\Models\AssignCounselor;
use Illuminate\Http\Request;

trait PatientTrait {

    public function getPatients(){
        
    }

    // Return all your patients with their user info, file records
    public function getMyPatients($counselor_user_id){
        $data = AssignCounselor::with('patient')->where('counselor_id', $counselor_user_id)->get();
        dd($data);
    }

}