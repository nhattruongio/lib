<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['id', 'user_id', 'name_book', 'author_id', 'image_book', 'description_book', 'publish_date', 'price_book', 'hire', 'created_at'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }
}
