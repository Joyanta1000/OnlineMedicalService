<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'description',
        'amount',
        'payment_from',
        'payment_method_types',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id');
        return $this->belongsTo(User::class, 'patient_id');
    }
    

}
