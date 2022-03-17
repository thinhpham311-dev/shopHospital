@extends('admin.layout.master')
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
             <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách màu sản phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Màu sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             
               <a href="{{url('admin/color_products/create')}}" class="btn btn-primary btn-user ">
                  Thêm
                </a>
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
                      <th class="text-center">Tên màu sản phẩm</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên màu sản phẩm</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($list_all_colorproduct as $value)
                     <tr>
                      <td class="text-center">{{$value->id}}</td>
                      <td class="text-center">{{$value->name}}</td>
                      <td class="text-center"><img src="{{url('public/img/admin/colorproduct',$value->image)}}"  style="height: 50px; width: 50px; border: 1px solid #ffff; "></td>
                      <td class="text-center"> <a href="{{url('admin/color_products/delete',$value->id)}}" class="btn btn-danger btn-user ">
                  Xóa
                </a>
                 <a href="{{url('admin/color_products/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a></td>
                </tr>
                    @endforeach
                    
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection