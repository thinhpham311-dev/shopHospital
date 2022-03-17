<?php

namespace App\Http\Controllers\Admin;

use App\Taxonomy;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function getIndex()
    {
    	 $number_order=0;
    	 $list_all_post=Posts::orderby('id','desc')->paginate(6);
        $list_all_posts=Posts::all();
    	
    	return view('admin.Post.index',compact('number_order','list_all_post','list_all_posts'));
    }
     public function getCreate()
    {
        $list_all_taxonomy=Taxonomy::all();
    	return view('admin.Post.create',compact('list_all_taxonomy'));
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [

			'id_taxonomy'=>'required',
			'post_title'=>'required',
			'post_excerpt'=>'required',
			'post_content'=>'required',

        ],[
            'id_taxonomy.required'=>'Vui lòng chọn thể loại',
			'post_title.required'=>'Vui lòng nhập tiêu đề bài viết',
			'post_excerpt.required'=>'Vui lòng nhập nội dung tóm tắt',
			'post_content.required'=>'Vui lòng nhập nội dung bài viết',
        ]);
        $posts=new Posts;
		if(Auth::guard('account')->check())
		{
			$posts->id_account=Auth::guard('account')->id();
			$posts->id_taxonomy=$req->id_taxonomy;
			$posts->post_title=$req->post_title;
			$posts->post_title_slug=Str::slug($req->post_title,'-');
			$posts->post_excerpt=$req->post_excerpt;
			$posts->post_content=$req->post_content;
			$posts->post_views=0;
			$posts->status=1;
			$posts->save();
			return redirect('admin/posts/index')->with('notification','Đã tạo mới bài viết');
		}
		else
		{
			return "Bạn chưa đăng nhập";
		}

    }
    public function getEdit($id)
    {
    	$list_all_taxonomy = Taxonomy::all();
    	$posts = Posts::find($id);
    	return view('admin.Post.edit',compact('list_all_taxonomy','posts'));

    }
     public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [

			'id_taxonomy'=>'required',
			'post_title'=>'required',
			'post_excerpt'=>'required',
			'post_content'=>'required',


        ],[
            'id_taxonomy.required'=>'Vui lòng chọn thể loại',
			'post_title.required'=>'Vui lòng nhập tiêu đề bài viết',
			'post_excerpt.required'=>'Vui lòng nhập nội dung tóm tắt',
			'post_content.required'=>'Vui lòng nhập nội dung bài viết',
        ]);
        $posts=Posts::Find($id);
		if(Auth::guard('account')->check())
		{
			$posts->id_account=Auth::guard('account')->id();
			$posts->id_taxonomy=$req->id_taxonomy;
			$posts->post_title=$req->post_title;
			$posts->post_title_slug=Str::slug($req->post_title,'-');
			$posts->post_excerpt=$req->post_excerpt;
			$posts->post_content=$req->post_content;
			$posts->post_views=0;
			$posts->status=1;
			$posts->save();
			return redirect('admin/posts/index')->with('notification','Đã cập nhật bài viết');
		}
		else
		{
			return "Bạn chưa đăng nhập";
		}
    }
     public function getDelete($id)
    {
        $posts=Posts::Find($id);
         //start delete color_product
            $list_all_comment_post= Comment_post::where('id_comment',$comment->id)->get();
            if(count($list_all_comment_post)>0)
            {
                foreach ($list_all_comment_post as $list)
                {
                   if($comment->id==$list->id_comment)
                   {

                      $answer_comment=Comment_post::Find($list->id);
                      $answer_comment->delete();
                   }
                }
            }
            //end delete color_product
            //start delete product
        $posts->delete();
        return redirect('admin/posts/index')->with('notification','Xóa bài viết thành công');
    }
     public function getSearch(Request $req)
    {
    	 $number_order=0;
        $list_all_post=Posts::where('post_title','like','%'.$req->txt_keyword.'%')->orderby('id','desc')->paginate(6);
        $list_all_posts=Posts::where('post_title','like','%'.$req->txt_keyword.'%')->get();
        return view('admin.Post.index',compact('number_order','list_all_post','list_all_posts'));
    }
     public function getStatusPost($id)
    {
        $posts=Posts::Find($id);
        $posts->status=1-$posts->status;
        $posts->save();
        return redirect('admin/posts/index');
    }
}
