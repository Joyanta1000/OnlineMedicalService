<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address()
    {
        return $this->hasMany(address::class, 'doctors_id');
        return $this->hasMany(address::class, 'pharmacies_id');
    }

    public function doctor()
    {
        return $this->hasMany(doctor::class, 'doctors_id');
    }

    public function doctors_profile_picture()
    {
        return $this->hasMany(doctors_profile_pictures::class, 'doctors_id');
    }

    public function patients_profile_picture()
    {
        return $this->hasMany(patients_profile_picture::class, 'patients_id');
    }

    public function pharmacy_profile_picture()
    {
        return $this->hasMany(pharmacies_profile_pictures::class, 'pharmacies_id');
    }

    public function doctors_specialities()
    {
        return $this->hasMany(doctors_specialities::class, 'doctors_id');
    }

    public function doctors_file()
    {
        return $this->hasMany(doctors_files::class, 'doctors_id');
    }

    public function patient()
    {
        return $this->hasMany(patient::class, 'patients_id');
    }

    public function patient_contact_info()
    {
        return $this->hasMany(PatientsContactInfo::class, 'patient_id');
    }

    public function pharmacy()
    {
        return $this->hasMany(pharmacies::class, 'pharmacies_id');
    }

    public function pharmacy_file()
    {
        return $this->hasMany(pharmacies_files::class, 'pharmacies_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function chat()
    {
        return $this->hasMany(chats::class, 'senders_id');
        return $this->hasMany(chats::class, 'recievers_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(prescriptions::class, 'doctors_id');
        return $this->hasMany(prescriptions::class, 'patients_id');
    }

    public function schedule()
    {
        return $this->hasMany(DoctorsSchedule::class, 'doctors_id');
    }

    public function social_network()
    {
        return $this->hasMany(social_networks::class, 'doctors_id');
    }

}
