<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table ="category";
    public function type_product()
    {
    	return $this->hasMany('App\type_product','id_category','id');
    } 
   
}
