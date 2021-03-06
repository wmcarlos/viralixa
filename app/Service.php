<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['name','url','position','icon','isactive'];

    public function roles(){
    	return $this->belongsToMany('App\Role','roles_services')->withPivot('service_id')->withTimestamps();
    }
}
