  @extends('client.layout.master')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">TÌM KIẾM SẢN PHẨM</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li>Tìm kiếm sản phẩm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END --> 

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- PRODUCT TAB SECTION START -->
            <div class="product-tab-section mb-50">
                <div class="container">
                   
                    <div class="product-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- popular-product start -->
                            <div class="tab-pane active" >
                                <div class="row">
                                	@foreach($list_all_product as $list)
                                    @if($list->inventory_number>0)
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                    <img src="{{url('public/img/admin/product/',$list->image)}}" style="height: 250px; width: 250px;" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info" style="height: 220px;">
                                                <h6>
                                                    <a href="{{url('client/products/Detail_product',$list->id)}}" style="font-family: Arial;">{{Str::limit($list->name, 50)}}</a>
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
                                                @if($list->promotion_price != 0)
                                                     <h3 class="pro-price" >({{number_format($list->promotion_price)}} )đồng</h3>
                                                    <h3 class="pro-price" style="text-decoration: line-through;">{{number_format($list->unit_price)}} đồng </h3>
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
                                    <!-- product-item end -->
                                    @endif
                                   @endforeach
                                </div>
                            </div>
                            <!-- popular-product end -->
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT TAB SECTION END -->              
        </section>
        <!-- End page content -->
@endsection