<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'archived_by',
    ];

    public function prescription()
    {
        return $this->belongsTo(prescriptions::class, 'prescription_id');
    }
}
