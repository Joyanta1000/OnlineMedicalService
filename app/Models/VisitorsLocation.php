<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorsLocation extends Model
{
    use HasFactory;

    protected $fillable = [
            'ip_address'
    ];
}
