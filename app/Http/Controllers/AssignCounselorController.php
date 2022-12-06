<?php

namespace App\Http\Controllers;

use App\Models\AssignCounselor;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class AssignCounselorController extends Controller
{

    public $user, $qn, $res, $assignPatients;
    public function __construct(User $user, Question $qn, Result $res, AssignCounselor $ac)
    {
        
        $this->user = $user;
        $this->qn = $qn;
        $this->res = $res;
        $this->assignPatients = $ac;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Get the patient survey Answers to Array
        $patient_survey_arr = $this->res->with('question')->where('guest_id', $id)->get()->toArray();

        //Get the patient attributes to Array
        $patient_attributes_arr = $this->user->where('guest_id', $id)->get()->toArray();
        // dd($patient_survey_arr);
        // dd($patient_attributes_arr);

        // Merge attributes and answers array to Patient Spec Array
        $this->findMyCounselorByAttributes($patient_survey_arr);
    }

    public function findMyCounselorByAttributes($patient_survey_arr){
        $total_charge = rand(10.90, 70.89);
        // Get all Counselors with Survey answers
        $counselors = $this->user->role('counselor')->get('id')->toArray();
        // dd($counselors);
        foreach($counselors as $key => $counselor){
            $user_info = $this->user->where('id', $counselor['id'])->get()->toArray();
            // dd($user_info[0]['patient_limit']);
            // $get_counselor_survey = $this->res->with('question')
            //                             ->where('guest_id', $user_info[$key]['guest_id'])
            //                             ->get()->toArray();
            // dd($get_counselor_survey);

            // Get Counselor's total patients
            $count = $this->assignPatients->where('counselor_id', $counselor['id'])->get()->count();

            // Counselor patient limit exceeds?
            if($user_info[0]['patient_limit'] > $count){
                // dd('No Limit');
                // Counselor ready for more work?
                if($user_info[0]['work_status'] == 1){
                    //  dd('Ready for More work');
                    // Counselor qualified for this type of therapy
                    // if($user_info[0]['role']){
                        // dd('Qualified for this kind of therapy');
                        // Counselor charge is in range with patient invoice
                        // if($user_info[0]['hourly_charge'] <= $total_charge){
                            // Counselor charge is in range with patient invoice
                            AssignCounselor::create([
                                'patient_id' => 8 ,
                                'counselor_id' => $user_info[0]['id'],
                                // 'status_id' => 1, // 1 / 2
                                'status' => 1, // paid / unpaid
                                // 'rate' => $total_charge, //ammount
                                // 'end_date' => '2023-01-03'
                            ]);

                            // increment patient limit
                            
                        // }
                    // }
                }
            }
            
        }
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
        //
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
    public function destroy(AssignCounselor $assignCounselor)
    {
        //
    }
}
