<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyDepartment extends Model
{
    use HasFactory;    
    protected $fillable = [
        'user_id',
        'department_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
