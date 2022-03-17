<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_product extends Model
{
    protected $table ="image_product";
   	public function products()
    {
    	return $this->belongsTo('App\products','id_product','id');
    } 
}
