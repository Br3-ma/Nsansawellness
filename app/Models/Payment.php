<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'settled_amount',
        'transaction_ref',
        'payment_method',
        'user_id',
        'billing_id',
        'desc'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function billing(){
        return $this->belongsTo(Billing::class, 'billing_id');
    }

}
