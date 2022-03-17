<?php

namespace App\Http\Controllers\Client;

use App\Slider;
use App\Category;
use App\Type_Product;
use App\Products;
use App\Taxonomy;
use App\Posts;
use Illuminate\Http\Request;
use DB;

class TypeproductController extends Controller
{
    public function getList_Category($id)
    {
    	
        $list_all_posts=Posts::all();
        $firstimage=array();
        foreach ($list_all_posts as $value)
        {
            $firstimage[$value->id]=$this->getFirstImage($value->post_content);
        }


        $list_all_Category = Category::find($id);
        $listcontact=DB::table('type_product')
                ->join('products', 'products.id_type', '=', 'type_product.id')
                ->select(DB::raw("type_product.id,type_product.name,type_product.image,sum(products.promotion_price) as promotion_price,sum(products.unit_price) as unit_price,0 as loai,type_product.id as id_type,0 as inventory_number,count(products.id) as sosanpham"))->where('type_product.id_category',$id)->where('products.inventory_number','>',0)
                ->groupBy('type_product.id')
                ->groupBy('type_product.name')
                ->groupBy('type_product.image')
                ->groupBy('type_product.id');

        $list_replycontact = DB::table('products')
                ->join('type_product', 'products.id_type', '=', 'type_product.id')
                ->select(DB::raw("products.id,products.name,products.image,products.promotion_price as promotion_price,products.unit_price as unit_price,1 as loai,products.id_type as id_type,products.inventory_number  as inventory_number ,1 as sosanpham" ))->where('type_product.id_category',$id)->where('products.inventory_number','>',0)
                ->union($listcontact)
                ->orderBy('id_type')
                ->orderBy('loai')
                ->get();

       

        
        /*$list_product=DB::table('products')
                        ->join('type_product', 'products.id_type', '=', 'type_product.id')
                        ->join('category', 'type_product.id_category', '=', 'category.id')
                        ->where('type_product.id_category',$id)->panigate(10);*/
               
    	
        $list_all_Taxonomy=Taxonomy::all();
       
     
        return view('client.page.type_product',compact('list_all_Category','list_all_Taxonomy','list_replycontact','list_all_posts','firstimage'));
    }
    public function getFirstImage($strContent)
    {
        $first_img = "";
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strContent, $matches);
        if(empty($output))
            return asset("public/img/noimage.png");
        else
            return $matches[1][0];
    }

}
