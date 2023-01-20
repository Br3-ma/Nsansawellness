<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'father_name',
        'mother_name',
        'type',
        'role',
        'liecense_number',
        'country',
        'mobile_no',
        'state',
        'email',
        'username',
        'gender',
        'guest_id',
        'first_login',
        'department',
        'nrc_id',
        'password',
        'blood_group',
        'date_of_birth',
        'place_of_birth',
        'address',
        'occupation',
        'hourly_charge',
        'image_path',
        'id_image_path',
        'cover_image_path',
        'patient_condition',
        'login_count'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    
    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }
    
    public function userAppointments(){
        $this->hasMany(UserAppointment::class);
    }

    public function appointments(){
        $this->hasMany(Appointment::class);
    }

    public function patient_activities(){
        return $this->hasMany(PatientActivity::class);
    }

    public function patient_files(){
        return $this->hasMany(PatientFile::class);
    }

    public function assignedCounselor(){
        // Change to:
        // Has One Through (has one USER through AssignCounselor)
        return $this->hasOne(AssignCounselor::class, 'patient_id');
        // return $this->hasOne(AssignCounselor::class, 'counselor_id');
    }

    public function billing(){
        return $this->hasMany(Billing::class);
    }

    public function commissions(){
        return $this->hasMany(Commission::class);
    }

    public function departments(){
        return $this->hasMany(MyDepartment::class);
    }

    // Patient has many payments
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}