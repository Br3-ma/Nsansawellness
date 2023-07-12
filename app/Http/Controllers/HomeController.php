<?php

namespace App\Http\Controllers;

use App\Events\RealTimeNotification;
use App\Listeners\SendNewUserNotification;
use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Chat;
use App\Models\PatientFile;
use App\Models\User;
use App\Traits\CoreTrait;
use Illuminate\Http\Request;
use App\Traits\PatientTrait;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    use CoreTrait, PatientTrait;
    public $users, $pf, $appointment, $chat, $billing;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        // Get all chats am invited in
        $chats = $this->get_my_chats();
        $random = random_int(0, 21);
        // $message = 'Welcome '.Auth::user()->fname.' '.Auth::user()->lname.' Thank you for joining';
        // event(new RealTimeNotification($message));
        // check if its first time login
        $counselors =  $this->users->role('counselor')->get();
        $total_patients =   Chat::whereHas('receiver')->where('status',1)->where('sender_id', auth()->user()->id)->count();
        
        // If the User is logging for the first time
        if(auth()->user()->first_login == 'true' || auth()->user()->first_login != 0){
            // if its a Patient redirect them to payments
            if($this->my_role() == 'patient'){
                // record invoice billing.
                // if they have a pending billing redirect to pays else patient dashboard
                return redirect()->route('pay');
            }
            return view('home', compact('notifications', 'counselors', 'total_patients'));
        }else{
            // if the User logs in in the future
            if($this->my_role() == 'patient'){
                $this->billing->where('user_id', auth()->user()->id)->update(['remainder_count'=> $random]);
                return view('page.patients.home', compact('notifications','chats', 'counselors', 'total_patients'));
            }
            return view('home', compact('notifications', 'chats', 'counselors', 'total_patients'));
        }

    }

    public function getMyChats(){

    }
}
