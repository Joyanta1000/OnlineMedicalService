<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicines extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'medicines_name',
        'is_active',
    ];
}
