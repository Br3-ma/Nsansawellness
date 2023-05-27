<?php

namespace App\Http\Livewire\Admin\Patient;

use App\Models\PatientQuestionnaires;
use App\Models\User;
use App\Traits\CounselorTrait;
use App\Traits\PatientTrait;
use Livewire\Component;

class PatientQuestionView extends Component
{
    public $index, $create, $update, $users;

    public function render()
    {

        $questionnaires = PatientQuestionnaires::with('questions')->paginate(7);
        $u = auth()->user();
        $this->users =  User::role('patient')->whereHas('assignedCounselor', function ($query) use ($u) {
            $query->where('counselor_id', $u->id);
        })->get();
        return view('livewire.admin.patient.patient-question-view',[
            'questionnaires' => $questionnaires
        ]);
    }
}
