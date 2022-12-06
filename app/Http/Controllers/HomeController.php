<?php

namespace App\Http\Controllers;

use App\Events\RealTimeNotification;
use App\Listeners\SendNewUserNotification;
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
        $this->middleware('auth');
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
        if(auth()->user()->type == 'patient'){
            return view('page.patients.home', compact('notifications'));
        }
        return view('home', compact('notifications'));
    }
}
