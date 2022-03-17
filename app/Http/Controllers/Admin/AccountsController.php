<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Accounts;
use App\Users;
use App\Customer;
use Illuminate\Support\Str;
use App\Http\Requests\RequestcreateAccount_admin;
use App\Http\Requests\RequesteditAccount_admin;
use Hash;
class AccountsController extends Controller
{
   public function getIndex()
   {

        $number_order=0;
   		$list_all_accounts = Accounts::all();
   		return view('admin.accounts.index',compact('number_order','list_all_accounts'));
   }
   public function getCreate()
   {
   		return view('admin.accounts.create'); 
   }
   public function postCreate(RequestcreateAccount_admin $req)
   {
   	 
        //start insert users
        $user=new users;
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->phone=$req->phone;
        if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('admin/customers/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/customer".$photo)) {
               $photo=str::random(4)."_".$name;
            }
            $file->move("./public/img/admin/customer",$photo);
            $user->image=$photo;

        }
        else
        {
             $user->image='';
        }
        $user->email=$req->email;
        $user->address=$req->address;
        $user->save();
        //end insert users

        $accounts=new accounts;
        $accounts->id_user=$user->id;
        $accounts->username=$req->username;
        $accounts->password=Hash::make($req->password);
        $accounts->right=$req->right;
        $accounts->status=1;
        $accounts->save();
        return redirect('admin/accounts/index')->with('notification','Đã tạo tài khoản mới');
   }
   public function getEdit($id)
   {

   		$accounts=accounts::Find($id);
   		return view("admin.accounts.edit",compact('accounts'));
   }
   public function postEdit(RequesteditAccount_admin $req,$id)
   {
   	 
   
        $accounts=accounts::Find($id);
        $accounts->id_user=$accounts->id_user;
        $accounts->username=$req->username;
        $accounts->right=$req->right;
        $accounts->status=1;
        if($req->password=="")
        {
            $accounts->password=$accounts->password;
        }
        else
        {
            $accounts->password=Hash::make($req->password);
        }
        $accounts->save();
        //start insert users
        $user=users::Find($accounts->id_user);
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->phone=$req->phone;
        if($accounts->right==0)
        {
            if($req->hasFile('image'))
            {
                $file =$req->file('image');
                $footer=$file->getClientOriginalExtension();
                if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
                {
                    return redirect('admin/accounts/edit',$accounts->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
                }
                $name=$file->getClientOriginalName();
                $photo=str::random(4)."_".$name;
                while (file_exists("./public/img/admin/customer".$photo)) {
                   $photo=str::random(4)."_".$name;
                }
                 $image_path =public_path('public/img/admin/customer/'. $user->image);
                if($user->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $file->move("./public/img/admin/customer",$photo);
                $user->image=$photo;

            }
            else
            {
                 $user->image=$user->image;
            }
        }
        else
        {
            if($req->hasFile('image'))
            {
                $file =$req->file('image');
                $footer=$file->getClientOriginalExtension();
                if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
                {
                    return redirect('admin/accounts/edit',$accounts->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
                }
                $name=$file->getClientOriginalName();
                $photo=str::random(4)."_".$name;
                while (file_exists("./public/img/admin/accounts".$photo)) {
                   $photo=str::random(4)."_".$name;
                }
                 $image_path =public_path('img/admin/accounts/'. $user->image);
                if($user->image!="")
                {
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $file->move("./public/img/admin/accounts",$photo);
                $user->image=$photo;

            }
            else
            {
                 $user->image=$user->image;
            }
        }


        $user->address=$req->address;
        $user->email=$req->email;
        $user->save();
        //end insert users

        return redirect('admin/accounts/index')->with('notification','Đã cập nhật tài khoản');
   
   }
   public function getDelete($id)
    {
        // start delete account
        $accounts=accounts::Find($id);
         $accounts->delete();
        return redirect('admin/accounts/index')->with("notification","Đã xóa  khách hàng  thành công");
    
    }
        public function getStatusPost($id)
    {
        $accounts=accounts::Find($id);
        $accounts->status=1-$accounts->status;
        $accounts->save();
        return redirect('admin/accounts/index');
    }
    
}
