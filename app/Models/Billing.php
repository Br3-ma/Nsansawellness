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
        'package_id',
        'charge_amount',
        'remainder_count',
        'balance',
        'desc',
        'status',
        'is_paid',
        'can_video_call',
        'expired'
    ];

    // Returns true or false if the user has a current bill to pay
    public static function has_no_bill(){
        if(auth()->user()->hasRole('patient')){
            if(auth()->user()){
                return Billing::where('user_id', auth()->user()->id)
                ->where('status', 1)->exists();
            }else{
                return false;
            }
        }else{
            
            return true;
        }
    }

    // Returns the last billing to pay
    public static function current_bill(){
        return Billing::where('user_id',  auth()->user()->id)
                        ->where('status', 0)
                        ->latest()->first() ?? 0;
    }

    // Returns the total balance a user is to pay
    public static function running_balance($user_id){
        return Billing::where('user_id',  $user_id)
                        ->where('status', 0)
                        ->latest()->first();
    }

    public static function can_video_call(){
        $b = Billing::current_bill();
        if($b !== null){
            return $b->can_video_call;
        }else{
            return false;
        }
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
