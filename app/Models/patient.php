<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class patient extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'patients_id',
        'first_name',
        'last_name',
        'gender_id',
        'date_of_birth',
        'fathers_name',
        'mothers_name',
        'marital_status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'patients_id');
    }

    public function getSearchResult(): SearchResult
    {
        // $url = route('categories.show', $this->id);

        return new SearchResult(
            $this,
            $this->patients_id
            // $url
        );
    }
    
}
