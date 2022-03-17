<?php

namespace App\Http\Controllers\Client;


use Hash;
use App\users;
use App\accounts;
use App\Cart;
use Session;
use App\Customer;
use Str;
use App\Http\Requests\Edit_profileRequest;
use App\Http\Requests\RequestRegister;
use App\Http\Requests\RequestLogin;
use App\Http\Requests\Requestupdatepassword;
use App\Http\Requests\Requestupdateprofile;
use Illuminate\Support\Facades\Auth;
class AccountsController extends Controller
{
	public function getLogin()
    {
       
        return View('client.account.login');
    }
    public function postLogin(RequestLogin $req)
    {

        $credentials=array('username'=>$req->username,'password'=>$req->password);
        if(Auth::guard('account')->attempt($credentials))
        {
            if(Auth::guard('account')->user()->status==0)
            {
                return redirect('client/accounts/login')->with('notification','Tai khoan bi khoa');
            }
            else
            {
                return redirect('/')->with('notification','Đăng nhập thành công');
            }
            
        }
        else
        {
            return redirect('client/accounts/login')->with('notification','Tài khoản và mật khẩu không đúng');
        }
    }
     public function getLogout()
    {
         Auth::guard('account')->logout();
         Session()->flush();
        return redirect('/');
    }
     public function postRegister(RequestRegister $req)
    {
       
        //start insert users
        $user=new users;
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->email=$req->email;
        $user->save();
        //end insert users

        $accounts=new accounts;
        $accounts->id_user=$user->id;
        $accounts->username=$req->username;
        $accounts->password=Hash::make($req->password);
        $accounts->right=0;
        $accounts->status=1;
        $accounts->save();

        $customer=new customer;
        $customer->id_user=$user->id;
        $customer->type=0;
        $customer->save();

        $credentials=array('username'=>$req->username,'password'=>$req->password);
        if(Auth::guard('account')->attempt($credentials))
        {
            return redirect('/')->with('notification1','Đăng Ký tài khoản thành công');
        }
        else
        {
            return redirect()->back()->with('notification1','Đăng ký tài khoản thất bại');
        }

    }
     public function getProfile()
    {
        if(Auth::guard('account')->check())
        {
            $account=accounts::Find(Auth::user()->id);
            return view('client.account.profile',compact('account'));
        }
        else
        {
            return "Chưa đăng nhập";
        }

    }
     public function postEdit_Profile(Edit_profileRequest $req,$id)
    {
        if(Auth::guard('account')->check())
        {
            $users=Users::Find(Auth::guard('account')->user()->id_user);
            $users->name=$req->name;
            $users->gender=$req->gender;
            $users->phone=$req->phone;
            $users->address=$req->address;
            $users->email=$req->email;
            if(Auth::guard('account')->user()->right==0)
            {
                if($req->hasFile('image'))
                {
                    $file =$req->file('image');
                    $footer=$file->getClientOriginalExtension();
                    if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
                    {
                        return redirect('admin/accounts/edit',$id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
                    }
                    $name=$file->getClientOriginalName();
                    $photo=str::random(4)."_".$name;
                    while (file_exists("./public/img/admin/customer".$photo)) {
                       $photo=str::random(4)."_".$name;
                    }
                     $image_path =public_path('public/img/admin/customer/'. $users->image);
                    if($users->image!="")
                    {
                        if(file_exists($image_path))
                        {
                            unlink($image_path);
                        }
                    }
                    $file->move("./public/img/admin/customer",$photo);
                    $users->image=$photo;

                }
                else
                {
                     $users->image=$users->image;
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
                        return redirect('admin/accounts/edit',$id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
                    }
                    $name=$file->getClientOriginalName();
                    $photo=str::random(4)."_".$name;
                    while (file_exists("./public/img/admin/accounts".$photo)) {
                       $photo=str::random(4)."_".$name;
                    }
                     $image_path =public_path('img/admin/accounts/'. $users->image);
                    if($users->image!="")
                    {
                        if(file_exists($image_path))
                        {
                            unlink($image_path);
                        }
                    }
                    $file->move("./public/img/admin/accounts",$photo);
                    $users->image=$photo;

                }
                else
                {
                     $users->image=$users->image;
                }
            }
           
            $users->save();
            $account=Accounts::Find($id);
            $account->save();

            return redirect('/')->with('notification','Cập nhật tài khoản thành công');
        }
        else
        {
             return "Chưa đăng nhập";
        }
    }
    public function getEdit_Password($id)
    {
         if(Auth::guard('account')->check())
        {
            $account=accounts::Find($id);
            return view("client.account.updatepassword",compact('account'));
        }
        else
        {
            return "Chưa đăng nhập";
        }
    }
     public function postEdit_Password(Requestupdatepassword $req,$id)
    {
       
        if(Auth::guard('account')->check())
        {
            $credentials=array('username'=>Auth::guard('account')->user()->username,'password'=>$req->password_old);
            if(Auth::guard('account')->attempt($credentials))
            {
               $account=Accounts::Find($id);
               $account->password=Hash::make($req->password_new);
               $account->save();
               return redirect('client/accounts/profile/')->with('notification','Đổi mật khẩu thành công');
            }
            else
            {
                return redirect('client/accounts/profile/')->with('notification','Mật khẩu cũ không đúng');
            }
        }
        else
        {
            return "Chưa đăng nhập";
        }


    }
}
