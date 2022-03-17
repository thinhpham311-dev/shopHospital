<?php

namespace App\Http\Controllers\Staff;

use App\users;
use App\accounts;
use App\Customer;
use Str;
use Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getIndex()
    {
    	 $number_order=0;
    	$list_all_customer=customer::orderby('id','desc')->paginate(4);
         $list_all_customers=customer::all();
    	return view('staff.customer.index',compact('list_all_customer','list_all_customers','number_order'));
    }
    public function getCreate()
    {
    	return view('staff.customer.create');
    }
     public function postCreate(Request $req)
    {
         $this->validate($req,
        [
            'name'=>'required',
            'email'=>'required|email',
            'username'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
            
        ],[
            'email.required'=>'Vui lòng nhập email ',
            'email.email'=>'Không đúng định dạng email',
            'username.required'=>'Vui lòng nhập tài khoản',
            /*'email_customer.unique'=>'Email đã có người sử dụng',*/
            'name.required'=>'Vui lòng nhập họ và tên.',
            'username.required'=>'Vui lòng nhập tài khoản',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'confirm_password.required'=>'Xác nhận mật khẩu không được bỏ trống',
            'confirm_password.same'=>'Mật khẩu không giống'

            
        ]);
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
                return redirect('manage/customers/create')->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
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
        //start insert customer
        $customer=new customer;
        $customer->id_user=$user->id;
        $customer->type=$req->type;
        $customer->save();
        //end insert customer
        //start insert account
        $accounts=new accounts;
        $accounts->id_user=$user->id;
        $accounts->username=$req->username;
        $accounts->password=Hash::make($req->password);
        $accounts->right=0;
        $accounts->save();
        //end insert account
        return redirect('manage/customers/index')->with('notification','Đã tạo khách hàng mới');
    }
     public function getEdit($id)
    { 
        $customer=customer::where('id_user',$id)->first(); 
         if ($customer == null) {
        $customer=customer::find($id);
        return view('staff.customer.edit',compact('customer'));
        }
        return view('staff.customer.edit',compact('customer'));
    }
     public function postEdit(Request $req,$id)
    {
        
        $customer=customer::Find($id);
        $customer->id_user=$customer->id_user;
        $customer->type=$req->type;
        $customer->save();
        //start insert users
        $user=users::Find($customer->id_user);
        $user->name=$req->name;
        $user->gender=$req->gender;
        $user->phone=$req->phone;
       if($req->hasFile('image'))
        {
            $file =$req->file('image');
            $footer=$file->getClientOriginalExtension();
            if($footer!='jpg' && $footer!='JPG' && $footer!='png' && $footer!='PNG' && $footer!='jpeg' )
            {
                return redirect('manage/customers/edit'.$user->id)->with('notification','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $photo=str::random(4)."_".$name;
            while (file_exists("./public/img/admin/customer".$photo)) {
               $photo=str::random(4)."_".$name;
            }
            $image_path =public_path('img/admin/customer/'. $user->image);
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
        
        $user->email=$req->email;
        $user->address=$req->address;
        $user->save();
        // //end insert users
        return redirect('manage/customers/index')->with('notification','Đã cập nhật thông tin khác hàng');
    }
      public function getDelete($id)
    {
        $customer =Customer::where('id_user',$id)->first();
        if ($customer == null) {
            $customer = Customer::find($id);
            $customer->delete();
        return redirect('manage/customers/index')->with(['notification'=> 'Đã xóa khách hàng']);
        }
         $customer->delete();
        return redirect('manage/customers/index')->with('notification','Đã xóa khách hàng');
    }
    
}
