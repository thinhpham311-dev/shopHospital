<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SliderController extends Controller
{
    public function getIndex()
    {
    	$number_order = 0;
    	$list_all_slider = Slider::all();
    	$list_all_sliders = Slider::orderby('id','desc')->paginate(4);
    	return view('admin.slider.index',compact('number_order','list_all_slider','list_all_sliders'));
    }
    public function getCreate()
    {
    	return view('admin.slider.create');
    }
     public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required',

        ],[
            'name.required'=>'Tên slide không được bỏ trống.'
        ]);
        $slide=new Slider;
        $slide->name=$req->name;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/sliders/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/slides/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
            $file->move("./public/img/admin/slides/",$photo);
            $slide->image=$photo;

        }
        else
        {
             $slide->image="";
        }
        $slide->description=$req->description;
        $slide->save();
        return redirect('admin/sliders/index')->with('notification','Đã tạo slide mới');

    }
    public function getEdit($id)
    {
    	$slide = Slider::find($id);
    	return view('admin.slider.edit', compact('slide'));
    }
     public function postEdit(Request $req,$id)
    {
        $this->validate($req,
        [
            'name'=>'required',

        ],[
            'name.required'=>'Tên slide không được bỏ trống.'
        ]);
        $slide=Slider::Find($id);
        $slide->name=$req->name;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/sliders/edit/'.$id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/slides/".$photo)) {
               $photo=str_random(4)."_".$name;
            }
             $image_path =public_path('img/admin/slides/'.$slide->image);
            if($slide->image!="")
            {
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $file->move("./public/img/admin/slides/",$photo);
            $slide->image=$photo;

        }
        else
        {
             $slide->image=$slide->image;
        }
         $slide->description=$req->description;
        $slide->save();
        return redirect('admin/sliders/index')->with('notification','Đã cập nhật thành công');

    }
      public function getDelete($id)
        {
              $slide=Slider::Find($id);
              $image_path =public_path('img/admin/slides/'.$slide->image);
                if($slide->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $slide->delete();
            return redirect('admin/sliders/index')->with('notification','Đã xóa thành công');
        }
}
