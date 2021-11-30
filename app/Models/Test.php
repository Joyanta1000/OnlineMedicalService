<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptions_id',
        'test',
    ];

    public function prescription()
    {
        return $this->belongsTo(prescriptions::class, 'prescriptions_id');
    }
}