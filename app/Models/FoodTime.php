<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescriptions_id',
        'before_food',
        'after_food',
    ];
}
