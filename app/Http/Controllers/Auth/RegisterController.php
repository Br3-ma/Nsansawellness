<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\NewUserNotification;
use App\Notifications\NsansaWellnessCounselor;
use App\Notifications\Welcome;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectToCounsellor = RouteServiceProvider::COUNSELLOR;
    protected $redirectToPatient = RouteServiceProvider::PATIENT;
    protected $redirectToPayments = RouteServiceProvider::PAY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
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

        $admin = User::first();
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'username' => $data['email'],
            'section' => $data['role'],
            'role' => 3,
            'type' => $data['type'],
            'guest_id' => $data['guest_id'],
            'password' => bcrypt($data['password'])
            // 'liecense_number' => $data['role'],
            // 'country' => $data['country'],
            // 'mobile_no' => $data['mobile_no'],
            // 'state' => $data['state'],
            // 'active' => 0,
            // 'password' => Hash::make($data['password']),
            // 'password' => Hash::make($data['password']),
        ]);

        $payload = [
            'sender_id' => $user->id,
            'name' => $user->fname.' '.$user->lname,
            'sender' => 'Nsansa Wellness Group'
        ];

        if($data['type'] == 'patient'){
            $user->assignRole('Patient');
             // Send a notification to Admin about the new patient
            $user->notify(new Welcome($payload));

            // Broadcast a notifications
            $message = 'Welcome '.$user->fname.' '.$user->lname.' Thank you for joining';
            $pusher->trigger('popup-channel', 'user-register', $message);
        }else{
            $user->assignRole('Counselor');
             // Send a notification to Admin about the new counselor
            $user->notify(new NsansaWellnessCounselor($payload));
            $message = 'Welcome '.$user->fname.' '.$user->lname.' Thank you for joining';
            $pusher->trigger('popup-channel', 'user-register', $message);
        }
    
        // Send a notification to Admin about the new user
        $admin->notify(new NewUserNotification($payload));
        return $user;
    }
}
