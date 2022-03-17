@extends('admin.layout.master')
@section('content')
	
             <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách khách hàng bình luận</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Bình luận</li>
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
                          <th class=" text-center">STT</th>
                          <th class=" text-center">Sản phẩm </th>
                          <th class=" text-center">tên tài khoản</th>
                          <th class=" text-center">Nội dung bình luận</th>
                          <th class=" text-center">Trạng thái</th>
                          <th class=" text-center">Chức năng</th>
                         
                        </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      	  <th class=" text-center">STT</th>
                          <th class=" text-center">Sản phẩm </th>
                          <th class=" text-center">tên tài khoản</th>
                          <th class=" text-center">Nội dung bình luận</th>
                          <th class=" text-center">Trạng thái</th>
                          <th class=" text-center">Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   @foreach($list_all_comment as $value)
                   		<tr>
                                      <td class="text-center">{{$number_order=$number_order+1}}</td>
                                      <td class=" text-center name_product_reduce">{{$value->products->name}}</td>
                                      <td class="text-center">{{$value->accounts->users->name }}</td>
                                      <td class="content_comment_reduce text-center">{{$value->content }}</td>
                                      <td class="text-center" >
                                        @if($value->status==0)
                                          Chưa Trả Lời
                                        @else
                                          Đã trả lời
                                        @endif
                                      </td>
                                      <td class="text-center">
                                         <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                                        <a href="{{url('client/products/Detail_product',$value->id_product)}}" class="btn btn-primary btn-sm"><i class="fa fa-comments fa-2x"></i></a>
                                      </td>     
                   		</tr>
                      <!-- small modal -->
                                     <div class="modal fade modal-mini modal-primary" id="model_delete_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-small">
                                        <div class="modal-content">
                                          <div class="modal-header btn-success">
                                            <h4>Thông báo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                          </div>
                                          <div class="modal-body">
                                              <p>Bạn có muốn bình luận sản phẩm này không : <i style="font-weight: bold;">{{ $value->products->name }}</i> không ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-center">

                                             <a  href="{{ url('admin/comments/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!-- end small modal -->
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection