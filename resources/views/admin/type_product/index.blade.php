@extends('admin.layout.master')
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách loại sản phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item active">Loại sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             
               <a href="{{url('admin/type_products/create')}}" class="btn btn-primary btn-user ">
                 <i class="fa fa-plus font-weight-bold"></i> Thêm
                </a>
                 <form action="{{ url('admin/type_products/search')}}" method="get" class="float-right" >
                {{ csrf_field() }}
                <input type="text" placeholder="Nhập loại sản phẩm " name="txt_keyword">
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
                
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên loại sản phẩm</th>
                       <th class="text-center">Tên DM sản phẩm</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Mô tả</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên loại sản phẩm</th>
                      <th class="text-center">Tên DM sản phẩm</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Mô tả</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                    <th colspan="8">
                        <div class="float-right">
                                        Tổng cộng : {{ count($list_all_typeproduct) }} sản phẩm
                                    </div>
                      </th>
                  </tfoot>
                   
                  <tbody>
                    @foreach($list_all_typeproducts as $value)
                     <tr>
                         <td class="text-center">{{$number_order= $number_order+1}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center">{{$value->category->name}}</td>
                        <td class="text-center"><img src="{{url('./public/img/admin/typeproduct',$value->image)}}" width="50" height="50" class="rounded"></td>
                        <td class="text-center">{!!$value->description!!}</td>
                        <td class="text-center"> 
                            <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                            <a href="{{url('admin/type_products/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a>
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
                                              <p>Bạn có muốn xóa bài viết : <i style="font-weight: bold;">{{ $value->name }}</i> không ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-center">

                                             <a  href="{{ url('admin/type_products/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!-- end small modal -->
                    @endforeach
                  </tbody>
                </table>
                 <p class="text-center">{{ $list_all_typeproducts->links() }}</p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection