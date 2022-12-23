<?php

namespace App\Http\Controllers;

use App\Events\RealTimeNotification;
use App\Listeners\SendNewUserNotification;
use App\Models\Appointment;
use App\Models\Chat;
use App\Models\PatientFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $users, $pf, $appointment, $chat;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $users, PatientFile $pf, Appointment $app, Chat $chat)
    {
        $this->middleware('auth');
        $this->appointment = $app;
        $this->user = $users;
        $this->pf = $pf;
        $this->chat = $chat;
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
        // Get all chats am invited in
        $chats = $this->chat->where('sender_id', auth()->user()->id)
        ->orWhere('receiver_id', auth()->user()->id)
        ->with(['sender', 'receiver'])->get();
        // $message = 'Welcome '.Auth::user()->fname.' '.Auth::user()->lname.' Thank you for joining';
        // event(new RealTimeNotification($message));
        // check if its first time login
        if(auth()->user()->first_login == 'true' || auth()->user()->first_login == null){
            $x = User::find(auth()->user()->id);
            $x->first_login = false;
            $x->save();

            if(auth()->user()->type == 'patient'){
                return redirect()->route('pay');
            }
            return view('home', compact('notifications'));
        }else{
            if(auth()->user()->type == 'patient'){
                
                return view('page.patients.home', compact('notifications','chats'));
            }
            return view('home', compact('notifications'));
        }

    }

    public function getMyChats(){

    }
}
