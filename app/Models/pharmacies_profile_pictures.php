<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacies_profile_pictures extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'pharmacies_id');
    }
}
