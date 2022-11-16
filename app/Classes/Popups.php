<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

Class Popups {

    public $pushConfs, $pusher;

    // public function __construct()
    // {


    // } 

    public static function DisplayPopUp($event){
        $pushConfs = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        
        $pusher = new Pusher(
            '033c1fdbd94861470759',
            '779dcdbbdd308d0dd9e9',
            '1507438',
            $pushConfs
        );

        
        if($event == 'user-register'){
        $message = 'Welcome '.Auth::user()->fname.' '.Auth::user()->lname.' Thank you for joining';
        $pusher->trigger('popup-channel', 'user-register', $message);
        }
    }
}