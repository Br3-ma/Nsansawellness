<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientQResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_answer',
        'question_id',
        'guest_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question(){
        return $this->belongsTo(PatientQQuestions::class, 'question_id');
    }
}
