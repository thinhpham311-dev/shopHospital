<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_Comment extends Model
{
    protected $table ="answer_comment";
    public function comment()
    {
    	return $this->belongsto('App\comment','id_comment','id');
    }
	 public function accounts()
    {
    	return $this->belongsto('App\accounts','id_account','id');
    }
}
