<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name','phone_code','flag_icon','isactive'];

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
