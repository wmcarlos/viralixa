<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'Posts';

    protected $fillable = ['user_id','title','subtitle','description','tags','url','corver','views'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function shortlinks(){
    	return $this->belongsToMany('App/ShortLink');
    }

    public function clicks(){
    	return $this->belongsToMany('App/Click');
    }
}
