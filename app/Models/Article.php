<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function category()
    {
        // return Article -> hasMany() -> Category

        return $this->belongsTo('App\Models\Category');
    }

    public function comments()
    {
        //return Article ->hasMany() -> Comment

        return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

