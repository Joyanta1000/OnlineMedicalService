<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patients_id',
        'first_name',
        'last_name',
        'gender_id',
        'date_of_birth',
        'fathers_name',
        'mothers_name',
        'marital_status_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
