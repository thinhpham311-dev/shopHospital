<?php

namespace App\Http\Controllers\Client;
 
use App\Taxonomy;
use App\Posts;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
   public function getList_Taxonomy($id)
    {
        $Taxonomy = Taxonomy::find($id);
        $list_all_posts = Posts::where('id_taxonomy',$id)->get();
          $firstimage=array();
        foreach ($list_all_posts as $value)
        {
            $firstimage[$value->id]=$this->getFirstImage($value->post_content);
        }

        return view('client.page.list_post',compact('Taxonomy','list_all_posts','firstimage'));

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
   
   
}
