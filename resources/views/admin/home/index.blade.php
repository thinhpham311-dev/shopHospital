@extends('admin.layout.master')
@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid" >

         
           <div class="row">
                        <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                        <h1 class="main-title float-left" style="color: white; font-weight: bold;">Trang Chủ</h1>
                                        <ol class="breadcrumb float-right">
                                              <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                            <li class="breadcrumb-item active"></li>
                                        </ol>
                                        <div class="clearfix"></div>
                                </div>
                        </div>
                </div>
          <!-- Content Row -->
          <div class="row">
                    <div class="col-xl-12">
                        <div class="card-deck" style="margin-top: 30px;margin-bottom: 30px">
                          <div class="card shadow">
                            <p class="text-center mt-3 font-weight-bold h4"> Tổng Sản Phẩm </p>
                            <p class="text-center mt-2 mb-3 font-weight-bold h3">{{count($list_all_products)  }}</p>
                            <a href="{{ url('admin/products/index') }}" class="text-center text-danger mb-2">Xem chi tiết</a>
                          </div>
                          <div class="card shadow">
                            <p class="text-center mt-3 font-weight-bold h4"> Tổng Khách Hàng </p>
                            <p class="text-center mt-2 mb-3 font-weight-bold h3"> {{count($list_all_customer)  }} </p>
                            <a href="{{ url('admin/customer/index') }}" class="text-center text-danger mb-2">Xem chi tiết</a>
                          </div>
                          <div class="card shadow">
                            <p class="text-center mt-3 font-weight-bold h4"> Tổng Bài Viết </p>
                            <p class="text-center mt-2 mb-3 font-weight-bold h3"> {{count($list_all_posts)  }} </p>
                            <a href="{{ url('admin/customer/index') }}" class="text-center text-danger mb-2">Xem chi tiết</a>
                          </div>
                        </div>

                    </div>
                </div>
                  <h3 style="font-weight: bold; color: white;">Sản Phẩm Mới Cập Nhật</h3>
                        <br>
                 <div class="row" style="margin-bottom: 10px;">
                        @foreach($list_three_newproduct as $list)
                        <div class="col-md-4">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="{{url('admin/products/detail',$list->id)}}">
                                  <img class="img" src="{{ url('./public/img/admin/product',$list->image) }}" height="300" width="350">
                                </a>
                              </div>
                              <div class="card-body">
                               
                                <h4 class="card-title">
                                  <a href="{{ url('admin/products/detail',$list->id) }}" class="name_reduce">{{$list->name  }}</a>
                                </h4>
                                <div class="card-description">
                                   <p>Giá thực :{{number_format($list->unit_price ) }} đồng</p>
                                   <p>Giá khuyến mãi :{{number_format($list->unit_price)}} đồng</p>
                                </div>
                              </div>
                              <div class="card-footer">
                               <div class="price">
                                  <h4>{{ $list->created_at }}</h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category">Số lượng tồn:{{$list->inventory_number   }}</p>
                               
                                 <div class="card-actions text-right">
                                
                                  <a href="{{url('admin/products/edit',$list->id)}}" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Sửa">
                                    <i class="fa fa-edit" style="color: white;"></i>
                                  </a>
                                  <button class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Xóa">
                                    <i class="fas fa-trash-alt" data-toggle="modal"  data-target="#model_delete_{{$list->id}}" style="color: white;"></i>
                                  </button>
                                   </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- small modal -->
                             <div class="modal fade modal-mini modal-primary" id="model_delete_{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn xóa máy tính : <i style="font-weight: bold;">{{ $list->name }}</i> không ?</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">

                                     <a  href="{{ url('admin/products/delete',$list->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end small modal -->
                        @endforeach
                      </div>
        </div>

        <!-- /.container-fluid -->
@endsection