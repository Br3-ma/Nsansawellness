<?php

namespace App\Http\Controllers;

use App\Events\RealTimeNotification;
use App\Listeners\SendNewUserNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        // $message = 'Welcome '.Auth::user()->fname.' '.Auth::user()->lname.' Thank you for joining';
        // event(new RealTimeNotification($message));
        // check if its first time login
        if(auth()->user()->first_login == 'true' || auth()->user()->first_time == null){
            $x = User::find(auth()->user()->id);
            $x->first_login = false;
            $x->save();

            if(auth()->user()->type == 'patient'){
                return redirect()->route('pay');
            }
            return view('home', compact('notifications'));
        }else{
            if(auth()->user()->type == 'patient'){
                return view('page.patients.home', compact('notifications'));
            }
            return view('home', compact('notifications'));
        }

    }
}
