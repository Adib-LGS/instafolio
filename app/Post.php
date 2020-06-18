<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    
    /**User Can have Many Post */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
