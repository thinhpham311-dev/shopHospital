<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\accounts;
use App\Http\Requests\RequestLogin_admin;
class UsersController extends Controller
{
	public function getLogin_Admin()
    {
        return view('admin.users.login_admin');
    }
    public function postLogin_Admin(RequestLogin_admin $req)
    {
    	
        if ($req->remember == trans('remember.Remember Me')) 
        {
            $remember = true;
        } 
        else 
        {
            $remember = false;
        }
    	$credentials=array('username'=>$req->username,'password'=>$req->password);
    	if(Auth::guard('account')->attempt($credentials))
    	{
            if(Auth::guard('account')->user()->status==0)
            {
                return redirect('admin/login')->with('notification','Tai Khoản đã khóa');
            }
            else
            {
                return redirect('admin/');
            }
    		
    	}
    	else
    	{
    		return redirect('admin/login')->with('notification','Tài khoản và mật khẩu không đúng');
    	}
       
    }
    public function getLogout_Admin()
    {
        Auth::guard('account')->logout();
        return redirect('admin/login');
    }
}
