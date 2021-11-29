<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicines_for_patients extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptions_id',
        'medicines_id',
    ];

    public function prescription()
    {
        return $this->belongsTo(prescriptions::class, 'prescriptions_id');
    }
}
