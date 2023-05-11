<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientQuestionnaires extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'patients',
        'status'
    ];
    public function questions(){
        return $this->hasMany(PatientQQuestions::class, 'questionaire_id');
    }

    public function results(){
        return $this->hasMany(PatientQResult::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($questionaire) { // before delete() method call this
             $questionaire->questions()->each(function($question) {
                $question->delete(); // <-- direct deletion
             });
        });
    }
}
