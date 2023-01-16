<?php

namespace App\Http\Controllers;

use App\Models\AssignCounselor;
use App\Models\Chat;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Notifications\CounselorAssigned;
use App\Notifications\NewPatientAssigned;
use App\Traits\MatchMakerTrait;
use Illuminate\Http\Request;
use Session;

class AssignCounselorController extends Controller
{
    use MatchMakerTrait;
    public $user, $qn, $res, $assignPatients, $chat;
    public function __construct(User $user, Question $qn, Result $res, AssignCounselor $ac, Chat $chat)
    {
        
        $this->user = $user;
        $this->qn = $qn;
        $this->res = $res;
        $this->assignPatients = $ac;
        $this->chat = $chat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $notifications = auth()->user()->notifications;
        //Get the patient survey Answers to Array
        $patient_survey_arr = $this->res->with('question')->where('guest_id', $id)->get()->toArray();

        //Get the patient attributes to Array
        $patient_attributes_arr = $this->user->where('guest_id', $id)->get()->toArray();
        // dd($patient_survey_arr);
        // dd($patient_attributes_arr);

        // Merge attributes and answers array to Patient Spec Array
        $this->findMyCounselor();
    }

    public function getCounselorByDept(Request $request){
        $res = User::where('department', $request->toArray()['counselor_id'])->get()->toArray();
        return response()->json(['result' => $res], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the new message
            $check = AssignCounselor::where('patient_id', $request->toArray()['patient_id'])->first();
            // dd($check);
            if($check != null){
                AssignCounselor::where('patient_id', $request->toArray()['patient_id'])->delete();
            }
            AssignCounselor::create($request->toArray());
            Chat::create([
                'sender_id' => $request->toArray()['counselor_id'],
                'receiver_id' => $request->toArray()['patient_id'],
                'status' => 1
            ]);

            $payload = [
                'sender_id' => $request->toArray()['counselor_id'],
                'patient_id' => $request->toArray()['patient_id'],
                'name' => 'Nsansa wellness',
                'sender' => 'Nsansa Wellness Group'
            ];

            try {
                                // //Notify counselor
                User::find($request->toArray()['counselor_id'])
                ->notify(new NewPatientAssigned($payload));
                
                // // Notify patient
                User::find($request->toArray()['patient_id'])
                ->notify(new CounselorAssigned($payload));

                Session::flash('attention', "Counselor has been assign successfully");
                return redirect()->back();
            } catch (\Throwable $th) {
                Session::flash('attention', "Counselor has been assign successfully");
                Session::flash('err_msg', "Email notification was not sent.");
                return redirect()->back();
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignCounselor  $assignCounselor
     * @return \Illuminate\Http\Response
     */
    public function show(AssignCounselor $assignCounselor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignCounselor  $assignCounselor
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignCounselor $assignCounselor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignCounselor  $assignCounselor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignCounselor $assignCounselor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignCounselor  $assignCounselor
     * @return \Illuminate\Http\Response
     */
    public function remove_counselor(AssignCounselor $assignCounselor, $id)
    {
        try {
            $update = $assignCounselor->find($id);
            $update->status == 1 ? $update->status = 0 : $update->status = 1;
            $update->save();

            // Disable the Chat
            $update->status == 0 ? 
            $this->chat->where('receiver_id', $update->patient_id)->update(['status' => 0]) : 
            $this->chat->where('receiver_id', $update->patient_id)->update(['status' => 1]);

            
            $update->status == 0 ? 
            Session::flash('attention', "Counselor has been disabled successfully"):
            Session::flash('attention', "Counselor Recovered!");
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('err_msg', "Oops. Something went wrong, task failed.");
            return redirect()->back();
        }

    }
}
