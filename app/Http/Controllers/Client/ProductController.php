<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Type_Product;
use App\Products;
use App\Color_Product;
use App\Comment;
use App\Answer_Comment;
use App\Cart;
use App\Customer;
use App\Bill_Detail;
use App\Bill;
use App\Provider;
use App\Trademark;
use App\Image_Product;
use App\Category;
use App\accounts;
use App\Evaluate_Product;
use Session;
use Auth;

class ProductController extends Controller
{
	 public function getList_Product_Type($id)
    {
         $reviews_product=Evaluate_Product::where('id_product',$id)->avg('Evaluate');
        $list_nine_newproduct=Products::where('id_type',$id)->orderBy('created_at','desc')->get();
        $list_all_category = Category::all();
        $list_all_product=Products::where('id_type',$id)->paginate(8);
        return view('client.page.list_product',compact('reviews_product','list_nine_newproduct','list_all_category','list_all_product'));
    }
   public function getDetail_Product(Request $req, $id)
   {

        $reviews_product=Evaluate_Product::where('id_product',$id)->avg('Evaluate');
        $list_all_provider = products::where('id_provider',$id)->get();
        $list_all_comment=Comment::where('id_product',$id)->orderby('id','desc')->get();
        $list_all_category=Category::all();
        $sanpham = Products::where('id',$req->id)->first();
        $list_all_product_tuongtu = Products::where('id_type',$sanpham->id_type)->take(6)->get();
        $list_all_imageproduct=image_Product::where('id_product',$id)->get();
        $product = Products::find($id);
         return view('client.product.Detail_product', compact('reviews_product','list_all_provider','list_all_comment','list_all_category','list_all_product_tuongtu','list_all_imageproduct','product'));
        
        
   }
    public function getDeletecomment($id)
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
            return redirect('client/products/Detail_product/'.$comment->id_product)->with('notification','Đã bình luận sản phẩm thành công');
            //end delete product
        
    }
    public function getDeleteAnswercomment($id)
    {
        $Answer_Comment = Answer_Comment::find($id);
        $Answer_Comment->delete();
        return redirect('client/products/Detail_product/'.$comment->id_product)->with('notification','Đã bình luận sản phẩm thành công');
    }
    public function getAdd_Cart($id,Request $req)
    {
        if(Auth::guard('account')->check())
        {
        $product=Products::Find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
        }
         else
        {
            return redirect()->back()->with('notification','bạn phải đăng nhập mới được đặt hàng');
        }

    }
    public function postAddCart_2(Request $req)
    {
        if(Auth::guard('account')->check())
        {
           
                $product=Products::Find($req->product_id);
                $oldCart=Session('cart')?Session::get('cart'):null;
                $cart=new Cart($oldCart);
                $cart->add_2($product,$req->product_id,$req->quantity);
                $req->Session()->put('cart',$cart);
               return redirect()->back();
            
        }
        else
        {
             return redirect()->back()->with('notification','bạn phải đăng nhập mới được đặt hàng');
        }
        
    }
      public function getDelete_Cart($id)
    {
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }

        return redirect('/')->with('notification','Đã xóa giỏ hàng thành công');
    }
     public function postUpdateQuantityCart(Request $req)
    {
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->totalPrice=0;
        $cart->totalQty=0;
        $product_cart=$cart->items;
        foreach ($req->quantity_in_cart as $id=>$quantity)
        {
            $product=Products::Find($id);
            $cart->update($product,$id,$quantity);
            $req->Session()->put('cart',$cart);
        }

       return redirect('client/products/payment_cart');
    }
      public function getPayment_Cart()
    {
        if(Session('cart'))
        {
            $list_id_user_customer=Customer::where('id_user',Auth::guard('account')->user()->id_user)->get();
            if(count( $list_id_user_customer)!=0)
            {
             foreach ($list_id_user_customer as  $value)
            {
                $customer=$value->id;
            }
            }   
            $list_all_bill_me=Bill::where('id_customer',$customer)->get();
            $number_order = 0;
            $ship = 30000;
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
            $cart=Session::get('cart');
            $product_cart=$cart->items;
            $totalPrice=$cart->totalPrice;
            $totalQty=$cart->totalQty;
            return View('client.product.payment_cart',compact('ship','number_order','list_all_bill_me','cart','product_cart','totalPrice','totalQty'));

        }
        else
        {
            return View('client.product.payment_cart');
        }

        
    }
     public function postPayment_Cart(Request $req)
    {
        $cart=Session::get('cart');
        if(Auth::guard('account')->check())
        {
            $list_id_user_customer=Customer::where('id_user',Auth::guard('account')->user()->id_user)->get();
            foreach ($list_id_user_customer as  $value)
            {
                $customer=$value->id;
            }
            $bill=new Bill;
            $bill->id_customer=$customer;
            $bill->date_order=date('Y-m-d');
            $bill->total=$cart->totalPrice;
            $bill->payment=$req->payment_method;
            if($bill->note=='')
            {
                $bill->note='không có ghi chú';
            }else{
                  $bill->note=$req->notes;
            }
            $bill->status=0;
            
            $bill->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail=new Bill_Detail;
                $bill_detail->id_bill=$bill->id;
                $bill_detail->id_product=$key;
                $bill_detail->quantity=$value['qty'];
                $bill_detail->price=($value['price']/$value['qty']);
                $bill_detail->save();

                $product=Products::Find($key);
                $product->inventory_number= ($product->inventory_number-$value['qty']);
                $product->save();

            }
            Session::forget('cart');
            return redirect('/')->with('thongbao','Đặt hàng thành công');
        }
        else
        {
            return "Bạn chưa đăng nhập";
        }

    }
    public function getView_Bill_Me()
    {
            
            $list_id_user_customer=Customer::where('id_user',Auth::guard('account')->user()->id_user)->get();
            if(count( $list_id_user_customer)!=0)
            {
                foreach ($list_id_user_customer as  $value)
                {
                    $customer=$value->id;
                }
                $list_all_bill_me=Bill::where('id_customer',$customer)->orderby('id','desc')->get();
                $number_order = 0;
                return view('client.bill.History_bill',compact('number_order','list_all_bill_me'));
            }
            else
            {
                return view('client.bill.History_bill');
            }
    }
    public function getReviews_Products($id_bill)
    {
        $number_order=0;
        $list_detailbill=Bill_Detail::where('id_bill',$id_bill)->orderby('id','desc')->get();
        $id_bill=$id_bill;
        return view('client.bill.reviews',compact('id_bill','number_order','list_detailbill'));
    }
    public function postReviews_Products(Request $req,$id_bill)
    {
         $this->validate($req,
        [

            'note'=>'required',

        ],[
            'note.required'=>'Vui lòng con góp ý kiến',

        ]);
        foreach ($req->Evaluate as $id=>$post)
        {
           $reviews=new Evaluate_Product;
           $reviews->id_product =$id;
           $reviews->id_account =Auth::id();
           $reviews->Evaluate=$post;
           $reviews->note=$req->note;
           $reviews->save();
        }
        $bill =Bill::Find($id_bill);
        $bill->status_reviews=1;
        $bill->save();    
        return redirect('client/products/view_bill_me')->with('notification','Bạn đã đánh giá sản phẩm thành công');
    }
    public function getSearchPrice($gia)
    {
        if($gia==1000000)
        {
            $list_product=Products::where('unit_price','<',$gia)->get();
        }
        elseif($gia==10000000)
        {
            $list_product=Products::where('unit_price','>',$gia)->get();
        }
        dd( $list_product);
        
    }
    public function getSearchPrice2($gia1,$gia2)
    {
         $list_product=Products::where('unit_price','>',$gia1)->orwhere('unit_price','<',$gia2)->get();
          dd( $list_product);
    }


}
