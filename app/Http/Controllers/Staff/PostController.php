<?php

namespace App\Http\Controllers\Staff;

use App\Posts;
use App\Taxonomy;
use Illuminate\Http\Request;
use Auth;
use Str;
class PostController extends Controller
{
    public function getIndex()
    {
    	 $number_order=0;
    	 $list_all_posts=Posts::orderby('id','desc')->paginate(6);
        $list_all_post=Posts::all();
    	return view('staff.post.index', compact('number_order','list_all_post','list_all_posts'));
    }
    public function getCreate()
    {
    	 $list_all_taxonomy=Taxonomy::all();
    	return view('staff.post.create', compact('list_all_taxonomy'));
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
		$posts->id_account=Auth::guard('account')->id();
		$posts->id_taxonomy=$req->id_taxonomy;
		$posts->post_title=$req->post_title;
		$posts->post_title_slug=Str::slug($req->post_title,'-');
		$posts->post_excerpt=$req->post_excerpt;
		$posts->post_content=$req->post_content;
		$posts->post_views=0;
		$posts->status=1;
		$posts->save();
		return redirect('manage/posts/index')->with('notification','Đã tạo mới bài viết');
    }
    public function getEdit($id)
    {
    	$posts = Posts::find($id);
    	$list_all_taxonomy = Taxonomy::all();
    	return view('staff.post.edit',compact('posts','list_all_taxonomy'));
    }
    public function postEdit(Request $req, $id)
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
			return redirect('manage/posts/index')->with('notification','Đã cập nhật bài viết');
		}
		else
		{
			return "Bạn chưa đăng nhập";
		}
    }
    public function getDelete($id)
    {
        $posts=Posts::Find($id);
        $posts->delete();
        return redirect('manage/posts/index')->with('notification','Xóa bài viết thành công');


    }
     public function getSearch(Request $req)
    {
         $number_order=0;
        $list_all_post=Posts::where('post_title','like','%'.$req->txt_keyword.'%')->get();
        $list_all_posts=Posts::where('post_title','like','%'.$req->txt_keyword.'%')->orderby('id','desc')->paginate(6);
        return view('staff.post.index',compact('number_order','list_all_post','list_all_posts'));
    }
}
