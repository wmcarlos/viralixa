<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name','isactive'];

    public function services(){
    	return $this->belongsToMany('App\Service')->withTimetamps();
    }
}
