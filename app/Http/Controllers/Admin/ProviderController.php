<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getIndex()
    {
    	$number_order = 0;
    	$list_all_Provider = Provider::all();
    	$list_all_Providers = Provider::orderby('id','desc')->paginate(4);
    	return view('admin.provider.index',compact('number_order','list_all_Provider','list_all_Providers'));
    }
    public function getCreate()
    {
    	return view('admin.provider.create');
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required',


        ],[
            'name.required'=>'Nhà cung cấp không được bỏ trống.',


        ]);
        $provider=new Provider;
        $provider->name=$req->name;
        $provider->phone=$req->phone;
		$provider->address=$req->address;
        $provider->save();
    	return redirect('admin/providers/index')->with('notification','Đã tạo nhà cung cấp mới');
    }
    public function getEdit($id)
    {
        $provider=Provider::Find($id);
        return view('admin/provider/edit',compact('provider'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'name'=>'required',


        ],[
            'name.required'=>'Nhà cung cấp không được bỏ trống.',


        ]);
        $provider=Provider::Find($id);
        $provider->name=$req->name;
        $provider->phone=$req->phone;
        $provider->address=$req->address;
        $provider->save();
        return redirect('admin/providers/index')->with('notification','Đã cập nhật nhà cung cấp '.$req->name);
    }
    public function getDelete($id)
    {
        $provider = provider::find($id);
        $provider->delete();
        return redirect('admin/providers/index')->with('notification','Xóa nhà cung cấp thành công');
    }
}
