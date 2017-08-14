<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $table = 'clicks';

    protected $fillable = ['post_id','ip','country','city','lat','lon','browser','os'];

    public function posts(){
    	return $this->belongsToMany('App\Post');
    }
}
