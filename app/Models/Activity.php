<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'type',
        'user_id',
        'session_id',
        'link',
        'status_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function patient_activities(){
        return $this->hasMany(PatientActivity::class);
    }
}
