<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table ="customer";
    public function bill()
    {
    	return $this->hasMany('App\bill','id_customer','id');
    } 
    public function users()
    {
    	return $this->belongsto('App\users','id_user','id');
    }
}
