<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password','phone','role_id','country_id','avatar','activecode'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    public function template(){
        return $this->belongsTo('App\Template');
    }

    public function purchases(){
        return $this->belongsToMany('App\Purchase');
    }

    public function socialbuttons(){
        return $this->belongsToMany('App\SocialButton');
    }
}
