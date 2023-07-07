<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'notes',
        'chat_id',
        'async_id',
        'status',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function chat(){
        return $this->belongsTo(Chat::class, 'chat_id');
    }
    public function video_session(){
        return $this->belongsTo(Chat::class, 'async_id');
    }
}
