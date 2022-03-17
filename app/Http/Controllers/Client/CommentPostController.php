<?php

namespace App\Http\Controllers\Client;

use App\Comment_post;
use Illuminate\Http\Request;

class CommentPostController extends Controller
{
     public function postCreate(Request $req)
    {
        $this->validate($req,[
            'content'=>'required',
        ],[
            'content'=>'Vui lòng nhập bình luận'
        ]);
        $Comment_post=new Comment_post;
        $Comment_post->id_account=Auth::id();
        $Comment_post->id_post =$req->id_post ;
        $Comment_post->comment_content=$req->comment_content;
        $Comment_post->save();
        return redirect('client/posts/details_posts/'.$req->id_post );
    }
}
