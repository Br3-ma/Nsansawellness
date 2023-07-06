<?php

namespace App\Traits;

use App\Models\AssignCounselor;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\PatientFile;
use App\Models\User;

trait CounselorTrait {
    use ChatTrait;
    public $users, $u, $pf, $ac, $appointment;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users, PatientFile $pf, Appointment $app, AssignCounselor $ac)
    {
        $this->middleware('auth');
        $this->appointment = $app;
        $this->user = $users;
        $this->pf = $pf;
        $this->ac = $ac;
    }

    public function getMyCounselor($u){
        $my_active_chat = $this->active_chat_info($u);
        $counselor = $this->user->role('counselor')->where('id', $my_active_chat->sender_id)->get();
        return $counselor;
    }

    public function meetingRecordings($u){
        
    }

    public function myBillingHistory($u){

    }

    public function myPatientsSurveyFeedback($u){

    }
}