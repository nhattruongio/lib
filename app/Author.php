<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['id', 'user_id', 'name', 'avatar', 'description', 'created_at'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
