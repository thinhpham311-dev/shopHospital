<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Image_Product;
use Illuminate\Support\Str;
class Image_ProductController extends Controller
{
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [

            'image'=>'required',

        ],[
            'image.required'=>'Vui lòng chọn hình ảnh'

        ]);
        $image_product=new Image_Product;
        $image_product->id_product=$req->id_product;
		if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/products/detail/'.$req->id_product)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/image_products/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/image_products/",$photo);
            $image_product->image=$photo;

        }
        else
        {
             $image_product->image="";
        }
        $image_product->save();
    	return redirect('admin/products/detail/'.$image_product->id_product)->with('notification','Đã thêm ảnh cho sản phẩm');
    }

    public function getDelete($id)
    {
         $image_product=Image_Product::Find($id);
          $image_path =public_path('img/admin/image_products/'. $image_product->image);
            if($image_product->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
		 $image_product->delete();
		 return redirect('admin/products/detail/'.$image_product->id_product)->with('notification','Đã xóa ảnh');
    }
}
