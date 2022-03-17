<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table ="users";
    public function account()
    {
    	return $this->hasMany('App\account','id_user','id');
    } 
    public function customer()
    {
    	return $this->hasMany('App\customer','id_user','id');
    } 
      public function staff()
    {
    	return $this->hasMany('App\staff','id_user','id');
    } 
}
