<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'video_link',
        'call_link',
        'type',
        'status',
        'comments',
        'user_id',
        'start_time',
        'end_time'
    ];

    public function userAppointment(){
        return $this->hasMany(UserAppointment::class);
    }

    public function guests(){
        return $this->hasMany(UserAppointment::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
