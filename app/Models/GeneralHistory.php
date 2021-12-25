<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'history',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'prescription_id');
    }
}
