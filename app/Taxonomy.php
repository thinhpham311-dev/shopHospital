<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
   protected $table ="taxonomy";
    public function posts()
    {
    	return $this->hasMany('App\Posts','id_taxonomy','id');
    } 
    
}
