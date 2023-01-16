<?php

namespace App\Traits;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Chat;
use App\Models\PatientFile;
use App\Models\User;

trait CoreTrait {
    public $users, $pf, $appointment, $chat, $billing;

        public function __construct(User $users, PatientFile $pf, Appointment $app, Chat $chat, Billing $billing)
        {
            $this->middleware('auth');
            $this->appointment = $app;
            $this->users = $users;
            $this->pf = $pf;
            $this->billing = $billing;
            $this->chat = $chat;
            $this->middleware(['auth', 'verified']);
        }

        public function my_role(){            
            return auth()->user()->roles->pluck('name')->first();
        }

        public function get_my_chats(){
            if($this->my_role() == 'patient'){
                $chats = $this->chat->where('receiver_id', auth()->user()->id)
                ->where('status', 1)
                ->with(['sender', 'receiver'])->get();
            }else{
                $chats = $this->chat->where('sender_id', auth()->user()->id)
                ->where('status', 1)
                ->with(['sender', 'receiver'])->get();
            }

            return $chats;
        }
}