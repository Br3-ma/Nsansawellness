<?php

namespace App\Traits;

use App\Models\Activity;
use App\Models\PatientActivity;

trait ActivityTrait {
    public $activities, $patient_activities;

    public function __construct(Activity $activities, PatientActivity $patientActivity)
    {
        $this->activities = $activities;
        $this->patient_activities = $patientActivity;
    }

    public function getActivitiesForCounselor(){
        return $this->patient_activities->where('counselor_id', auth()->user()->id)
            ->with('activities.users')->with('activities.counselor')->get();
    }

    public function getActivitiesForPatient(){
        return $this->patient_activities->where('user_id', auth()->user()->id)
        ->with('activities.users')->with('activities.counselor')->get();  
    }
    public function getActivitiesForPatientApi($id){
        return $this->patient_activities->where('user_id', $id)
        ->with('activities.users')->with('activities.counselor')->get();  
    }

}