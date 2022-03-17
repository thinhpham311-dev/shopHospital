<?php

namespace App\Http\Controllers\Client;

use App\Comment_post;
use App\Taxonomy;
use App\Posts;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getList_Posts()
    {
        $list_all_posts=Posts::all();
        $firstimage=array();
        foreach ($list_all_posts as $value)
        {
            $firstimage[$value->id]=$this->getFirstImage($value->post_content);
        }

        return view('client.page.index',compact('list_all_posts','firstimage'));
    }
    public function getFirstImage($strContent)
    {
        $first_img = "";
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strContent, $matches);
        if(empty($output))
            return asset("public/img/noimage.png");
        else
            return $matches[1][0];
    }
     public function getDetailsPosts($id,Request $req)
    {
        $list_comment_post = Comment_post::all();
         $list_all_posts=Posts::all();
        $firstimage=array();
        foreach ($list_all_posts as $value)
        {
            $firstimage[$value->id]=$this->getFirstImage($value->post_content);
        }

        $posts=Posts::Find($id);
        if(!Session()->has("posts_view_".$posts->id))
        {
            $posts->post_views=$posts->post_views+1;
            $posts->save();
            Session("posts_view_".$posts->id);
            $req->Session()->put("posts_view_".$posts->id,1);
        }

        return view('client.post.Detail_post',compact('list_comment_post','list_all_posts','firstimage','posts'));
    }
    
}
