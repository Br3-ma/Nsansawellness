<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\User;
use App\Models\UserAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{    
    public $appointment, $user_appointment, $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Appointment $app, UserAppointment $ua, User $users)
    {
        $this->user_appointment = $ua;
        $this->appointment = $app;
        $this->user = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->appointment->where('user_id', Auth::user()->id)->get();
        $incoming_appointments = UserAppointment::with('appointment')->where('guest_id', Auth::user()->id)->get();
        return view('page.appointments.index', compact('appointments','incoming_appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->get();
        return view('page.appointments.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAppointmentRequest $request)
    {
        
        $appointment = $this->appointment->create($request->validated());
        foreach($request->guest_id as $guest){
            $this->user_appointment->create([
                'guest_id' => $guest,
                'appointment_id' => $appointment->id,
                'status' => 1
            ]);
        }

        return redirect()->route('appointment')
            ->withSuccess(__('Appointment created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = $this->appointment->where('id', $id)->get()->first();
        $guests = $this->user_appointment->where('appointment_id', $id)->with('user')->get();
        return view('page.appointments.show', ['appointment' => $appointment, 'guests'=> $guests]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = $this->appointment->where('id', $id)->get()->first();
        $guests = $this->user_appointment->where('appointment_id', $id)->with('user')->get();
        $users = $this->user->get();
        return view('page.appointments.edit', ['appointment' => $appointment, 'guests'=> $guests, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request)
    {
        $this->appointment->update($request->validated());
        foreach($request->guest_id as $guest){
            $this->user_appointment->create([
                'guest_id' => $guest,
                'appointment_id' => $request->app_id,
                'status' => 1
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = $this->appointment->find($id);
        $a->delete();
        return redirect()->route('appointment')
            ->withSuccess(__('Appointment deleted successfully.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $update = $this->appointment->find($id);
        $update->status = 0;
        $update->save();
        
        return redirect()->route('appointment')
            ->withSuccess(__('Appointment Deactivated successfully.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $update = $this->appointment->find($id);
        $update->status = 1;
        $update->save();
        
        return redirect()->route('appointment')
            ->withSuccess(__('Appointment Activated successfully.'));
    }

    public function removeGuest($id, $appointment_id){
        $a = $this->user_appointment->where('guest_id', $id)->where('appointment_id', $appointment_id);
        $a->delete();
        return redirect()->route('appointment.edit', ['id'=>$appointment_id]);
        // return view('page.appointments.edit', ['appointment' => $appointment, 'guests'=> $guests, 'users' => $users]);
    }
}
