<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'single',
        'sender_id',
        'receiver_id',
        'third_party_id',
        'appointment_id',
        'room_id',
        'is_active',
        'status'
    ];

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function third_party(){
        return $this->belongsTo(User::class, 'third_party_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function appointment(){
        return $this->belongsTo(User::class, 'appointment_id');
    }

    public function chat_messages(){
        return $this->hasMany(ChatMessages::class);
    }

}
