@extends('staff.layout.master')
@section('jsfooter')

   <script >
  $(document).ready(function(){
      $('.view').click(function(){
          var value=$(this).data('id');
          $.get("{{url('manage/ajax/bill_detail')}}/"+value,function(data){
               /* alert(data);*/
                $('#model_bil_detail').html(data);
          });
      });
  });
</script>
@endsection
@section('content1')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách đơn hàng đã thanh toán</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('/staff/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Đã thanh toán</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
          <!-- Page Heading -->
         
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             <form action="{{ url('admin/bills/search')}}" method="get" class="float-right" >
                 {{ csrf_field() }}
                <input type="text" placeholder="Nhập tiêu đề bài viết " name="txt_keyword">
                <button type="submit"><i class="fa fa-search" ></i></button>
              </form>
              
            </div>
             @if(Session::has('notification'))
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{Session::get('notification')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-primary " style="color: white;">
                    <tr>
                
                      <th class="text-center">Mã số</th>
                      <th class="text-center">Khách hàng</th>
                      <th class="text-center">Ngày đặt</th>
                      <th class="text-center">Tổng tiền</th>
                      <th class="text-center">Thanh toán</th>
                      <th class="text-center">Ghi chú</th>
                     
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">Mã số</th>
                      <th class="text-center">Khách hàng</th>
                      <th class="text-center">Ngày đặt</th>
                      <th class="text-center">Tổng tiền</th>
                      <th class="text-center">Thanh toán</th>
                      <th class="text-center">Ghi chú</th>
                    
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($list_all_bill as $value)
                    <tr>
                      <td class="text-center">{{$value->id}}</td>
                      <td class="text-center">{{$value->customer->users->name}}</td>
                      <td class="text-center">{{$value->date_order}}</td>
                      <td class="text-center">{{number_format($value->total)}} đồng</td>
                      <td class="text-center">{{$value->payment}}</td>
                      <td class="text-center"><p class="note_product_reduce">{{$value->note}}</p></td>
                      <td class="text-center">
                         <button type="button"  class="btn btn-primary view"  data-id="{{ $value->id}}" data-toggle="modal" data-target=".model_view_detail">xem chi tiết</i></button>
                         
                      </td>
                    </tr>
                             <!-- start edit status -->
                             <div class="modal fade modal-mini modal-primary" id="model_edit_status_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class=" fa fa-delete"></i></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn chuyển đơn hàng từ giai đoạn <span style="font-weight: bold">đang xử lý</span> sang giai đoạn <span style="font-weight: bold">vận chuyển</span> không ? </p>
                                  </div>
                                  <div class="modal-footer justify-content-center">

                                     <a  href="{{ url('manage/bills/edit_status',$value->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end edit status -->
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
         <div class="modal fade model_view_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"  >
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><b>Chi Tiết Hóa Đơn</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        <div id="model_bil_detail"></div>
      </div>
      </div>
  </div>
</div>
<!--end model-->
@endsection