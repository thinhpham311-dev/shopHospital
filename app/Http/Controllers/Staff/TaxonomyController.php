<?php

namespace App\Http\Controllers\Staff;

use App\Taxonomy;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    public function getIndex()
    {
    	$number_order=0;
        $list_all_taxonomy = Taxonomy::all();
        $list_all_taxonomys= Taxonomy::orderby('id','desc')->paginate(4);
    	return view('staff.taxonomy.index',compact('number_order','list_all_taxonomy','list_all_taxonomys'));
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
        $taxonomy->save();
    	return redirect('manage/taxonomys/index')->with('notification','Đã thêm thể loại mới');
    }
      public function getEdit($id)
    {
        $number_order=0;
         $list_all_taxonomy = Taxonomy::all();
        $list_all_taxonomys= Taxonomy::orderby('id','desc')->paginate(4);
        $taxonomy=Taxonomy::Find($id);
    	return view('staff.taxonomy.edit',compact('taxonomy','list_all_taxonomys','list_all_taxonomy','number_order'));
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
        $taxonomy->save();
    	return redirect('manage/taxonomys/index')->with('notification','Đã cập nhật thể loại');
    }
      public function getDelete($id)
    {
        $taxonomy=Taxonomy::Find($id);
        $taxonomy->delete();
       return redirect('manage/taxonomys/index')->with('notification','Đã xóa thể loại');


    }
}
