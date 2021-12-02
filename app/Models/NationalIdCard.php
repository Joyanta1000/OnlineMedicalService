<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalIdCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'nid'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

}
