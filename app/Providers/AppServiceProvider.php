<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\accounts;
use App\customer;
use App\Type_Product;
use App\Products;
use App\Category;
use App\Contact;
use App\Bill;
use Session;
use App\Cart;
use App\Taxonomy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $account_users=accounts::Find(Auth::user()->id);
                $view->with('account_users',$account_users);
            }
            $account=accounts::all();
            $view->with('account',$account);
        });
         view()->composer('admin.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $list_contact_header=Contact::where('status',0)->orderby('id','desc')->get();
                $view->with('list_contact_header',$list_contact_header);
            }
            /*$account_users=accounts::Find('1');
                $view->with('account_users',$account_users);*/
        });
        view()->composer('admin.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $list_bill_header=Bill::where('status',0)->orderby('id','desc')->get();
                $view->with('list_bill_header',$list_bill_header);
            }
            /*$account_users=accounts::Find('1');
                $view->with('account_users',$account_users);*/
        });
         
         view()->composer('client.layout.menu',function($view){
            $list_all_category = Category::all();
                $view->with('list_all_category',$list_all_category);
            $list_all_typeproduct_header=Type_Product::all();
                $view->with('list_all_typeproduct_header',$list_all_typeproduct_header);
            $list_all_Taxonomy_header=Taxonomy::all();
                $view->with('list_all_Taxonomy_header',$list_all_Taxonomy_header);
        }); 
          view()->composer('client.layout.menu',function($view){
            if(Auth::guard('account')->check())
            {
                
                $account_users=accounts::Find(Auth::user()->id);
                $view->with('account_users',$account_users);
            }
            // $account_users=accounts::Find('1');
            //     $view->with('account_users',$account_users);
        });
        view()->composer('client.layout.header',function($view){
            $list_all_category = Category::all();
                $view->with('list_all_category',$list_all_category);
            $list_all_typeproduct_header=Type_Product::all();
                $view->with('list_all_typeproduct_header',$list_all_typeproduct_header);
            $list_all_Taxonomy_header=Taxonomy::all();
                $view->with('list_all_Taxonomy_header',$list_all_Taxonomy_header);
        });
        view()->composer('client.layout.footer',function($view){
            $list_all_category = Category::all();
                $view->with('list_all_category',$list_all_category);
        });
         //start account client
         view()->composer('client.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                
                $account_users=accounts::Find(Auth::user()->id);
                $view->with('account_users',$account_users);
            }
            /*$account_users=accounts::Find('1');
                $view->with('account_users',$account_users);*/
        });
        //end account client
        //start show cart in client
        view()->composer('client.layout.header',function($view){
            if(Session('cart'))
            {
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        
        //staff
        view()->composer('staff.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $account_users=accounts::Find(Auth::user()->id);
                $view->with('account_users',$account_users);
            }
            $account=accounts::all();
            $view->with('account',$account);
        });
         view()->composer('staff.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $list_contact_header=Contact::where('status',0)->orderby('id','desc')->get();
                $view->with('list_contact_header',$list_contact_header);
            }
            /*$account_users=accounts::Find('1');
                $view->with('account_users',$account_users);*/
        });
        view()->composer('staff.layout.header',function($view){
            if(Auth::guard('account')->check())
            {
                $list_bill_header=Bill::where('status',0)->orderby('id','desc')->get();
                $view->with('list_bill_header',$list_bill_header);
            }
            /*$account_users=accounts::Find('1');
                $view->with('account_users',$account_users);*/
        });
    }
}
