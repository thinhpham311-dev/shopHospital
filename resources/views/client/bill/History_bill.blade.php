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
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">LỊCH SỬ MUA HÀNG</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Lịch Sử mua hàng</li>
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
                        <div class="col-md-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <!-- wishlist start -->
                                <div class="tab-pane active" id="wishlist">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead class="bg-primary " >
                                                        <tr>
                                                          <th class="disabled-sorting text-center" style="color: white;">Mã Số</th>
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
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="text-center">{{$list_bill->id}}</td>
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
                                                          <div id="model_{{$list_bill->id}}"  class="w3-modal model_{{$list_bill->id}}" style="margin-top: 30px;">
                                                              <div class="w3-modal-content">
                                                                <div class="w3-container">
                                                                  <span onclick="document.getElementById('model_{{$list_bill->id}}').style.display='none'"
                                                                  class="w3-button w3-display-topright">&times;</span>
                                                                  <h2 style="padding:10px; font-weight: bold;">Chi Tiết Hóa Đơn</h2>
                                                                  <div class="model_bil_detail"></div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        <!-- tr -->
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