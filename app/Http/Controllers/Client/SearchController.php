<?php

namespace App\Http\Controllers\Client;

use App\Products;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
     public function getIndex(Request $req)
    {
		$list_all_product=Products::select(DB::Raw('products.id,products.name,products.image,products.unit_price,products.promotion_price,(select avg(Evaluate) from evaluate_product  where id_product=products.id) as sodiem,products.inventory_number'))->Where('name','like','%'.$req->keyword.'%')->paginate(8);
        return view('client.product.list_all_product_search',compact('list_all_product'));
    }
}
