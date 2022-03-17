<?php

namespace App\Http\Controllers\Staff;

use App\products;
use App\customer;
use App\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	
	public function getIndex()
	{
		 $list_all_products=products::all();
         $list_all_customer=customer::all();
         $list_all_posts=Posts::all();
            $list_three_newproduct=products::take(3)->latest()->get();
	  return view('staff.home.index',compact('list_all_products','list_all_customer','list_all_posts','list_three_newproduct'));
	}
  

}
