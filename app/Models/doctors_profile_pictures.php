<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class doctors_profile_pictures extends Model implements Searchable

{
    use HasFactory;

    protected $fillable = [
        'doctors_id',
        'profile_picture'
    ];

    public function getSearchResult(): SearchResult
    {
        // $url = route('categories.show', $this->id);

        return new SearchResult(
            $this,
            $this->doctors_id,
            // $url
        );
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'doctors_id');
    }
}
