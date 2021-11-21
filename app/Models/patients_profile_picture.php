<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class patients_profile_picture extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'patients_id',
        'patients_profile_picture'
    ];

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
