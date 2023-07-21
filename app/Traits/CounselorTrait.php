<?php

namespace App\Traits;

use App\Models\User;

trait CounselorTrait {
    use ChatTrait;

    public function getMyCounselor($u){
        $my_active_chat = $this->active_chat_info($u);
        $counselor = User::role('counselor')->where('id', $my_active_chat->sender_id)->get();
        return $counselor;
    }

    public function meetingRecordings($u){
        
    }

    public function myBillingHistory($u){

    }

    public function myPatientsSurveyFeedback($u){

    }
}