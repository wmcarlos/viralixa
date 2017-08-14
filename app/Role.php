<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name','isactive'];

    public function services(){
    	return $this->belongsToMany('App\Service','roles_services')->withPivot('role_id')->withTimestamps();
    }

    public function user(){
    	return $this->belongsTo('App/User');
    }
}
