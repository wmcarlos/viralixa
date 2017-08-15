<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $table = 'shortlinks';

    protected $fillable = ['post_id','shortlink'];

    public function post(){
    	return $this->belogsTo('App\Post');
    }
}
