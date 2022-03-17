<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_post extends Model
{
    protected $table ="comment_post";
    public function posts()
    {
    	return $this->belongsto('App\posts','id_post','id');
    }
     public function accounts()
    {
    	return $this->belongsto('App\accounts','id_account','id');
    } 
}
