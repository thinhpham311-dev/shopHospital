<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Products;
use App\Slider;
use App\Evaluate_Product;
use App\Taxonomy;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Str;
class HomeController extends Controller
{
	
	public function getIndex()
	{
         
        $list_all_taxonomy = Taxonomy::all();
	    $list_all_slider = Slider::all();
        $list_all_newProduct_status_1 = Products::where('status',1)->get();
        $list_all_promotionprice=Products::where('products.promotion_price','<>',0)
        ->select(DB::Raw('products.id,products.name,products.image,products.unit_price,products.promotion_price,(select avg(Evaluate) from evaluate_product  where id_product=products.id) as sodiem,products.inventory_number'))->get();
        $list_four_promotionproduct=Products::where('products.promotion_price','<>',0)
        ->select(DB::Raw('products.id,products.name,products.image,products.unit_price,products.promotion_price,(select avg(Evaluate) from evaluate_product  where id_product=products.id) as sodiem,products.inventory_number'))->paginate(4, ['*'], 'page'); 
        $list_all_newProduct = Products::take(12)->select(DB::Raw('products.id,products.name,products.image,products.unit_price,products.promotion_price,(select avg(Evaluate) from evaluate_product  where id_product=products.id) as sodiem,products.inventory_number,products.status'))->orderBy('created_at','desc')->latest()->get(); 
        $list_all_newProducts = Products::select(DB::Raw('products.id,products.name,products.image,products.unit_price,products.promotion_price,(select avg(Evaluate) from evaluate_product  where id_product=products.id) as sodiem,products.inventory_number,products.status'))->orderBy('created_at','desc')->paginate(4, ['*'], 'pages');
        $list_product=Products::join('bill_detail', 'products.id', '=', 'bill_detail.id_product')
                                ->select('products.id','products.name','products.image','products.unit_price','products.promotion_price','products.inventory_number',DB::raw("SUM(bill_detail.quantity) as 'product_quantity' "))
                                ->groupby('bill_detail.id_product')
                                ->groupby('products.id')
                                ->groupby('products.name')
                            	->groupby('products.image')
                            	->groupby('products.unit_price')
                                ->groupby('products.promotion_price')
                                ->groupby('products.inventory_number')
                               
                                ->orderby('bill_detail.quantity','desc')
                                ->take(4)->get();

         $sanpham=DB::table('products')
                    ->select('*','products.id',DB::raw("DATEDIFF(CURDATE(),products.date_start) as ngay"))
                    ->orderBy('date_start','desc')
                    ->get();
        foreach ($sanpham as $value) {
            if($value->ngay < '10')
            {
                $sanpham = Products::where('id','=',$value->id)->update(['status'=> 1]);
            }
            elseif($value->ngay > '10')
            {
                $sanpham = Products::where('id','=',$value->id)->update(['status'=> 0]);
            }
        }
        return view('client.page.index', compact('list_all_newProduct_status_1','list_all_newProduct','list_all_newProducts','list_all_taxonomy','list_all_slider','list_all_promotionprice','list_four_promotionproduct','list_product'));   
    }
}
