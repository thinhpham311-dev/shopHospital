<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ="products";
   
    public function type_product(){
    	return $this->belongsTo('App\type_product','id_type','id');
    }
    public function color_product(){
        return $this->belongsTo('App\color_product','id_color','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\bill_detail','id_product','id');
    }
    public function image_product(){
    	return $this->hasMany('App\image_product','id_product','id');
    }
    public function comment(){
        return $this->hasMany('App\comment','id_product','id');
    }
    public function provider(){
        return $this->belongsTo('App\Provider','id_provider','id');
    }
    public function evaluate_product(){
        return $this->hasMany('App\evaluate_product','id_product','id');
    }

    
}
