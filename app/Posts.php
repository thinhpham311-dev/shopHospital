<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
   protected $table ="posts";

    public function taxonomy()
    {
    	return $this->belongsto('App\Taxonomy','id_taxonomy','id');
    }
	public function account()
    {
    	return $this->belongsto('App\Accounts','id_account','id');
    }
     public function comment_post()
    {
    	return $this->hasMany('App\Comment_post','id_post','id');
    } 
}
