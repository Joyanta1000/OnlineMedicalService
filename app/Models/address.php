<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'doctors_id');
        return $this->belongsTo(User::class, 'phermacies_id');
    }

    public function country()
    {
        return $this->belongsTo(country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(city::class, 'city_id');
    }

    public function thana()
    {
        return $this->belongsTo(thana::class, 'thana_id');
    }

    public function area()
    {
        return $this->belongsTo(area::class, 'area_id');
    }

}
