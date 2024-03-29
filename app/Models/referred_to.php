<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referred_to extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptions_id',
        'referred_to',
    ];

    public function prescription()
    {
        return $this->belongsTo(prescriptions::class, 'prescriptions_id');
    }
}
