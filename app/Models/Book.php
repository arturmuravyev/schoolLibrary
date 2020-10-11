<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
    	'title',
    	'author_id',
    	'pages',
    	'year',
    	'publisher',
    	'cover'
    ];

    public function author()
    {
        return $this->hasOne('App\Models\Author', 'id');
    }
}
