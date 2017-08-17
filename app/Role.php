<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name','isactive'];

    public function services(){
    	return $this->belongsToMany('App\Service')->withPivot('role_id')->withTimestamps();
    }

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
