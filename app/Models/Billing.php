<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'charge_amount',
        'remainder_count',
        'balance',
        'desc',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
