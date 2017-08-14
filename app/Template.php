<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'templates';

    protected $fillable = ['user_id','title','description','brand','show','banner','url','social_box'];

    public function user(){
    	return $this->belongsTo('App/User');
    }
}
