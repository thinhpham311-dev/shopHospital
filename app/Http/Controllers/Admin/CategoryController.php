<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use Illuminate\Support\Str;
use App\Http\Requests\RequestcreateCategory_admin;
use App\Http\Requests\RequesteditCategory_admin;
class CategoryController extends Controller
{
    public function getIndex()
    {
    	$number_order = 0;
    	$list_all_category = Category::all();
    	 $list_all_categorys= Category::orderby('id','desc')->paginate(4);
    	return view('admin.category.index',compact('number_order','list_all_category','list_all_categorys'));
    }
    public function getCreate()
    {
    	return view('admin.category.create');
    }
    public function postCreate(RequestcreateCategory_admin $req)
    {
        
        $category=new Category;
        $category->name=$req->name;
        $category->description=$req->description;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/categorys/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/category/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/category/",$photo);
            $category->image=$photo;

        }
        else
        {
             $category->image='';
        }

        if($req->hasFile('image_banner'))
        {
            $file =$req->file('image_banner');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/categorys/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/category_banner/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/category_banner/",$photo);
            $category->image_banner=$photo;

        }
        else
        {
             $category->image_banner='';
        }
        $category->save();
        return redirect('admin/categorys/index')->with('notification','Tạo danh mục sản phẩm thành công');
    }
    public function getEdit($id)
    {
    	$category = category::find($id);
    	return view('admin.category.edit',compact('category'));
    }
     public function postEdit(RequesteditCategory_admin $req,$id)
    {
      
        $category=category::Find($id);
        $category->name=$req->name;
        $category->description=$req->description;
         if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/categorys/edit/'.$category->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/category/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/category/'. $category->image);
            if($category->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/category",$photo);
            $category->image=$photo;

        }
        else
        {
             $category->image= $category->image;
        }
         if($req->hasFile('image_banner'))
        {
            $file =$req->file('image_banner');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/categorys/edit/'.$category->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/category_banner/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/category_banner/'. $category->image_banner);
            if($category->image_banner!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/category_banner",$photo);
            $category->image_banner=$photo;

        }
        else
        {
             $category->image_banner= $category->image_banner;
        }
        $category->save();
        return redirect('admin/categorys/index')->with('notification','Cập nhật danh mục sản phẩm thành công');
    }
     public function getDelete($id)
    {
        $category=category::Find($id);
        $category->delete();
        return redirect('admin/categorys/index')->with('notification','Đã xóa danh mục sản phẩm thành công');

    
    }

}
