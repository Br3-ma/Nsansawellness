<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionaireRequest;
use App\Models\Question;
use App\Models\Questionaire;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class QuestionaireController extends Controller
{
    public  $questionaire;
    public  $questions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Questionaire $q, Question $qn)
    {
        $this->questionaire = $q;
        $this->questions = $qn;
    }
    public function index()
    {
        $questionaires = $this->questionaire->with('questions')->get();
        return view('page.questionaires.index', compact('questionaires'));
    }
    public function feed()
    {
        // get the active survey
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $users = User::latest()->paginate(10);
        return view('page.questionaires.user_feedback', compact('roles', 'users'));
    }
    public function user_feed($id)
    {
        $user = User::where('guest_id', $id)->first();
        // get the active survey
        $survey_results = $this->questions->with("results")->whereHas("results",function($q) use($id){
            $q->where("guest_id","=",$id);
        })->get();
        return view('page.questionaires.results', compact('survey_results', 'user'));
    }

    public function updateStatus(Request $request){
        $q = $this->questionaire->findOrFail($request->user_id);
        $q->status_id = $request->status;
        $q->save();

        if($request->status == 1){
            $others = $this->questionaire->where('group_assigned', $q->group_assigned)
            ->where('id', '!=' , $q->id )->get();
            $others->status_id = 0;
            $others->save();
        }
        return response()->json(['message' => 'User status updated successfully.']);
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
    public function store(Question $question, CreateQuestionaireRequest $request)
    {
        
        $survey = $this->questionaire->create($request->validated());
        
        foreach ($request->question as $key => $value) {
           
            $question->create([
                'question' => $value,
                'type' => $request->type[$key],
                'questionaire_id' => $survey->id
            ]);
        }
        return redirect()->route('questionaires.index')
            ->withSuccess(__('Questionaire created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionaires = $this->questionaire->with(['questions.answers'])->where('id', $id)->first();
        return view('page.questionaires.edit_answers', compact('questionaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questions->with(['answers'])->where('id', $id)->first();
        return view('page.questionaires.edit', compact('question'));
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
        $questionaire->delete();
        return redirect()->route('questionaires.index')
            ->withSuccess(__('Questionaire removed successfully.'));
    }

    
    public function questionDestroy($question, $questionnaire)
    {
        $del = $this->questions->findOrFail($question);
        $del->delete();
        return redirect()->route('questionaires.show', $questionnaire)
            ->withSuccess(__('Questionaire removed successfully.'));
    }
}
