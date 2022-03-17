<?php

namespace App\Http\Controllers\Admin;


use App\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaxonomyController extends Controller
{
    public function getIndex()
    {
    	 $number_order=0;
        $list_all_taxonomy = Taxonomy::all();
        $list_all_taxonomys= Taxonomy::orderby('id','desc')->paginate(4);
    	return view('admin.Taxonomy.index', compact('number_order','list_all_taxonomy','list_all_taxonomys'));
    }
    public function postCreate(Request $req)
    {
    	$this->validate($req,
        [
            'name'=>'required',

        ],[
            'name.required'=>'Vui lòng nhập tên thể loại',

        ]);
        $taxonomy=new Taxonomy;
        $taxonomy->name=$req->name;
          if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/taxonomys/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/taxonomy/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/taxonomy/",$photo);
            $taxonomy->image=$photo;

        }
        else
        {
             $taxonomy->image='';
        }
        $taxonomy->save();
    	return redirect('admin/taxonomys/index')->with('notification','Đã thêm thể loại mới');
    }
     public function getEdit($id)
    {
        $number_order=0;
         $list_all_taxonomy = Taxonomy::all();
        $list_all_taxonomys= Taxonomy::orderby('id','desc')->paginate(4);
        $taxonomy=Taxonomy::Find($id);
    	return view('admin.taxonomy.edit',compact('taxonomy','list_all_taxonomys','list_all_taxonomy','number_order'));
    }
     public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'name'=>'required',

        ],[
            'name.required'=>'Vui lòng nhập tên thể loại',

        ]);
        $taxonomy=Taxonomy::Find($id);
        $taxonomy->name=$req->name;
         if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/products/edit/'.$taxonomy->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=Str::random(4)."_".$name;
            while (file_exists("./public/img/admin/taxonomy/".$photo)) {
               $photo=Str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/taxonomy/'. $taxonomy->image);
            if($taxonomy->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/taxonomy/",$photo);
            $taxonomy->image=$photo;

        }
        else
        {
             $taxonomy->image= $taxonomy->image;

        }
        $taxonomy->save();
    	return redirect('admin/taxonomys/index')->with('notification','Đã cập nhật thể loại');
    }
    public function getDelete($id)
    {
        $taxonomy=Taxonomy::Find($id);
        $taxonomy->delete();
       return redirect('admin/taxonomys/index')->with('notification','Đã xóa thể loại');


    }
}
