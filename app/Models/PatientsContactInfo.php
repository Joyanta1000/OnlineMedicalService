<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'phonenumber',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
