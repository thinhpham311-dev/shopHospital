<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
   protected $table ="bill";
    public function bill_detail()
    {
    	return $this->hasMany('App\bill_detail','id_bill','id');
    } 
    public function customer()
    {
    	return $this->belongsto('App\customer','id_customer','id');
    } 
}
