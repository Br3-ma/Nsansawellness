<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'appointment_id',
        'status'
    ];

    public function appointment(){
        $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function user(){
        $this->belongsTo(User::class, 'guest_id');
    }
}
