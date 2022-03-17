 @extends('client.layout.master')
@section('content')

 <!-- START SLIDER AREA -->
        <div class="slider-area  plr-185  mb-80">
            <div class="container-fluid">
                <div class="slider-content">
                    <div class="row">
                        <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                        
                            @foreach($list_all_slider as $list)
                            <!-- layer-1 Start -->
                            <div class="col-md-12" >
                                <div class="layer-1" >
                                    <div class="slider-img" >
                                       <img src="{{url('public/img/admin/slides/',$list->image)}}"  alt="" >
                                    </div>
                                    
                                </div>
                                <div class="slider-info">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1" style="font-weight: bold;">{{$list->name}}</h1>
                                            <div class="slider-brief text-black-2">
                                                <p>{{$list->description}}</p>
                                            </div>
                                           
                                        </div>
                                    </div>
                            </div>
                           
                            <!-- layer-1 end -->
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SLIDER AREA -->
 <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- BY BRAND SECTION START-->
            <div class="by-brand-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Tạp chí sức khỏe</h2>
                               
                            </div>
                        </div>
                    </div>
                    <div class="by-brand-product">
                        <div class="row active-by-brand slick-arrow-2">
                      
                            @foreach($list_all_taxonomy as $list)
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="{{url('public/img/admin/taxonomy/',$list->image)}}" alt="" style="height: 200px;"></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="{{url('client/taxonomys/list_taxonomy',$list->id)}}" > {{$list->name}} </a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- BY BRAND SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Sản phẩm mới</h2>
                                  

                                 <h6> Hiển thị <span style="color: red; font-weight: bold;">
                                  {{count($list_all_newProduct_status_1)}}
                                 </span> sản phẩm</h6>
                                   
                            </div>
                        </div>
                    </div>
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            @foreach($list_all_newProduct as $list)
                                @if($list->inventory_number>0)
                                     @if($list->status==1)
                                         @if($list->promotion_price>0)
                                    <div class="col-xs-12">
                                       <div class="banner-item banner-1">
                                        <div class="ribbon-price">
                                            <span style="position: relative; top:10px; left:5px;">{{number_format((($list->unit_price-$list->promotion_price)/$list->unit_price)*100 )}} %</span>
                                        </div>
                                        <div class="product-item">
                                            <div class="product-img">
                                                 <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info" >
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                 <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                              
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                       <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                            
                                                <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
                                                <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
                                               
                                              
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                       <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                    <!-- product-item end -->
                                    @else
                                     <div class="col-xs-12">
                                      
                                        <div class="product-item">
                                            <div class="product-img">
                                                 <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info" >
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                 <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                              
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                       <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                                
                                                <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
                                                </br>
                                                  </br>
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                       <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <!-- product-item end -->
                                    @endif
                                @endif
                            @endif
                        @endforeach
                                        <!-- product-item end -->

                        </div>
                       
                    </div>          
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->


            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Khuyến mãi</h2>
                                <h6> Hiển thị <span style="color: red; font-weight: bold;">{{count($list_all_promotionprice)}}</span> sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                         @foreach($list_all_promotionprice as $list)
                        
                             @if($list->inventory_number>0)
                          
                            <div class="col-xs-12">
                                 <div class="banner-item banner-1">
                                    <div class="ribbon-price">
                                        <span style="position: relative; top:10px; left:5px;">{{number_format((($list->unit_price-$list->promotion_price)/$list->unit_price)*100 )}} %</span>
                                    </div>
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{url('client/products/Detail_product',$list->id)}}">
                                            <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title" style="padding: 20px;">
                                            <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                        </h6>
                                        i
                                        <div class="pro-rating">
                                               @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                 <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                              
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                       <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                        @endif
                                        <ul class="action-button">
                                           
                                            <li>
                                                <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                     
                    @endforeach
                            <!-- product-item end -->
                           
                        </div>
                        
                    </div>          
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->
          
             <!-- PRODUCT TAB SECTION START -->
            <div class="product-tab-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Tất cả sản phẩm</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="pro-tab-menu text-right">
                                <!-- Nav tabs -->
                                <ul class="" >
                                    <li class="active"><a href="#popular-product" data-toggle="tab">Sản phẩm phổ biến </a></li>
                                    <li><a href="#new-arrival" data-toggle="tab">Sản phẩm mới</a></li>
                                    <li><a href="#best-seller"  data-toggle="tab">Sản phẩm khuyến mãi</a></li>
                                    
                                </ul>
                            </div>                       
                        </div>
                    </div>
                    <div class="product-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- popular-product start -->
                            <div class="tab-pane active" id="popular-product">
                                <div class="row">
                                @foreach($list_product as $list)
                                    @if($list->inventory_number>0)
                                      @if($list->promotion_price>0)
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                         <div class="banner-item banner-1">
                                    <div class="ribbon-price">
                                        <span style="position: relative; top:10px; left:5px;">{{number_format((($list->unit_price-$list->promotion_price)/$list->unit_price)*100 )}} %</span>
                                    </div>
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                 @if($list->promotion_price!=0)
                                                <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
                                                <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
                                                @else
                                                <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
                                                @endif
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- product-item end -->
                                   
                                   
                                    <!-- product-item end -->
                                    @else
                                     <div class="col-md-3 col-sm-4 col-xs-12">
                                      
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                 @if($list->promotion_price!=0)
                                                <h3 class="pro-price">{{number_format($list->promotion_price)}} đồng</h3>
                                                <h3 class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($list->unit_price)}} đồng</h3>
                                                @else
                                                <h3 class="pro-price">{{number_format($list->unit_price)}} đồng</h3>
                                                @endif
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                        <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                               
                                    @endif
                                @endif
                                @endforeach
                                </div>
                            </div>
                            <!-- popular-product end -->
                            <!-- new-arrival start -->
                            <div class="tab-pane" id="new-arrival">
                                <div class="row">
                                    <!-- product-item start -->
                                      @foreach($list_all_newProducts as $list)
                                        @if($list->status==1)
                                         @if($list->inventory_number>0)
                                          @if($list->promotion_price>0)
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                       <div class="banner-item banner-1">
                                        <div class="ribbon-price">
                                            <span style="position: relative; top:10px; left:5px;">{{number_format((($list->unit_price-$list->promotion_price)/$list->unit_price)*100 )}} %</span>
                                        </div>
                                        <div class="product-item">
                                            <div class="product-img">
                                                 <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info" >
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                 <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                              
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                       <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                                @endif
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                       <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                    <!-- product-item end -->
                                    @else
                                     <div class="col-md-3 col-sm-4 col-xs-12">
                                      
                                        <div class="product-item">
                                            <div class="product-img">
                                                 <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info" >
                                                <h6 class="product-title">
                                                     <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                 <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                              
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                     <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                       <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                                @endif
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                       <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <!-- product-item end -->
                                    @endif
                                    @endif
                                    @endif
                                @endforeach
                                </div>
                                {{$list_all_newProducts->links()}}                                        
                            </div>
                            <!-- new-arrival end -->
                            <!-- best-seller start -->
                            <div class="tab-pane" id="best-seller">
                                <div class="row">
                                  @foreach($list_four_promotionproduct as $list)
                                   @if($list->inventory_number>0)
                                    @if($list->promotion_price>0)
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                         <div class="banner-item banner-1">
                                        <div class="ribbon-price">
                                            <span style="position: relative; top:10px; left:5px;">{{number_format((($list->unit_price-$list->promotion_price)/$list->unit_price)*100 )}} %</span>
                                        </div>
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{$list->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                   @if($list->sodiem<0 || $list->sodiem=='')
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=0 && $list->sodiem<1 )
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=1 && $list->sodiem<2 )
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=2 && $list->sodiem<3 )
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                  <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                      <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                @elseif($list->sodiem>=3 && $list->sodiem<4 )
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    
                                                @elseif($list->sodiem>=4 && $list->sodiem<5 )
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
                                                @endif
                                                <ul class="action-button">
                                                   
                                                    <li>
                                                        <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- product-item end -->
                                     @endif
                                    @endif
                                  
                                @endforeach
                                </div>  
                                 {{$list_four_promotionproduct->links()}}                                       
                            </div>
                            <!-- best-seller end -->
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT TAB SECTION END -->
                   
                          
        </section>
        <!-- End page content -->
@endsection