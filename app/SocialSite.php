<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialSite extends Model
{
    protected $table = 'socialsites';

    protected $fillable = ['name','url','icon'];

    public function socialbuttons(){
    	return $this->belognsToMany('App\SocialButton');
    }
}
