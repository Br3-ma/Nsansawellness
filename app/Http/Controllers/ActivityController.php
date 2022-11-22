<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActivityRequest;
use App\Models\Activity;
use App\Models\PatientActivity;
use App\Models\User;
use App\Notifications\NewActivity;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ActivityController extends Controller
{    
    public $activity, $user, $pushConfs, $pusher, $assigned_patients;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Activity $act, PatientActivity $assigned_patients, User $users)
    {
        $this->activity = $act;
        $this->user = $users;
        $this->assigned_patients = $assigned_patients;
        $this->pushConfs = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $this->pusher = new Pusher(
            '033c1fdbd94861470759',
            '779dcdbbdd308d0dd9e9',
            '1507438',
            $this->pushConfs
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.activity.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->get();
        return view('page.activity.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivityRequest $request)
    {

        try {
            $activity = $this->activity->create($request->validated());
            foreach($request->patient_ids as $patient){
                $user = $this->user->find($patient);
    
                $this->assigned_patients->create([
                    'activity_id' => $activity->id,
                    'user_id' => $patient,
                ]);
    
                $payload = [
                    'sender_id' => auth()->user()->id,
                    'name' => auth()->user()->fname.' '.auth()->user()->lname,
                    'type' => 'new-activity',
                    'title' => $request->desc
                ];
                // Send a notification to Guest about the new homework
                // $message = 'You have a new homework with'.auth()->user()->fname.' '.auth()->user()->lname;
                $user->notify(new NewActivity($payload));
                $this->pusher->trigger('popup-channel', 'new-activity', $patient);

                return redirect()->route('activities.create')
                ->withSuccess(__('Activity created successfully.'));
            }
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
