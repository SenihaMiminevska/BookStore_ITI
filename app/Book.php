<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Genre;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['provider','email', 'title', 'author', 'genre', 'language', 'price', 'year_of_issue', 'publishing_house', 'EAN', 'ISBN', 'type_cover', 'number_of_page', 'image' ];

    public function genre1()
    {
        return $this->hasOne(Genre::class,'value','genre');
    }
}
