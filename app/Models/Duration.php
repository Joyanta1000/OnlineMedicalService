<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptions_id',
        'duration',
        'duration_time'
    ];

    public function prescription()
    {
        return $this->belongsTo(prescriptions::class, 'prescriptions_id');
    }
    
}
