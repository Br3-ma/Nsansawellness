<?php

namespace App\Traits;

use App\Models\Appointment;
use App\Models\Chat;
use App\Models\User;

trait CoreTrait {

        public function my_role(){            
            return auth()->user()->roles->pluck('name')->first();
        }

        public function get_my_chats(){
            if($this->my_role() == 'patient'){
                $chats = Chat::where('receiver_id', auth()->user()->id)
                ->where('status', 1)
                ->with(['sender', 'receiver'])->get();
            }else{
                $chats = Chat::where('sender_id', auth()->user()->id)
                ->where('status', 1)
                ->with(['sender', 'receiver'])->get();
            }

            return $chats;
        }

        public function get_my_appointments(){
            $data = Appointment::where('user_id', auth()->user()->id)->get();
            return $data;
        }

        public function autoAssign($data){
            // Get approved counselor who have one client
            $counselor = User::role('counselor')
            ->whereHas('myfiles')
            ->where('status', 1)
            ->whereNotNull('department')
            ->get();
            
            if ($counselor->count() > 0) {
                // Get a random counselor from the collection
                $r = $counselor->random();
                
                // Call assign api here
                
            } else {
                // Handle the case when no counselors are available
                echo "No counselors available.";
            }
        }
        
}