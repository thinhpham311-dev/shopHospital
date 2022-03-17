<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table ="accounts";
    public function users()
    {
        return $this->belongsTo('App\users','id_user','id');
    }
    public function comment()
    {
        return $this->belongsTo('App\comment','id_account','id');
    }
    public function evaluate_product(){
        return $this->hasMany('App\Accounts','id_account','id');
    }
}
