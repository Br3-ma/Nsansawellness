<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCounselor extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'counselor_id',
        'status_id', // 1 / 2
        'comments',
        'status', // paid / unpaid
        'rate', //ammount
        'end_date'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

}
