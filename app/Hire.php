<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    protected $table = 'hires';
    protected $fillable = ['id', 'order_code', 'user_id', 'book_id', 'price', 'date_hire', 'date_return', 'status', 'created_at'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Book', 'book_id');
    }

    public function author()
    {
        return $this->hasManyThrough('App\Author', 'App\Book');
    }
}
