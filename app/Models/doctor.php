<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'doctors_id');
    }

}
