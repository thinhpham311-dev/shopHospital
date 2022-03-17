<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ContactController extends Controller
{
    public function getIndex()
    {
    	 $number_order=0;
    	 $list_all_contact = Contact::all();
        $list_all_contacts= Contact::orderby('id','desc')->paginate(4);
    	return view('admin.contact.index',compact('number_order','list_all_contact','list_all_contacts'));
    }
     public function getStatusChange($id)
    {
        $contact=Contact::Find($id);
        $contact->status=1;
        $contact->save();
        return view('admin.contact.details',compact('contact'));
        //return redirect()->back();
    }
    public function getDelete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('admin/contacts/index')->with('notification','Đã xóa màu của sản phẩm');
    }
}
