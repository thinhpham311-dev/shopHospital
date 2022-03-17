<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Product extends Model
{
   protected $table ="type_product";
    public function products()
    {
    	return $this->hasMany('App\products','id_type','id');
    } 
	 public function category(){
    	return $this->belongsTo('App\category','id_category','id');
    }
}
