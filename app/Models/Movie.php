<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'director',
        'genre',
        'release_year',
        'description'
    ];

    //hasMany relationship with rating table
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // calculated average rating
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}