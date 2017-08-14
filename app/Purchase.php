<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = ['license_id','user_id','payment_number','license_key','from','to'];

    public function licenses(){
    	return $this->belongsToMany('App/License');
    }

    public function users(){
    	return $this->belongsToMany('App/User');
    }
}
