<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $fillable = [
    'title_english',
    'title_arabic',
    'author_english',
    'author_arabic',
    'description_english',
    'description_arabic',
    'genre',
    'language',
    'pages',
    'publication_year',
    'isbn',
    'user_id',
];

}
