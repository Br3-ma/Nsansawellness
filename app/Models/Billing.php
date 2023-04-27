<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'counselor_id',
        'charge_amount',
        'remainder_count',
        'balance',
        'desc',
        'status'
    ];

    public static function has_bill(){
        return Billing::where('user_id', auth()->user()->id)
        ->where('status', 0)->exists();
    }
    public static function last_billing(){
        return Billing::where('user_id',  auth()->user()->id)
                        ->where('status', 0)
                        ->latest()->first();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function counselor_billing(){
        return $this->belongsTo(User::class, 'counselor_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
