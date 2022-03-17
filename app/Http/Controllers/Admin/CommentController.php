<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\answer_comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getIndex()
    {
        $number_order = 0;
    	$list_all_comment=comment::Orderby('id_product')->get();
    	return view('admin.comment.index', compact('number_order','list_all_comment'));
    }
    public function getDelete($id)
    {
    		$comment=Comment::Find($id);
            //start delete color_product
            $list_all_answer_comment= answer_comment::where('id_comment',$comment->id)->get();
            if(count($list_all_answer_comment)>0)
            {
                foreach ($list_all_answer_comment as $list)
                {
                   if($comment->id==$list->id_comment)
                   {

                      $answer_comment=answer_comment::Find($list->id);
                      $answer_comment->delete();
                   }
                }
            }
            //end delete color_product
            //start delete product
            

            $comment->delete();
            return redirect('admin/comments/index')->with('notification','Đã bình luận sản phẩm thành công');
            //end delete product
        
    }
}
