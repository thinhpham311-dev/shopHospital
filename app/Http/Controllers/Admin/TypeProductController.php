<?php

namespace App\Http\Controllers\Admin;

use App\Type_Product;
use App\Category;
use Illuminate\Support\Str;
use App\Http\Requests\RequestcreateTypeProduct_admin;
use App\Http\Requests\RequesteditTypeProduct_admin;


class TypeProductController extends Controller
{
    public function getIndex()
    {
        $number_order=0;
        $list_all_typeproduct = Type_Product::all();
        $list_all_typeproducts= Type_Product::orderby('id','desc')->paginate(4);
    	return view('admin.type_product.index',compact('number_order','list_all_typeproduct','list_all_typeproducts'));
    }
     public function getCreate()
    {
        $list_name_category = Category::all();
    	$list_name_type = Type_Product::all();
    	return view('admin.type_product.create', compact('list_name_category','list_name_type'));
    }
    public function postCreate(RequestcreateTypeProduct_admin $req)
    {
      
        $typeproduct=new Type_Product;
        $typeproduct->name=$req->name;
        $typeproduct->id_category=$req->id_category;
        $typeproduct->description=$req->description;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/type_products/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/typeproduct/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/typeproduct/",$photo);
            $typeproduct->image=$photo;

        }
        else
        {
             $typeproduct->image='';
        }
    
       
        $typeproduct->save();
        return redirect('admin/type_products/index')->with('notification','Tạo loại sản phẩm thành công');
    }
    public function getEdit($id)
    {
         $list_name_category = Category::all();
         $typeproduct=Type_Product::Find($id);
        return view('admin.type_product.edit',compact('list_name_category','typeproduct'));
    }
    public function postEdit(RequesteditTypeProduct_admin $req,$id)
    {
     
        $typeproduct=Type_Product::Find($id);
        $typeproduct->name=$req->name;
        $typeproduct->id_category=$req->id_type;
        $typeproduct->description=$req->description;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/type_products/edit/'.$typeproduct->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/typeproduct/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/typeproduct/'. $typeproduct->image);
            if($typeproduct->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/typeproduct/",$photo);
            $typeproduct->image=$photo;

        }
        else
        {
             $typeproduct->image= $typeproduct->image;
        }

        $typeproduct->save();
        return redirect('admin/type_products/index')->with('notification','Cập nhật loại sản phẩm thành công');
    }
    public function getDelete($id)
    {
        $list_all_product=Products::where('id_type',$id)->get();
        if(count($list_all_product)==0)
        {
            $typeproduct=type_product::Find($id);
             $image_path =public_path('img/admin/type_product/'. $typeproduct->image);
            if($typeproduct->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
            $typeproduct->delete();
            return redirect('admin/type_products/index')->with('notification','Đã xóa '.$typeproduct->name.' loại sản phẩm thành công');
        }
        else
        {
            return redirect('admin/type_products/index')->with('notification','Không thế xóa loại sản phẩm do loại sản phẩm đã được sử dụng');
        }

    
    }
      public function getSearch(Request $req)
    {
        $number_order=0;
        $list_all_typeproduct=Type_Product::where('name','like','%'.$req->txt_keyword.'%')->get();
        $list_all_typeproducts=Type_Product::where('name','like','%'.$req->txt_keyword.'%')->orderby('id','desc')->paginate(6);

        return view('admin.type_product.index',compact('list_all_typeproduct','list_all_typeproducts','number_order'));
    }
}
