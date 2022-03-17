 @extends('client.layout.master')

@section('jsfooter')
<script src="{{asset('./public/js/jquery.etalage.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('./public/css/etalage.css')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
    $(function(){
      $(".f1 a").click(function(){
        let $this = $(this);

        if($this.hasClass('active'))
        {
          $this.parents('.f1').find('input').attr('type','password')
          $this.removeClass('active');
        }else{
           $this.parents('.f1').find('input').attr('type','text')
            $this.addClass('active')
        }
      });
    });
</script>
<script >

  $(document).ready(function(){

      $('.view_answer_comment_show').click(function(){
          $('.view_answer_comment_hide').show();
          $('.view_answer_comment_show').hide();



          //Hiện thị trả lời cửa chủ cửa hàng
          var id_comment=$(this).data('id');
          $.get("{{url('client/ajax/answer_comment')}}/"+id_comment,function(data){
                $(".container_answer_comment_"+id_comment).html(data);
                $(".container_answer_comment_"+id_comment).show();

                
          });
      });
      $('.view_answer_comment_hide').click(function(){
         $('.view_answer_comment_show').show();
          $('.view_answer_comment_hide').hide();
         

           //Hiện thị trả lời cửa chủ cửa hàng
          var id_comment=$(this).data('id');
          $.get("{{url('client/ajax/answer_comment')}}/"+id_comment,function(data){
                $(".container_answer_comment_"+id_comment).html(data);
                $(".container_answer_comment_"+id_comment).hide();
                


          });

      });
  });
</script>

@endsection
@section('content')
     <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-weight: bold;">CHI TIẾT SẢN PHẨM</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li>Chi tiết sản phẩm</li>
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

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                           <img id="zoom_03" src="{{url('public/img/admin/product/',$product->image)}}" data-zoom-image="{{url('public/img/admin/product/',$product->image)}}" alt="">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                       @foreach($list_all_imageproduct as $list)
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{url('public/img/admin/image_products/',$list->image)}}" data-zoom-image="{{url('public/img/admin/image_products/',$list->image)}}">
                                                                <img class="zoom_03" src="{{url('public/img/admin/image_products/',$list->image)}}" alt="">
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                                        <div class="single-product-info">
                                           <h3 class="text-black-1" style="font-family: Arial;">{{$product->name}}
                                           @if($product->VAT==0)
                                           <span style="color: red; font-size: 13px;">(Chưa có VAT)</span> 
                                           @else
                                           <span style="color: green;  font-size: 13px;">(Đã có VAT)</span>
                                           @endif
                                            </h3>

                                           @if($product->status==1)
                                           <p style="background-color: red; color: white; width: 50px; text-align: center; border-radius: 10px;">Mới</p>
                                          
                                           @endif
                                        
                                            <!--  hr -->
                                            <hr>
                                             <p>Màu: <span>{{$product->color_product->name}}</span></p>
                                             <!-- single-pro-color-rating -->
                                            <div class="single-pro-color-rating clearfix">
                                                
                                                <div class="pro-rating sin-pro-rating f-left">
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
                                            <!-- hr -->
                                           </hr>
                                           <!-- plus-minus-pro-action -->
                                            <div class="plus-minus-pro-action clearfix">
                                               @if(Auth::check())
                                                @if(Auth::guard('account')->user()->right==0)
                                               <form action="{{url('client/products/addcart_2')}}" method="post" >
                                                  @csrf 
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <div class="sin-plus-minus f-left clearfix">
                                                   
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" title="Qty" value="1" name="quantity" min="1" step="1" class="cart-plus-minus-box">
                                                    </div> 
                                                    
                                                </div>
                                                <div class="sin-plus-minus f-right clearfix">
                                                     <button type="submit" style="background-color: #6E6E6E; color: white;  height: 40px; width: 150px; border-radius: 5px;" ><i class="zmdi zmdi-shopping-cart-plus"></i> 
                                                    Thêm vào giỏ
                                                    </button>  
                                                </div>
                                              </form>
                                            @else
                                             <div class="sin-plus-minus f-left clearfix">
                                                   
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div> 
                                                    
                                                </div>
                                              <div class="sin-plus-minus f-right clearfix">
                                                <div>
                                              <!-- Button trigger modal -->
                                            <button type="button" style="background-color: #6E6E6E; color: white; height: 40px; width: 150px;" data-toggle="modal" data-target="#exampleModal">
                                            Thêm vào giỏ
                                            </button>
                                              
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="margin-top: 100px;" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                                                      <p>Hãy đăng nhập tài khoản khách hàng có thể mua hàng</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                     <form action="{{ url('client/accounts/login') }}" method="post">
                                                       {{ csrf_field() }}
                                                        @if(Session::has('notification'))
                                                          <div class="alert alert-danger alert-dismissible show " role="alert">
                                                            <strong> {{Session::get('notification')}}</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                        @endif
                                                      <!--end notification -->
                                                    <div class="login-account p-30 box-shadow">
                                                       <h5 style="font-family: Arial;">Tên đăng nhập</h5>
                                                        <input type="text" name="username" placeholder="Hãy nhập tên đăng nhập">
                                                         @if($errors->has('username'))
                                                              <div class="error-text">
                                                                  {{$errors->first('username')}}
                                                              </div>
                                                          @endif
                                                        <h5 style="font-family: Arial;">Mật khẩu</h5>
                                                         <div class="f1">
                                                        <input type="password" name="password" placeholder="Hãy nhập mật khẩu"><a href="javascript:;void(0)" style="position: absolute; bottom: 105px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                         </div>
                                                         @if($errors->has('password'))
                                                      
                                                              <div class="error-text">
                                                                  {{$errors->first('password')}}
                                                              </div>
                                                          @endif
                                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                                    </div>
                                                </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                          </div>
                                                 @endif
                                                @else
                                                 <div class="sin-plus-minus f-left clearfix">
                                                   
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div> 
                                                    
                                                </div>
                                              <div class="sin-plus-minus f-right clearfix">
                                                 <div>  
                                              <!-- Button trigger modal -->
                                            <button type="button" style="background-color: #6E6E6E; color: white;  height: 40px; width: 150px; border-radius: 5px;" data-toggle="modal" data-target="#exampleModal">
                                            Thêm vào giỏ
                                            </button>
                                             
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="margin-top: 100px;" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                                                      <p>Hãy đăng nhập tài khoản khách hàng có thể mua hàng</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                     <form action="{{ url('client/accounts/login') }}" method="post">
                                                       {{ csrf_field() }}
                                                        @if(Session::has('notification'))
                                                          <div class="alert alert-danger alert-dismissible show " role="alert">
                                                            <strong> {{Session::get('notification')}}</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                        @endif
                                                      <!--end notification -->
                                                    <div class="login-account p-30 box-shadow">
                                                       <h5 style="font-family: Arial;">Tên đăng nhập</h5>
                                                        <input type="text" name="username" placeholder="Hãy nhập tên đăng nhập">
                                                         @if($errors->has('username'))
                                                              <div class="error-text">
                                                                  {{$errors->first('username')}}
                                                              </div>
                                                          @endif
                                                        <h5 style="font-family: Arial;">Mật khẩu</h5>
                                                       <div class="f1">
                                                        <input type="password" name="password" placeholder="Hãy nhập mật khẩu"><a href="javascript:;void(0)" style="position: absolute; bottom: 105px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                         </div>
                                                         @if($errors->has('password'))
                                                              <div class="error-text">
                                                                  {{$errors->first('password')}}
                                                              </div>
                                                          @endif
                                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                                    </div>
                                                </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                          </div>
                                            @endif
                                            </div>
                                            <!-- plus-minus-pro-action end -->

                                           </br>
                                            <!-- single-product-price -->
                                            @if($product->promotion_price!=0)
                                               <p><span style="font-weight: bold;">Giá khuyến mãi:</span>  {{number_format($product->promotion_price)}} đồng</p> 
                                                <p><span style="font-weight: bold;">Giá gốc:</span> <span class="pro-price" style="text-decoration:line-through; color: #000">{{number_format($product->unit_price)}} đồng</span> </p>
                                                @else
                                                <p><span style="font-weight: bold;">Giá:</span>  {{number_format($product->unit_price)}} đồng </p> 
                                          
                                             @endif
                                             
                                             @if($product->promotion_price!=0)
                                             <p><span style="font-weight: bold;">Tiết kiệm:  </span>
                                              {{number_format($product->unit_price-$product->promotion_price)}} đồng
                                              {{number_format((($product->unit_price-$product->promotion_price)/$product->unit_price)*100 )}} %
                                               </p>
                                               @endif
                                                <hr>
                                              
                                                  @if($product->inventory_number>0)
                                                  <p><i class="zmdi zmdi-assignment-check" style="color: green;"></i> <span style="font-weight: bold;">Trạng thái:</span> Còn hàng</p> 
                                                  @else
                                                   <p><i class="zmdi zmdi-close-circle" style="color: red;"></i> <span style="font-weight: bold;"> Trạng thái:</span> Hết hàng </p>
                                                  @endif
                                               
                                                @if($product->Guarantee==null)
                                                @else
                                                <p> <i class="zmdi zmdi-assignment-check" style="color: green;"></i> <span style="font-weight: bold;">Bảo hành:</span> {{$product->Guarantee}} tháng</p>
                                                @endif
                                                 @if($product->Origin==null)
                                                @else
                                                <p> <i class="zmdi zmdi-assignment-check" style="color: green;"></i> <span style="font-weight: bold;"> Xuất xứ:</span> {{$product->Origin}}</p>
                                                @endif
                                                  @if($product->Trademark==null)
                                                @else
                                                <p> <i class="zmdi zmdi-assignment-check" style="color: green;"></i> <span style="font-weight: bold;"> Thương hiệu:</span> {{$product->Trademark}}</p>
                                              @endif
                                              
                                                 <hr>
                                             <p><img src="{{asset('public/img/logo/logo6.png')}}">Đặt hàng online được miễn phí giao hàng toàn quốc áp dụng cho đơn trên 600.000đ.</p>
                                             <p><img src="{{asset('public/img/logo/logo7.png')}}">Chấp nhận phương thức thanh toán Ship COD</p>
                                              <p><img src="{{asset('public/img/logo/logo8.png')}}">Chính sách giao hàng:</p>
                                             <p>• Khu vực nội thành TP.HCM, Hà Nội, Đà Nẵng: Có thể yêu cầu nhận hàng trong ngày.
                                               </br>   • Khu vực khác: Giao hàng nhanh theo hình thức COD qua Viettel Post, GHN, J&T Express từ 1-2 ngày (tùy vào đơn vị vận chuyển).</p>
                                               <p style="color: red; font-weight: bold;"><img src="{{asset('public/img/logo/logo9.png')}}">  Nhằm hạn chế ảnh hưởng của dịch COVID-19, Siêu Thị Y Tế khuyến khích quý khách hàng chọn phương án đặt hàng online giao hàng tận nhà. Chúng tôi cam kết giao hàng đúng hẹn!</p>
                                            <!--  hr -->
                                             <hr>
                                      
                                        </div>    
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- hr -->
                                        <hr>
                                        <div class="single-product-tab">
                                            <ul class="reviews-tab mb-20">
                                                <li  class="active"><a href="#description" data-toggle="tab">Thông tin sản phẩm</a></li>
                                                <li ><a href="#information" data-toggle="tab">Thông số kỹ thuật</a></li>
                                                
                                                <li ><a href="#reviews" data-toggle="tab">Bình luận</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="description">
                                                    <p>{!!$product->describe!!}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="information">
                                                     @if($product->tech_product!=null)
                                                     <div class="border p-2" class="tech_product">
                                                       {!! $product->tech_product !!}
                                                   </div>
                                                    @endif
                                                    <p><span style="font-weight: bold;">Tên nhà cung cấp:</span> {{$product->provider->name}}</p>
                                                    <p><span style="font-weight: bold;">Địa chỉ liên hệ:</span>  {{$product->provider->address}}</p>
                                                      <p><span style="font-weight: bold;"> Số điện thoại: </span>{{$product->provider->phone}}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                     @if(Auth::guard('account')->check())
                                                        @if(Auth::guard('account')->user()->right==0)
                                                            <form action="{{ url('client/comments/create') }}" method="post">
                                                                {{ csrf_field() }}
                                                                 <div class="row">
                                                                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="content" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <button type="submit" class="btn btn-primary">Thêm Câu Hỏi</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @elseif(Auth::guard('account')->user()->right==1)
                                                            <p class="text-center">Quản trị viên không được quyền bình luận</p>
                                                        @else
                                                             <p class="text-center">Nhân viên không được quyền bình luận</p>
                                                        @endif
                                                    @else
                                                        <p class="text-center">Đăng nhập mới có thể thêm câu hỏi</p>
                                                      
                                                    @endif
                                                    <!-- reviews-tab-desc -->
                                                    <div class="reviews-tab-desc"    style="  width: 850px;
                                                      height: 300px;
                                                      
                                                      overflow-x: hidden;
                                                      overflow-y: scroll;">
                                                        <!-- single comments -->
                                                @if(count($list_all_comment)!=0)
                                                 <!--Kiểm tra tài khoản có đăng nhập ko-->
                                                 @if(Auth::guard('account')->check())
                                                    <!--Quyền hạn của tài khoản đăng nhập là khách hàng-->
                                                    @if(Auth::guard('account')->user()->right==0)
                                                        @foreach($list_all_comment as $list)
                                                                         <!--
                                                            Có 3 quyền:Khách hàng:right=0
                                                                       Quản trị:right=1
                                                                       Nhân viên:right=2

                                                        -->
                                                        <!--danh sách bình luận nếu là khách hàng-->
                                                        @if($list->accounts->right==0)
                                                        <div class="media mt-30" >
                                                            <div class="media-left">
                                                                <a href="#"> 
                                                            @if($list->accounts->users->image=="")
                                                                 <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                            @else
                                                                <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                            @endif</a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Khách hàng)</a></h6>
                                                                        <p class="mb-10">{{$list->created_at}}</p>
                                                                    </div>
                                                                    <div class="pull-right" style="margin-right: 10px;">
                                                                            <ul class="reply-delate">
                                                                              <li><a href="{{url('client/products/delete_comment',$list->id)}}"><i class="zmdi zmdi-close"></i></a></li>
                                                                            </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0"> {{$list->content  }}</p>
                                                            </div>
                                                        </div>
                                                         <div class="container_answer_comment_{{ $list->id }} d-none"></div>
                                                <!-- Large modal -->

                                                                <button type="button" class="view_answer_comment_show m-1" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                                <button type="button" class="view_answer_comment_hide m-2 d-none" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                        @elseif($list->accounts->right==1)
                                                         <div class="media mt-30" >
                                                            <div class="media-left">
                                                                <a href="#"> 
                                                            @if($list->accounts->users->image=="")
                                                                 <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                            @else
                                                                <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                            @endif</a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Quản trị viên)</a></h6>
                                                                        <p class="mb-10">{{$list->created_at}}</p>
                                                                    </div>
                                                                    <div class="pull-right" style="margin-right: 10px;">
                                                                            <ul class="reply-delate">
                                                                              <li><a href="{{url('client/products/delete_comment',$list->id)}}"><i class="zmdi zmdi-close"></i></a></li>
                                                                            </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0"> {{$list->content  }}</p>
                                                            </div>
                                                        </div>
                                                        @else
                                                          <div class="media mt-30" >
                                                            <div class="media-left">
                                                                <a href="#"> 
                                                            @if($list->accounts->users->image=="")
                                                                 <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                            @else
                                                                <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                            @endif</a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Nhân Viên)</a></h6>
                                                                        <p class="mb-10">{{$list->created_at}}</p>
                                                                    </div>
                                                                    <div class="pull-right" style="margin-right: 10px;">
                                                                            <ul class="reply-delate">
                                                                              <li><a href="{{url('client/products/delete_comment',$list->id)}}"><i class="zmdi zmdi-close"></i></a></li>
                                                                            </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0"> {{$list->content  }}</p>
                                                            </div>
                                                        </div>
                                                        @endif


                                                      @endforeach
                                                    @else
                                                        @foreach($list_all_comment as $list)
                                                            @if($list->accounts->right==0)
                                                               @if($list->status==0)
                                                            <div class="media mt-30" >
                                                                <div class="media-left">
                                                                    <a href="#"> 
                                                                @if($list->accounts->users->image=="")
                                                                     <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                                @else
                                                                    <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                                @endif</a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Khách hàng)</a><span class="font-weight-bold "> Chưa có trả lời khách hàng</span></h6>
                                                                            <p class="mb-10">{{$list->created_at}}</p>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <ul class="reply-delate">
                                                                                <li> <button onclick="document.getElementById('model_{{$list->id}}').style.display='block'" class="w3-button w3-red">Trả Lời</button></li>
                                                                                
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0"> {{$list->content  }}</p>
                                                                </div>
                                                            </div>
                                                               @else
                                                               <div class="media mt-30">
                                                                <div class="media-left">
                                                                    <a href="#"> 
                                                                    @if($list->accounts->users->image=="")
                                                                         <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                                    @else
                                                                        <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                                    @endif</a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Khách hàng)</a><span class="font-weight-bold "> Đã trả lời khách hàng</span></h6>
                                                                            <p class="mb-10">{{$list->created_at}}</p>
                                                                        </div>
                                                                        <div class="pull-right">
                                                                            <ul class="reply-delate">
                                                                                <li> <button onclick="document.getElementById('model_{{$list->id}}').style.display='block'" class="w3-button w3-red">Trả Lời</button></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0"> {{$list->content  }}</p>
                                                                </div>
                                                            </div>
                                                                @endif
                                                                 <div class="container_answer_comment_{{ $list->id }} d-none"></div>
                                                <!-- Large modal -->

                                                                <button type="button" class="view_answer_comment_show m-1" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                                <button type="button" class="view_answer_comment_hide m-2 d-none" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                                 <div id="model_{{$list->id}}" class="w3-modal">
                                                                <div class="w3-modal-content">
                                                                  <div class="w3-container">
                                                                    <span onclick="document.getElementById('model_{{$list->id}}').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                                                    <h3>Trả Lời Câu Hỏi Của Khách Hàng</h3>
                                                                    <div class="modal-body">
                                                                     <div class="w-100 mt-3 border ">
                                                                        <div class="w-100 p-2">
                                                                            @if($list->accounts->users->image=="")
                                                                                 <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:50px;height: 50px;" class="rounded-circle border mr-2">{{ $list->accounts->users->name }}(Khách hàng)

                                                                            @else
                                                                                <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:50px;height: 50px;" class="rounded-circle border mr-2">{{ $list->accounts->users->name }}(Khách hàng)
                                                                            @endif

                                                                            <div class=" rounded p-3 mt-1 border" style="background-color:white; ">
                                                                                  {{$list->content  }}
                                                                            </div>
                                                                        </div>
                                                                     </div>
                                                                     <form action="{{ url('client/answer_comment/create') }}" method="post">
                                                                            {{ csrf_field() }}
                                                                            <label class="pl-3" >Trả lời câu hỏi </label>
                                                                             <div class="container-fluid">
                                                                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                                                                <input type="hidden" name="id_comment" value="{{ $list->id }}">
                                                                                <input type="text" name="content" class="form-control p-3">
                                                                            </div>
                                                                            <br/>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary">Gửi</button>
                                                                                <button type="button" class="btn btn-secondary" onclick="document.getElementById('model_{{$list->id}}').style.display='none'">Đóng</button>
                                                                            </div>
                                                                      </form>
                                                                  </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            @elseif($list->accounts->right==1)
                                                            <div class="media mt-30" >
                                                                <div class="media-left">
                                                                    <a href="#"> 
                                                                @if($list->accounts->users->image=="")
                                                                     <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                                @else
                                                                    <img src="{{ url('./public/img/admin/accounts',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                                @endif</a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Quản trị viên)</a></h6>
                                                                            <p class="mb-10">{{$list->created_at}}</p>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <p class="mb-0"> {{$list->content  }}</p>
                                                                </div>
                                                            </div>
                                                            @else
                                                                    <div class="media mt-30" >
                                                                <div class="media-left">
                                                                    <a href="#"> 
                                                                @if($list->accounts->users->image=="")
                                                                     <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                                @else
                                                                    <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                                @endif</a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="clearfix">
                                                                        <div class="name-commenter pull-left">
                                                                            <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Nhân viên)</a></h6>
                                                                            <p class="mb-10">{{$list->created_at}}</p>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <p class="mb-0"> {{$list->content  }}</p>
                                                                </div>
                                                            </div>
                                                                @endif
                                                            @endforeach

                                                        @endif
                                                @else
                                                   @foreach($list_all_comment as $list)
                                                     <div class="media mt-30" >
                                                            <div class="media-left">
                                                                <a href="#"> 
                                                            @if($list->accounts->users->image=="")
                                                                 <img src="{{ url('./public/img/logo/logo2.png') }}"  style="width:30px;height: 30px;" class="rounded-circle border mr-2">
                                                            @else
                                                                <img src="{{ url('./public/img/admin/customer',$list->accounts->users->image) }}" style="width:30px;height: 30px;" class="rounded-circle border mr-2"> 
                                                            @endif</a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">{{$list->accounts->users->name }}(Khách hàng)</a></h6>
                                                                        <p class="mb-10">{{$list->created_at}}</p>
                                                                    </div>
                                                                   
                                                                </div>
                                                                <p class="mb-0"> {{$list->content  }}</p>
                                                            </div>
                                                        </div>
                                                         <div class="container_answer_comment_{{ $list->id }} d-none"></div>
                                                <!-- Large modal -->

                                                                <button type="button" class="view_answer_comment_show m-1" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                                <button type="button" class="view_answer_comment_hide m-2 d-none" data-id="{{ $list->id}}">Xem/Ẩn Câu Trả Lời</button>
                                                     @endforeach 
                                                @endif
                                            @else
                                                <p class="text-center font-weight-bold">Chưa có bình luận</p>
                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- single-product-area end -->
                            <div class="related-product-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title text-left mb-40">
                                            <h2 class="uppercase">Sản phẩm cùng loại</h2>
                                         
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-related-product">
                                       
                                        @foreach($list_all_product_tuongtu as $list)
                                        <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="{{url('client/products/Detail_product',$list->id)}}">
                                                        <img src="{{url('public/img/admin/product',$list->image)}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html" style="padding: 10px; font-family: Arial;">{{Str::words($list->name,6,'...')}}</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">{{($list->promotion_price=="")?number_format($list->unit_price ):number_format($list->promotion_price)}} đồng</h3>
                                                    <ul class="action-button">
                                                        
                                                        <li>
                                                            <a href="{{url('client/products/add_cart',$list->id)}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                       @endforeach
                                      
                                      
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <!-- widget-search -->
                          <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20" style="font-weight: bold;"> Hệ thống chi nhánh</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                       <li>
                                            <h5 style="font-weight: bold;"><i class="zmdi zmdi-home"></i> TP.HCM</h5>
                                        </li> 
                                        <li>
                                          <p>• 241 Nguyễn Văn Lượng, Phường 10, Quận Gò Vấp, Thành phố Hồ Chí Minh</p>
                                        </li>  
                                         <li>
                                          <p>• 28 Nguyễn Giản Thanh, P.15, Q.10, Hồ Chí Minh</p>
                                        </li> 
                                         <li>
                                          <p>• 355 Nguyễn Thiện Thuật, P.1, Quận 3, Hồ Chí Minh</p>
                                        </li> 
                                         <li>
                                          <p>• 118 Nguyễn Văn Đậu, P.7, Q.Bình Thạnh, Hồ Chí Minh</p>
                                        </li> 
                                         <li>
                                          <p>• 156A Cây Keo, P.Hiệp Tân, Q.Tân Phú, Hồ Chí Minh</p>

                                        </li> 
                                         <li>
                                            <h5 style="font-weight: bold;"><i class="zmdi zmdi-home"></i> ĐÀ NẴNG</h5>
                                        </li> 
                                        <li>
                                          <p>• 195 Hải Phòng, Tân Chính, Q.Thanh Khê</p>
                                        </li> 
                                         <li>
                                            <h5 style="font-weight: bold;"><i class="zmdi zmdi-home"></i> HÀ NỘI</h5>
                                        </li>    
                                        <li>
                                          <p>• 64/10 Phố Nguyễn Văn Trỗi, P.Phương Liệt, Q.Thanh Xuân, Hà Nội</p>
                                        </li> 
                                          <li>
                                          <p>• 26C Phùng Hưng, Q.Hoàn Kiếm, Hà Nội</p>
                                        </li>                                
                                    </ul>
                                </div>
                            </aside>
                            <aside class="widget widget-categories box-shadow mb-30">
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                       <li>
                                            <p style="color: blue;"><img src="{{asset('public/img/logo/logo-icon-1.png')}}"> Hoàn tiền 150% nếu phát hiện hàng giả</p>
                                        </li> 
                                        <li>
                                            <p style="color: green;"><img src="{{asset('public/img/logo/logo-icon-2.png')}}"> Bảo hành nhanh chóng</p>
                                        </li>  
                                        <li>
                                            <p style="color: orange;"><img src="{{asset('public/img/logo/logo-icon-3.png')}}"> Cam kết hàng chính hãng 100%</p>
                                        </li>  
                                        <li>
                                            <p style="color: violet;"><img src="{{asset('public/img/logo/logo-icon-4.png')}}"> Free ship đơn hàng trên 600K</p>
                                        </li>                   
                                    </ul>
                                </div>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Danh mục sản phẩm</h6>
                                <div id="cat-treeview" class="product-cat">
                                    @foreach($list_all_category as $value)
                                    @if(count($value->type_product)>0)
                                    <ul>
                                        <li class="closed"><a href="#">{{$value->name}}</a>
                                            <ul>
                                                 @foreach($value->type_product as $list)
                                                <li><a href="{{ url('client/products/list_product_type',$list->id) }}">{{$list->name}}</a></li>
                                               @endforeach
                                            </ul>
                                        </li>                                       
                                       
                                    </ul>
                                    @endif
                                    @endforeach
                                </div>
                            </aside>
                          
                           <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">Sản phẩm khuyến mãi</h6>
                                @foreach($list_all_product_tuongtu as $list)
                                @if($list->promotion_price!=0)
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
                                    </br>
                                </br>
                                       
                                        @endif
                                    </div>
                                </div>
                                <!-- product-item end -->
                                @endif
                                @endforeach                           
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
@endsection