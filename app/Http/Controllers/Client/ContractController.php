<?php

namespace App\Http\Controllers\Client;

use App\Contact;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function getIndex()
    {
    	return view('client.page.contact');
    }
     public function postCreate(Request $req)
    {
        $this->validate($req,[
            'name'=>'required',
            'email'=>'required|email',
            'content'=>'required',
        ],[
            'name.required'=>'Vui lòng nhập họ và tên',
            'email.required'=>'Vui lòng nhập họ và tên',
            'email.email'=>'Vui lòng nhập đúng định dạng email, abc@gmail.com',
            'content'=>'Vui lòng nhập nôi dung'
        ]);
        $contact=new Contact;
        $contact->name=$req->name;
        $contact->email=$req->email;
        $contact->content=$req->content;
        $contact->save();
        return redirect()->back()->with('notification','Đã gửi đến cửa hàng');

    }
}
