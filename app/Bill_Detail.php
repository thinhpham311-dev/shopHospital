<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
     protected $table ="bill_detail";
    public function products()
    {
    	return $this->belongsTo('App\products','id_product','id');
    }
    public function bill()
    {
    	return $this->belongsTo('App\bill','id_bill','id');
    }
}
