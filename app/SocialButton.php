<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialButton extends Model
{
    protected $table = 'socialbuttons';

    protected $fillable = ['user_id','socialsite_id','profile','position'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function socialsites(){
    	return $this->belongsToMany('App\SocialSite');
    }
}
