@extends('client.layout.master')
@section('content')

    
     <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- UP COMMING PRODUCT SECTION START -->
            <div class="up-comming-product-section mb-80">
                <div class="container">
                    <div class="row">
                        <!-- up-comming-pro -->
                        <div class="col-md-8 col-sm-12 col-xs-12">
                             <div class="banner-item banner-1">
                                  <div class="ribbon-price">
                                    <span>{{$list_all_Category->name}}</span>
                                </div>
                                 <div class="banner-img">
                                        <img src="{{url('public/img/admin/category_banner/',$list_all_Category->image_banner)}}" style="height: 500px; width: 1150px;" alt="">
                                    </div>
                            </div>
                        </div>
                      
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- UP COMMING PRODUCT SECTION END -->

            <!-- BY BRAND SECTION START-->
            <div class="by-brand-section mb-80">
                <div class="container">
                   
                    <div class="by-brand-product">
                        <div class="row active-by-brand slick-arrow-2">
                            @foreach($list_all_Taxonomy as $list)
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
                    @foreach($list_replycontact as $value)
                    @if($value->loai==0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">

                                <h2 class="uppercase"> {{$value->name}}</h2>
                              
                                Hiển thị <span style="color: red; font-weight: bold;">{{$value->sosanpham}}</span> sản phẩm 

                            </div>
                        </div>
                    </div>
                     @elseif($value->loai==1)
                    <!-- product-item start -->
                    @if($value->inventory_number>0)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="product-item">
                            <div class="product-img">
                                <a href="{{url('client/products/Detail_product',$value->id)}}">
                                    <img src="{{url('public/img/admin/product',$value->image)}}"  alt=""/>
                                </a>
                            </div>
                            <div class="product-info" style="height: 220px;">
                                <h6 class="product-title">
                                    <a href="{{url('client/products/Detail_product',$value->id)}}" style="padding: 10px;">{{$value->name}}</a>
                                </h6>
                                <div class="pro-rating">
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                </div>
                                @if($value->promotion_price != 0)
                                 <h3 class="pro-price" >({{number_format($value->promotion_price)}} )đồng</h3>
                                <h3 class="pro-price" style="text-decoration: line-through;">{{number_format($value->unit_price)}} đồng </h3>
                                 @else
                                   <h3 class="pro-price">{{number_format($value->unit_price)}} đồng</h3>
                               </br>
                                </br>
                                   @endif
                                <ul class="action-button">
                                    <li>
                                        <a href="{{url('client/products/add_cart',$value->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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
        
            <!-- FEATURED PRODUCT SECTION END -->
            
            
          
            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">

                                <h2 class="uppercase">Tin tức</h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="row active-blog">
                            <!-- blog-item start -->
                            @foreach($list_all_posts as $list)
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{($firstimage[$list->id]==''?url('public/img/noimage.png'):$firstimage[$list->id])  }}" alt="" style="height: 350px;">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="single-blog.html">{{ $list->Taxonomy->name }}</a></h5>
                                        <h6>{{$list->post_title}}</h6>
                                        <p >{{Str::limit($list->post_excerpt, 100)}}</p>
                                         <div class="mb-1 text-muted" style="font-family: Arial; color: white;">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $list->created_at)->format('d/m/Y H:i') }}</div>
                                        <div class="read-more">
                                            <a href="{{url('client/posts/details_posts',$list->id)}}">Xem</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li>
                                                  <p class="small text-muted mb-1" style="font-family: Arial;">{{ $list->post_views }} lượt xem.</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->                
        </section>
        <!-- End page content -->
@endsection