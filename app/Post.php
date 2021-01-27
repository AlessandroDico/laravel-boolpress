<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'text', 'slug'];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
