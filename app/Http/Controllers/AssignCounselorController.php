<?php

namespace App\Http\Controllers;

use App\Models\AssignCounselor;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use App\Traits\MatchMakerTrait;
use Illuminate\Http\Request;

class AssignCounselorController extends Controller
{
    use MatchMakerTrait;
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
        $this->findMyCounselor();
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
