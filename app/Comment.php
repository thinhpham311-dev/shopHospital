<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table ="comment";
    public function products()
    {
    	return $this->belongsto('App\products','id_product','id');
    }
     public function accounts()
    {
    	return $this->belongsto('App\accounts','id_account','id');
    } 
}
