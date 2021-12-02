<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'code',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function address()
    {
        return $this->hasMany(address::class, 'country_id');
    }
}
