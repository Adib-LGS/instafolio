<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create defaut Pofile for New User
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function($user){
            
            $user->profile()->create([
                'title' => 'Hey welcome ' . $user->username
            ]);
        });
    }


    /**
     * Return the right user by username request
     * */
    public function getRouteKeyName()
    {
        return 'username';
    }
    
    /**Each Users hase One Profile */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**User Can have Many Post */
    public function posts()
    {
        return $this->hasMany('App\Post')->latest();
    }

    /**Following relationship */
    public function following()
    {
        return $this->belongsToMany('App\Profile');
    }
}
