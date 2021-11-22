<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    use HasFactory;
    protected $fillable = [
        'prescriptions_id',
        'mn',
        'af',
        'en',
        'nt',
    ];
    
}
