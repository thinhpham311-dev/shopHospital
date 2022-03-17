 @extends('client.layout.master')
 @section('jsfooter')
<script >
  $(document).ready(function(){
      $('.view').click(function(){
          var id_bill=$(this).data('id');
          $.get("{{url('client/ajax/bill_detail_me')}}/"+id_bill,function(data){
               /* alert(data);*/
                $('.model_bil_detail').html(data);
          });
          $('.model_'+id_bill).css('display','block');
      });
  });

</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
 @section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-weight: bold;">GIỎ HÀNG</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Giỏ hàng</li>
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
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart" data-toggle="tab">
                                        <span>01</span>
                                       	Giỏ hàng
                                    </a>
                                </li>
                                <li>
                                    <a href="#wishlist" data-toggle="tab">
                                        <span>02</span>
                                        Lịch sử mua hàng
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                         <form action="{{ url('client/products/update_cart') }}" method="post">
                                             @csrf
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                           <th class="product-thumbnail" style="font-family: Arial;">Tên sản phẩm</th>
                                                            <th class="product-price" style="font-family: Arial;">Giá bán</th>
                                                            <th class="product-quantity" style="font-family: Arial;">Số lượng</th>
                                                            <th class="product-subtotal" style="font-family: Arial;">Thành tiền</th>
                                                            <th class="product-remove" style="font-family: Arial;">Xóa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    	  @foreach($product_cart as $product)
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail text-center">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{url('./public/img/admin/product',$product['item']['image'])}}" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-center">
                                                                    <h6 class="product-title-2">
                                                                        <a href="{{url('client/products/Detail_product',$product['item']['id'])}}">{{$product['item']['name']}}</a>
                                                                    </h6>

                                                                </div>
                                                            </td>
                                                            <td class="product-price text-center"> 
                                                            	@if($product['item']['promotion_price']==0)
												                                            {{number_format($product['item']['unit_price']) }} đồng
												                                        @else
												                                            {{ number_format($product['item']['promotion_price']) }} đồng
												                                        @endif</td>
                                                            <td class="product-quantity text-center">
                                                                <div class="cart-plus-minus f-left">
                                                                    <input type="text" name="quantity_in_cart[{{$product['item']['id']  }}]" value="{{ $product['qty'] }}" class="cart-plus-minus-box">
                                                                </div> 
                                                            </td>
                                                            <td class="product-subtotal text-center">{{number_format($product['price']) }} đồng</td>
                                                            <td class="product-remove text-center">
                                                                <a href="{{url('client/products/delete_cart',$product['item']['id'])}}"><i class="zmdi zmdi-close"></i></a>

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                          
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="coupon-discount box-shadow p-30 mb-10" style="height: 200px;">
                                                        <h6 class="widget-title border-left mb-20" style="font-family: Arial;">Cập nhật giỏ hàng</h6>
                                                        <p style="font-family: Arial;">Cập nhật số lượng sản phẩm vào giỏ hàng</p>
                                                    </br>
                                                        <button class="submit-btn-1 black-bg btn-hover-2" type="submit" style="font-family: Arial;">Cập nhật</button>
                                                         <button class="submit-btn-1 black-bg btn-hover-2" style="font-family: Arial;">
                                                      <a href="{{url('/')}}" style="color: white;">   Mua tiếp </a></button>
                                                    </div>
                                                </div>
                                                  <div class="col-md-6" >
                                                    <div class="payment-details box-shadow p-30 mb-10" style="height: 200px;">
                                                        <h6 class="widget-title border-left mb-20">Chi tiết thanh toán</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Tổng tiền</td>
                                                                <td class="td-title-2"> 
                                                                @if(Session::has('cart'))
                            													                 {{number_format(Session('cart')->totalPrice)}} đồng
                            													             @endif
                            													         	</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Phí vận chuyển</td>
                                                                <td class="td-title-2"> 
                                                               30,000 đồng
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Thành tiền</td>
                                                                <td class="order-total-price"> 
                                                                @if(Session::has('cart'))
                        													                 {{number_format(Session('cart')->totalPrice+$ship)}} đồng 
                        													             @endif</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <form action="{{ url('client/products/payment_cart') }}" method="post">
                                             {{ csrf_field() }}
                                            <div class="row">
                                                 <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="culculate-shipping box-shadow p-30">
                                                        <p style="font-weight: bold;"> Ghi chú </p>
                                                        <input type="text" name="notes"  placeholder="Hãy nhập ghi chú...">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="culculate-shipping box-shadow p-30">
                                                        <h6 class="widget-title border-left mb-20">Thanh toán khi nhận được hàng</h6>
                                                       
                                                         <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method"  value="COD"  data-order_button_text="" style="float: right; ">
                                                          <p>Khi nhận được hàng khách hàng có thể kiểm tra và thanh toán</p>
                                                     </br>
                                                       <hr class="sidebar-divider my-0">
                                                        <h6 class="widget-title border-left mb-20">Thanh toán chuyển khoản</h6>
                                                          <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="ATM"  data-order_button_text="" style="float: right; ">
                                                        <p style="font-family: Arial;">Trước khi nhận hàng khách hàng nhập số tài khoản và nhận hàng
                                                        Chuyển tiền đến tài khoản sau:
						                                <br>- Số tài khoản: 123 456 789
						                                <br>- Chủ TK: Nguyễn A
						                                <br>- Ngân hàng ACB, Chi nhánh TPHCM</p>
						                                <a href="#"><img src="{{asset('public/client/img/payment/1.jpg')}}" alt="" style="margin:20px; width: 50px; height: 25px;"></a>
                                                          <a href="#"><img src="{{asset('public/client/img/payment/2.jpg')}}" alt="" style="margin:20px;  width: 50px; height: 25px;"></a>
                                                         <a href="#"><img src="{{asset('public/client/img/payment/3.jpg')}}" alt=" " style="margin:20px; width: 50px; height: 25px;"></a>
                                                           <a href="#"><img src="{{asset('public/client/img/payment/4.jpg')}}" alt="" style="margin:20px;  width: 50px; height: 25px;"></a>
                                                             <p style="font-weight: bold;"> Số tài khoản </p>
                                                        <div class="col-md-3" >
                                                        <input type="text" name="notes"  placeholder="Hãy nhập số tài khoản..." >
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3" style="float: right;">
                                                                <button type="submit" class="submit-btn-1 black-bg btn-hover-2">Thanh toán</button>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                       
                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                <!-- wishlist start -->
                                <div class="tab-pane" id="wishlist">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table  class="table table-dark  " cellspacing="0" width="100%" style="width:100%">
                                                      <thead style="background-color: orange;">
                                                        <tr>
                                                          <th class="disabled-sorting text-center" style="color: white;">STT</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Khách Hàng</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Ngày Đặt Hàng</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Tổng Tiền</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Thanh Toán</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Ghi Chú</th>
                                                          <th class="disabled-sorting text-center" style="color: white;">Trạng Thái</th>
                                                          <th colspan="2" class="disabled-sorting text-center" style="color: white; ">Chức Năng</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($list_all_bill_me as $list_bill)
                                                            <tr>
                                                              <td class="text-center">{{$number_order=$number_order+1}}</td>
                                                              <td class="text-center">{{$list_bill->customer->users->name}}</td>
                                                              <td class="text-center">{{$list_bill->date_order}}</td>
                                                              <td class="text-center">{{number_format($list_bill->total)}} đồng</td>
                                                              <td class="text-center">{{$list_bill->payment}}</td>
                                                              <td class="text-center"><p class="note_product_reduce">{{$list_bill->note}}</p></td>
                                                              <td class="text-center">
                                                                    @if($list_bill->status==0)
                                                                        Chờ Phê Duyệt
                                                                    @elseif($list_bill->status==1)
                                                                        Vận Chuyển
                                                                    @elseif($list_bill->status==2)
                                                                        Đã Hoàn Tất
                                                                    @endif
                                                              </td>
                                                              <td class="product-add-cart">

                                                                <button  class="w3-button w3-red view" data-id="{{ $list_bill->id}}">Xem Hóa Đơn</button>
                                                            </td>
                                                                <td class="text-center" >
                                                                  @if($list_bill->status==2)
                                                                
                                                                   <a href="{{ url('client/products/reviews_products',$list_bill->id) }}" ></i>Đánh giá sản phẩm</a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                      <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                              
                                                              @endif
                                                              </td>
                                                            </tr>
                                                            <div id="model_{{$list_bill->id}}"  class="w3-modal model_{{$list_bill->id}}">
                                                              <div class="w3-modal-content">
                                                                <div class="w3-container">
                                                                  <span onclick="document.getElementById('model_{{$list_bill->id}}').style.display='none'"
                                                                  class="w3-button w3-display-topright">&times;</span>
                                                                  <h2 style="padding:10px; font-weight: bold;">Chi Tiết Hóa Đơn</h2>
                                                                  <div class="model_bil_detail"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        @endforeach
                                                      </tbody>
                                                </table>
                                           
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- wishlist end -->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
@endsection
