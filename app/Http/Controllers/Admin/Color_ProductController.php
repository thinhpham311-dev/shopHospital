<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Color_Product;
use Illuminate\Support\Str;
class Color_ProductController extends Controller
{
    public function getIndex()
    {
         $number_order=0;
        $list_all_colorproduct = Color_Product::all();
    	return view('admin.color_product.index',compact('number_order','list_all_colorproduct'));
    }
    public function getCreate()
    {
    	return view('admin.color_product.create');
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required',
            
            
        ],[
            'name.required'=>' không được bỏ trống.',
           
            
        ]);
        $color_product=new Color_Product;
        $color_product->name=$req->name;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/color_products/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/colorproduct/".$photo)) 
            {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/colorproduct/",$photo);
            $color_product->image=$photo;

        }
        else
        {
             $color_product->image='';
        }
    
        $color_product->save();
    	return redirect('admin/color_products/index')->with('notification','Đã thêm màu vào sản phẩm thành công');
    }
    public function getEdit($id)
    {
        $color_product=Color_Product::Find($id);
    	return view('admin.color_product.edit',compact('color_product'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'name'=>'required',  
        ],[
            'name.required'=>'Màu sản phẩm không được bỏ trống.',
        ]);
        $color_product=Color_Product::Find($id);
        $color_product->name=$req->name;
         if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/type_products/edit/'.$color_product->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/colorproduct/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/colorproduct/'. $color_product->image);
            if($color_product->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/colorproduct/",$photo);
            $color_product->image=$photo;

        }
        else
        {
             $color_product->image= $color_product->image;
        }

        $color_product->save();
        return redirect('admin/color_products/index')->with('notification','Đã cập nhật lại màu của sản phẩm');
    }
    public function getDelete($id)
    {
        $color_product=Color_Product::Find($id);
        $color_product->delete();
        return redirect('admin/color_products/index')->with('notification','Đã xóa màu của sản phẩm');
    }
}
