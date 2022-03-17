<?php

namespace App\Http\Controllers\Staff;

use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getIndex()
    {
    	$list_all_comment=comment::Orderby('id_product')->get();
    	return view('staff.comment.index',compact('list_all_comment'));
    }
}
