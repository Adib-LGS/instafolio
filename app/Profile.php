<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    //Skip MassAssignement Error
    protected $guarded = [];
    

    /**Each Profile BelongsTo each User */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Defaut Image creation Profile User
    */
    public function getImage()
    {
        $imagePath = $this->image ?? 'avatars/default.png';

        return "/storage/" . $imagePath;
    }

    /**Followers Relationship */
    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}
