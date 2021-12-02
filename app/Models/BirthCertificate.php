<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'birth_certificate_registration_number',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
