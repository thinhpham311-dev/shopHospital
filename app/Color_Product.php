<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color_Product extends Model
{
    protected $table ="color_product";
    public function products()
    {
    	return $this->hasMany('App\products','id_color','id');
    } 
}
