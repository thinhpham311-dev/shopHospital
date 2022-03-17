 @extends('client.layout.master')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">DANH MỤC SẢN PHẨM</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Danh mục sản phẩm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 col-xs-12">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li>
                                            <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li class="active">
                                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                   
                                    <div class="showing f-right text-right">
                                        <span> hiển thị {{count($list_all_product)}} sản phẩm</span>
                                    </div>                                   
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div role="tabpanel" class="tab-pane" id="grid-view">
                                        <div class="row">
                                            <!-- product-item start -->
                                            @foreach($list_all_product as $list)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                             <img src="{{url('public/img/admin/product/',$list->image)}}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                             <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                              @if($reviews_product<0)
                                                            không hợp lê
                                                          @elseif($reviews_product>=0 && $reviews_product<1 )
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=1 && $reviews_product<2 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=2 && $reviews_product<3 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=3 && $reviews_product<4 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a> 
                                                          @elseif($reviews_product>=4 && $reviews_product<5 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                          @else
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                          @endif
                                                        </div>
                                                       @if($list->promotion_price!=0)
				                                        <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
				                                        <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
				                                        @else
				                                         <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
				                                     </br>
				                                      </br>
				                                         @endif
                                                        <ul class="action-button">
                                                            <li>
                                                                <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    	@endforeach
                                            <!-- product-item end -->
                                              <li class="text-center">{{$list_all_product->links()}}</li>
                                        </div>
                                    </div>
                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane active" id="list-view">
                                        <div class="row">
                                             @foreach($list_all_product as $list)
                                            <!-- product-item start -->
                                            <div class="col-md-12">
                                                <div class="shop-list product-item">
                                                    <div class="product-img">
                                                        <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                             <img src="{{url('public/img/admin/product/',$list->image)}}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="clearfix">
                                                            <h6 class="product-title f-left">
                                                                <a href="single-product.html" style="font-family: Arial;">{{$list->name}} </a>
                                                            </h6>
                                                            <div class="pro-rating f-right">
                                                                 @if($reviews_product<0)
                                                                 không hợp lê
                                                          @elseif($reviews_product>=0 && $reviews_product<1 )
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=1 && $reviews_product<2 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=2 && $reviews_product<3 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=3 && $reviews_product<4 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                          @elseif($reviews_product>=4 && $reviews_product<5 )
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              <a href="#"><i class="zmdi zmdi-star-half"></i></a>  
                                                          @else
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                          @endif
                                                            </div>
                                                        </div>
                                                        <h6 class="brand-name mb-30">Brand Name</h6>
                                                         @if($list->promotion_price!=0)
                                                        <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
                                                        <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
                                                        @else
                                                         <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
                                                     </br>
                                                      </br>
                                                         @endif
                                                       
                                                        <ul class="action-button">
                                                          
                                                            <li>
                                                                <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul>
                                    <li class="text-center">{{$list_all_product->links()}}</li>
                                   
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <div class="col-md-3 col-md-pull-9 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                    <input type="text" placeholder="Tìm kiếm loại sản phẩm">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                              <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Danh mục sản phẩm</h6>
                                <div id="cat-treeview" class="product-cat">
                                    @foreach($list_all_category as $list)
                                    @if(count($list->type_product)>0)
                                    <ul>
                                        <li class="closed"><a href="#">{{$list->name}}</a>
                                            <ul>
                                                 @foreach($list->type_product as $list1)
                                                <li><a href="{{ url('client/products/list_product_type',$list1->id) }}">{{$list1->name}}</a></li>
                                               
                                                @endforeach
                                            </ul>
                                        </li>                                       
                                       
                                    </ul>
                                    @endif
                                    @endforeach
                                </div>
                            </aside>
                           
                            <!-- operating-system -->
                            <aside class="widget operating-system box-shadow mb-30">
                               <h6 class="widget-title border-left mb-20" style="font-family: Arial;">Tìm kiếm sản phẩm theo bảng giá</h6>
                                <form action="https://demo.hasthemes.com/subas-preview/subas/action_page.php">
                                    <label><a href="{{url('client/products/search_price/1000000')}}">Dưới 1.000.000</a>
                                    </label><br>
                                    <label><a href="{{url('client/products/search_price_2/1000000/3000000')}}">1.000.000 -> 3.000.000 </a></label><br>
                                    <label><a href="{{url('client/products/search_price_2/3000000/5000000')}}">3.000.000 -> 5.000.000 </a></label><br>
                                    <label><a href="{{url('client/products/search_price_2/5000000/7000000')}}">5.000.000 -> 7.000.000 </a></label><br>
                                    <label><a href="{{url('client/products/search_price_2/7000000/10000000')}}">7.000.000 -> 10.000.000 </a></label><br>
                                    <label class="mb-0"><a href="{{url('client/products/search_price/10000000')}}"> Trên 10.000.000</a></label><br>
                                  
                                </form>
                            </aside>
                            
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">Sản phẩm mới</h6>
                                 @foreach($list_nine_newproduct as $list)
                               
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{url('client/products/Detail_product',$list->id)}}">
                                            <img src="{{url('public/img/admin/product/',$list->image)}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{url('client/products/Detail_product',$list->id)}}">{{$list->name}}</a>
                                        </h6>
                                           @if($list->promotion_price!=0)
                                        <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
                                        <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
                                        @else
                                         <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
                            
                                        @endif
                                    </div>
                                </div>
                                <!-- product-item end -->
                                
                                @endforeach         
                                                            
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </div>
        <!-- End page content -->
@endsection