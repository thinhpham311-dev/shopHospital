<?php

namespace App\Http\Controllers\Admin;
use App\Type_Product;
use App\products;
use App\Color_Product;
use App\Image_Product;
use App\Category;
use App\Provider;
use App\Bill_Detail;
use App\Evaluate_Product;
use App\Http\Requests\RequestcreateProduct_admin;
use App\Http\Requests\RequesteditProduct_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function getIndex()
    {
         $number_order=0;
         $list_all_product = Products::all();
    	$list_all_products=Products::orderby('id','desc')->paginate(4);
    	return view('admin.products.index',compact('number_order','list_all_product','list_all_products'));
    }
    public function getCreate()
    {
        $list_all_provider = Provider::all();
        $list_all_colorproduct = Color_Product::all();
    	$list_typeproduct_name = Type_Product::all();
         $list_all_category = Category::all();
       
    	return view('admin.products.create',compact('list_all_provider','list_typeproduct_name','list_all_colorproduct','list_all_category'));
    }
    public function postCreate(RequestcreateProduct_admin $req)
    {
       
        $product=new products;
        $product->name=$req->name;
        $product->id_type=$req->id_type;
        $product->id_provider=$req->id_provider;
        $product->id_color=$req->id_color_product;
        $product->unit_price=$req->unit_price;
        if($product->promotion_price==null)
        {
             $product->promotion_price=0;
        }else{
             $product->promotion_price=$req->promotion_price;
        }
       
         if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/products/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/product/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/product/",$photo);
            $product->image=$photo;

        }
        else
        {
             $product->image='';
        }
        $product->inventory_number=$req->inventory_number;
        $product->status=1;
        $product->VAT=1;
        $product->describe=$req->describe;
       $product->Guarantee=$req->Guarantee;
       $product->Origin=$req->Origin;
       $product->Trademark=$req->Trademark;

        $product->date_start=$req->date_start;
      
        $product->save();
        return redirect('admin/products/index')->with('notification','Tạo sản phẩm thành công');
    }
     public function getEdit($id)
    {
         $product=Products::Find($id);
        $list_all_provider = Provider::all();
         $list_all_colorproduct = Color_Product::all();
         $list_all_category = Category::all();
        $list_typeproduct_name = Type_Product::all();
        return view('admin.products.edit',compact('product','list_all_provider','list_all_category','list_all_colorproduct','list_typeproduct_name'));
    }
     public function postEdit(RequesteditProduct_admin $req,$id)
    {
        
        $product=Products::Find($id);
        $product->name=$req->name;
        $product->id_type=$req->id_type;
        $product->id_provider=$req->id_provider;
        $product->id_color=$req->id_color_product;
        $product->unit_price=$req->unit_price;
        if($product->promotion_price==null)
        {
             $product->promotion_price=0;
        }else{
             $product->promotion_price=$req->promotion_price;
        }
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/products/edit/'.$product->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/product/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/product/'. $product->image);
            if($product->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/product/",$photo);
            $product->image=$photo;

        }
        else
        {
             $product->image= $product->image;

        }
        $product->inventory_number=$req->inventory_number;
        $product->status=1;
        $product->VAT=1;
        $product->describe=$req->describe;
        $product->tech_product=$req->tech_product;
        $product->date_start=$req->date_start;
        $product->Guarantee=$req->Guarantee;
       $product->Origin=$req->Origin;
       $product->Trademark=$req->Trademark;
        $product->save();
        return redirect('admin/products/index')->with('notification','Đã cập nhật sản phẩm thành công');
    }
    public function getDelete($id)
    {
         $product=Products::Find($id);
        $bill_all_detail=Bill_Detail::where('id_product',$product->id)->get();
        if(count($bill_all_detail)==0)
        {
            //start delete color_product
            $list_all_image_product= image_product::where('id_product',$product->id)->get();
            if(count($list_all_image_product)>0)
            {
                foreach ($list_all_image_product as $list)
                {
                   if($product->id==$list->id_product)
                   {

                      $image_product=image_product::Find($list->id);
                      $image_product->delete();
                   }
                }
            }
            //end delete color_product
            //start delete product
            $image_path =public_path('admin/img/product/'. $product->image);
            if($product->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }

            $product->delete();
            return redirect('admin/products/index')->with('notification','Đã xóa 1 sản phẩm thành công');
            //end delete product
            }
        else
        {
            return redirect('admin/products/index')->with('notification','Sản phẩm không thể xóa do đã có khách mua hàng');
        }

    }
     public function getStatusVAT($id)
    {
        $product=Products::Find($id);
        $product->VAT=1-$product->VAT;
        $product->save();
        return redirect('admin/products/index');
    }
     public function getSearch(Request $req)
    {
        $number_order=0;
        $list_all_product=Products::where('name','like','%'.$req->txt_keyword.'%')->get();
        $list_all_products=Products::where('name','like','%'.$req->txt_keyword.'%')->orderby('id','desc')->paginate(6);
        return view('admin.products.index',compact('list_all_product','list_all_products','number_order'));
    }
     public function getDetails($id)
    {
        $product=Products::Find($id);
        $reviews_product=Evaluate_Product::where('id_product',$id)->avg('Evaluate');
        $list_all_imageproduct=Image_Product::where('id_product',$product->id)->get();
        return view('admin.products.Details',compact('product','list_all_imageproduct','reviews_product'));
    }
}
