<?php

namespace App\Http\Controllers\Admin;

use Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\accounts;
use App\users;
use Hash;


class ProfileController extends Controller
{
    public function getInfo_Account()
    {
         if(Auth::guard('account')->check())
        {
            $account=accounts::Find(Auth::user()->id);
      }
        return view('admin.profile.info_account', compact('account'));
    }
    public function getUpdate_Account($id)
    {
        $account=accounts::Find($id);
        return view('admin.profile.upload_account',compact('account'));
    }
    public function postUpdate_Account($id,Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required',

           /* 'username'=>'required',*/
            /*'password'=>'required'*/

        ],[
            'email.required'=>'Vui lòng nhập email ',
            'username.required'=>'Vui lòng nhập tài khoản',
           /* 'password.required'=>'Vui lòng nhập mật khẩu',*/
            /*'email_customer.unique'=>'Email đã có người sử dụng',*/
            'name.required'=>'Vui lòng nhập họ và tên.',


        ]);
        $accounts=accounts::Find($id);
        //start insert users
        $user=users::Find($accounts->id_user);
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->phone=$req->phone;
         if($req->hasFile('image'))
            {
                $file =$req->file('image');
                $footer=$file->getClientOriginalExtension();
                if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
                {
                    return redirect('admin/profile/upload_account',$accounts->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
       
        $user->address=$req->address;
        $user->save();
        //end insert users

        return redirect('admin/profile/info_account')->with('notification','Đã cập nhật thông tin tài khoản thành công');
    }
    public function getEdit_Password($id)
    {
       
            $account=accounts::Find($id);
            return view("admin.profile.edit_password",compact('account'));
     
    }
    public function postEdit_Password($id,Request $req)
    {
        $this->validate($req,[
            'password_old'=>'required',
            'password_new'=>'required',
            're_password_new'=>'required|same:password_new'
        ],[
            'password_old.required'=>'Vui lòng nhập mật khẩu cũ',
            'password_new.required'=>'Vui lòng nhập mật khẩu mới',
            're_password_new.same'=>'mật khẩu mới không khớp'
        ]);
        if(Auth::guard('account')->check())
        {
            $credentials=array('username'=>Auth::guard('account')->user()->username,'password'=>$req->password_old);
            if(Auth::guard('account')->attempt($credentials))
            {
               $account=Accounts::Find($id);
               $account->password=Hash::make($req->password_new);
               $account->save();
               return redirect('admin/profile/edit_password/'.$id)->with('notification','Đổi mật khẩu thành công');
            }
            else
            {
                return redirect('admin/profile/edit_password/'.$id)->with('notification','Mật khẩu cũ không đúng');
            }
        }
        else
        {
            return "Chưa đăng nhập";
        }

    }
}
