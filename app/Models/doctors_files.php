<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors_files extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(doctors_files::class, 'doctors_id');
    }
}
