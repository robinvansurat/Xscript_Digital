<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'Title',
        'Year',
        'Rated',
        'Released',
        'Runtime',
        'Genre',
        'Director',
        'Writer',
        'Actors',
        'Plot',
        'Language',
        'Country',
        'Awards',
        'Poster',
        'Metascore',
        'imdbRating',
        'imdbVotes',
        'imdbID',
        'Type',
        'DVD',
        'BoxOffice',
        'Production',
        'Website',
        'Response'
    ];
    use HasFactory;
}
