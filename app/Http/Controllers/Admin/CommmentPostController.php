<?php

namespace App\Http\Controllers\Admin;

use App\Posts;
use App\Comment_post;
use Illuminate\Http\Request;

class CommmentPostController extends Controller
{
    public function getIndex()
    {
    	$list_Comment_Post = Comment_post::all();
    	return view('admin.commentpost.index', compact('list_Comment_Post'));
    }
    public function getDelete($id)
    {
    	$comment=Comment_post::Find($id);
        $comment->delete();
        return redirect('admin/comment_post/index')->with('notification','Đã bình luận bài viết thành công');
            //end delete product
    }
    
}
