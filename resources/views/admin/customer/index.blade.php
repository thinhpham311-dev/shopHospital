@extends('admin.layout.master')
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách thông tin khách hàng</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Khách hàng</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
          <!-- Page Heading -->
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
               <div class="card-header py-3">
               <a href="{{url('admin/customers/create')}}" class="btn btn-primary btn-user "><i class="fa fa-plus font-weight-bold"></i> 
                  Thêm
                </a>
                  <form action="{{ url('admin/customers/search')}}" method="get" class="float-right" >
                {{ csrf_field() }}
                <input type="text" placeholder="Nhập tên khách hàng " name="txt_keyword">
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
                          <th class=" text-center">STT</th>
                          <th class=" text-center">Họ tên</th>
                          <th class=" text-center">Giới tính</th>
                          <th class=" text-center">Điện thoại</th>
                          <th class=" text-center">Hình đại diện</th>
                          <th class=" text-center">Địa chỉ</th>
                          <th class=" text-center">Email</th>
                          <th class=" text-center">Loại</th>
                          <th class=" text-center">Chức Năng</th>
                        </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class=" text-center">STT</th>
                          <th class=" text-center">Họ tên</th>
                          <th class=" text-center">Giới tính</th>
                          <th class=" text-center">Điện thoại</th>
                          <th class=" text-center">Hình đại diện</th>
                          <th class=" text-center">Địa chỉ</th>
                          <th class=" text-center">Email</th>
                          <th class=" text-center">Loại</th>
                          <th class=" text-center">Chức Năng</th>
                    </tr>
                    <th colspan="9">
                                    <div class="float-right">
                                        Tổng cộng : {{ count($list_all_customers) }} khách hàng
                                    </div>
                                  </th>
                  </tfoot>
                  <tbody>
                    @foreach($list_all_customer as $value)
                    <tr>
                       <td class=" text-center">{{$number_order=$number_order+1}}</td>
                       <td class=" text-center">{{$value->users->name}}</td>
                       <td class=" text-center">{{$value->users->gender}}</td>
                       <td class=" text-center">{{$value->users->phone}}</td>
                       <td class=" text-center">
                        @if($value->users->image=="")
                         <img  src="{{url('./public/img/logo/logo2.png')}}"  style="width:50px; height:50px;">
                         @else
                        <img src="{{url('public/img/admin/customer/',$value->users->image)}}" height="50" width="50"></td>
                       @endif
                       <td class=" text-center">{{$value->users->address}}</td>
                       <td class=" text-center">{{$value->users->email}}</td>
                       <td class=" text-center">
                         @if($value->type==0)
                            thường
                         @else
                            vip
                         @endif
                       </td> 
                        <td class="text-center">
                             <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                             <a href="{{url('admin/customers/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a>
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
                                              <p>Bạn có muốn xóa khách hàng : <i style="font-weight: bold;">{{ $value->users->name }}</i> không ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-center">

                                             <a  href="{{ url('admin/customers/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!-- end small modal -->
                    @endforeach
                  </tbody>
                </table>
                <p class="text-center">{{ $list_all_customer->links() }}</p>
                 
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection