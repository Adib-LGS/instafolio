<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    * Defaut Image creation Profile User https public bucket
    */
    public function getImage()
    {   
        $imagePath = $this->image ?? 'avatars/default.png';

        return '/storage/' . $imagePath;
        
        
    }

    /**Followers Relationship */
    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}
