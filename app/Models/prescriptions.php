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

}
