<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function postCreate(Request $req)
    {
        $this->validate($req,[
            'content'=>'required',
        ],[
            'content'=>'Vui lòng nhập bình luận'
        ]);
        $Comment=new Comment;
        $Comment->id_account=Auth::id();
        $Comment->id_product=$req->id_product;
        $Comment->content=$req->content;
        $Comment->status=0;
        $Comment->save();
        return redirect('client/products/Detail_product/'.$req->id_product);
    }
}
