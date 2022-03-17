@extends('admin.layout.master')
@section('jsfooter')

   <script >
  $(document).ready(function(){
      $('.view').click(function(){
          var value=$(this).data('id');
          $.get("{{url('admin/ajax/bill_detail')}}/"+value,function(data){
               /* alert(data);*/
                $('#model_bil_detail').html(data);
          });
      });
  });
</script>
<script>
  $(function(){
        $("#btn-1-2").hide();
        $("#container-1-1").show();
        $("#container-1-2").hide();
        $("#btn-1-1").click(function(){
          $("#container-1-1").hide();
          $("#container-1-2").show();
          $("#btn-1-1").hide();
          $("#btn-1-2").show();
        });
        $("#btn-1-2").click(function(){
          $("#container-1-1").show();
          $("#container-1-2").hide();
          $("#btn-1-1").show();
          $("#btn-1-2").hide();
        });
      });

</script>

@endsection
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách đơn hàng đang vận chuyển</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Đang vận chuyển</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
          <!-- Page Heading -->
         
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
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
                
                      <th class="text-center">STT</th>
                      <th class="text-center">Khách hàng</th>
                      <th class="text-center">Ngày đặt</th>
                      <th class="text-center">Tổng tiền</th>
                      <th class="text-center">Thanh toán</th>
                      <th class="text-center">Ghi chú</th>
                      <th class="text-center">Chuyển trạng thái </th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Khách hàng</th>
                      <th class="text-center">Ngày đặt</th>
                      <th class="text-center">Tổng tiền</th>
                      <th class="text-center">Thanh toán</th>
                      <th class="text-center">Ghi chú</th>
                      <th class="text-center">Chuyển trạng thái </th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                     <th colspan="8">
                        <div class="float-right">
                             Tổng cộng : {{ count($list_all_bill) }} Đơn hàng
                         </div>
                      </th>
                  </tfoot>
                  <tbody>
                    @foreach($list_all_bills as $value)
                    <tr>
                      <td class="text-center">{{$number_order=$number_order+1}}</td>
                      <td class="text-center">{{$value->customer->users->name}}</td>
                      <td class="text-center">{{$value->date_order}}</td>
                      <td class="text-center">{{number_format($value->total)}} đồng</td>
                      <td class="text-center">{{$value->payment}}</td>
                      <td class="text-center">
                        @if($value->note!=null)
                        <div id="container-1-1">
                        <p class="note_product_reduce">{{Str::limit($value->note, 10)}}</p>
                          <button type="button"  class="btn btn-success" id="btn-1-1"><p>Xem thêm</p></button>
                        </div>
                        <div id="container-1-2">
                         <p class="note_product_reduce">{{$value->note}}</p>
                          <button type="button"  class="btn btn-success" id="btn-1-2" ><p>Đóng lại</p></button>
                        </div>
                        @endif
                      </td>   
                      <td class="text-center">
                          <button  data-toggle="modal" data-target="#model_edit_status_{{$value->id}}" class="btn btn-warning">Bước tiếp theo</button>
                      </td>
                      <td class="text-center">
                         <a href="{{ url('admin/bills/print_bill',$value->id)}}"  class="btn btn-secondary"><i class="fas fa-print"></i></a>
                         <button type="button"  class="btn btn-primary view"  data-id="{{ $value->id}}" data-toggle="modal" data-target=".model_view_detail"><i class="fas fa-eye"></i></button>
                          <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                      </td>
                    </tr>
                             <!-- start edit status -->
                             <div class="modal fade modal-mini modal-primary" id="model_edit_status_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle" style="color: white;"></i></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn chuyển đơn hàng từ giai đoạn <span style="font-weight: bold">đang xử lý</span> sang giai đoạn <span style="font-weight: bold">vận chuyển</span> không ? </p>
                                  </div>
                                  <div class="modal-footer justify-content-center">

                                     <a  href="{{ url('admin/bills/edit_status',$value->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end edit status -->
                      <!-- start model delete bill -->
                             <div class="modal fade modal-mini modal-primary" id="model_delete_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn xóa đơn hàng : số <i style="font-weight: bold;">{{ $value->id}}</i> không ?</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">

                                     <a  href="{{ url('admin/bills/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                             <!-- end model delete bill -->
                     
                    
                    @endforeach
                    
                   
                   
                  </tbody>
                </table>
                 <p class="text-center">{{ $list_all_bills->links() }}</p>
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