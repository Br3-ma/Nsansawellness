<?php

namespace App\Http\Controllers;

use App\Models\Questionaire;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.questionaires.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.questionaires.create');
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
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionaire $questionaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionaire $questionaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionaire $questionaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionaire $questionaire)
    {
        //
    }
}
