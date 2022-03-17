<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\products;
use App\customer;
use App\posts;

class HomeController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function index()
    {
        return view('home');
    }*/
	public function getIndex()
	{
         $list_all_products=products::all();
         $list_all_customer=customer::all();
         $list_all_posts=Posts::all();
        $list_three_newproduct=products::take(3)->latest()->get();
    	return view('admin.home.index',compact('list_all_products','list_all_customer','list_all_posts','list_three_newproduct'));
	}
}
