<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';

    protected $fillable = ['name','description','price'];

    public function purchases(){
    	return $this->belongsToMany('App/Purchase');
    }
}
