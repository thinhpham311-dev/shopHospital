<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Answer_Comment;
use App\Comment;
use Auth;
class Answer_CommentController extends Controller
{
    public function postCreate(Request $req)
    {
        $this->validate($req,[
            'content'=>'required',
        ],[
            'content'=>'Vui lòng nhập cậu trả lời cho khách hàng'
        ]);
        $answer_comment=new Answer_Comment;

        $answer_comment->id_account=Auth::id();
        $answer_comment->id_comment=$req->id_comment;
        $answer_comment->content=$req->content;
        $answer_comment->save();

        $comment=Comment::Find($req->id_comment);
        $comment->status=1;
        $comment->save();

        return redirect('client/products/Detail_product/'.$req->id_product);
    }
}
