<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

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

        if($data['type'] == 'patient'){
            $user->assignRole('Patient');
        }else{
            $user->assignRole('Counselor');
        }
        
        $data = [
            'sender' => 'Nsansa Wellness Group',
            'name' => $user->lname.' '.$user->lname,
            'message' => 'Welcome '.$user->lname.' '.$user->lname.' Thank you for joining',
            'type' => 'NewUser',
            'ispopped' => 0
        ];

        Notification::send($admin, new NewUserNotification($data));
        return $user;

    }
}
