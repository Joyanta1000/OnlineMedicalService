<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'patients_id',
        'doctors_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctors_id');
        return $this->belongsTo(User::class, 'patients_id');
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class, 'doctors_id');
    }
    public function patient()
    {
        return $this->belongsTo(patient::class, 'patients_id');
    }

    public function medicines_for_patients()
    {
        return $this->hasMany(medicines_for_patients::class, 'prescriptions_id');
    }

    public function test()
    {
        return $this->hasMany(Test::class, 'prescriptions_id');
    }

    public function patients_problems()
    {
        return $this->hasMany(patients_problems::class, 'prescriptions_id');
    }

    public function referred_to()
    {
        return $this->hasMany(referred_to::class, 'prescriptions_id');
    }

    public function frequency()
    {
        return $this->hasMany(Frequency::class, 'prescriptions_id');
    }

    public function foodTime()
    {
        return $this->hasMany(FoodTime::class, 'prescriptions_id');
    }

    public function duration()
    {
        return $this->hasMany(Duration::class, 'prescriptions_id');
    }

}
