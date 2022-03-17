<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluate_Product extends Model
{
    protected $table ="evaluate_product";
 
    public function accounts()
    {
    	return $this->belongsto('App\Accounts','id_account','id');
    }
     public function products()
    {
    	return $this->belongsto('App\Products','id_product','id');
    }
}
