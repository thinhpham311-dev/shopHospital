@extends('admin.layout.master')
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách sản phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <a href="{{url('admin/products/create')}}" class="btn btn-primary " ><i class="fa fa-plus font-weight-bold"></i>
                  Thêm
                </a>
                 <form action="{{ url('admin/products/search')}}" method="get" class="float-right" >
                {{ csrf_field() }}
                <input type="text" placeholder="Nhập sản phẩm " name="txt_keyword">
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
                      <th class="text-center">Tên sản phẩm</th>
                      <th class="text-center">Danh mục SP</th>
                      <th class="text-center">Loại sản phẩm</th>
                      <th class="text-center">Tồn kho</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Giá bán</th>
                      <th class="text-center">VAT</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th class="text-center">STT</th>
                      <th class="text-center">Tên sản phẩm</th>
                      <th class="text-center">Danh mục SP</th>
                      <th class="text-center">Loại sản phẩm</th>
                      <th class="text-center">Tồn kho</th>
                      <th class="text-center">Hình ảnh</th>
                      <th class="text-center">Giá bán</th>
                       <th class="text-center">VAT</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                     <th colspan="9">
                        <div class="float-right">
                             Tổng cộng : {{ count($list_all_product) }} sản phẩm
                         </div>
                      </th>
                  </tfoot>
                  <tbody>
                    <tr>
                      @foreach($list_all_products as $value)
                         @if($value->inventory_number==0)
                            <td class="text-center">{{ $number_order= $number_order+1}}</td>
                            <td class="text-center" style="overflow: visible; width: 200px;
  height: 50px;">{{$value->name}}</td>
                             <td class="text-center">{{$value->type_product->category->name}}</td>
                            <td class="text-center">{{$value->type_product->name}}</td>
                            <td class="text-center">{{$value->inventory_number}}</td>
                             <td class="text-center"><img src="{{url('public/img/admin/product/',$value->image)}}" width="100" height="100"></td>

                            <td class="text-center">
                              @if($value->promotion_price != 0)
                             <p> Giá khuyến mãi: </br> {{$value->promotion_price}} đồng</p></br>
                              <p>Giá thực:</p><p style="text-decoration:line-through;"> {{$value->unit_price}} đồng</p>
                              @else
                                <p>Giá thực: </br>{{$value->unit_price}} đồng</p>
                                @endif
                            </td>
                            <td class="text-center"><a href="{{ url('admin/products/VATproduct',$value->id) }}">{!! ($value->VAT==0)?"<i class='fas fa-times-circle' style='color: red;'></i>":"<i class='fas fa-check-circle'></i>" !!}</a></td>
                            <td class="text-center">
                            <td class="text-center"> 
                              <a href="{{url('admin/products/detail',$value->id)}}" class="btn btn-link  like" style="background-color: violet;"><i class="fa fa-eye" style="color: white;"></i></a>
                            <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                            <a href="{{url('admin/products/edit',$value->id)}}" class="btn btn-warning btn-user "> <i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade modal-mini modal-primary" id="model_delete_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn xóa máy tính : <i style="font-weight: bold;">{{ $value->name }}</i> không ?</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    
                                     <a  href="{{ url('admin/products/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                         <script>
                              alert("{{ $value->name }} đã hết hàng.Hãy vui lòng cập nhật lại khi có hàng");
                            </script>
                          @else
                          <tr>
                            <td class="text-center">{{$number_order= $number_order+1}}</td>
                            <td class="text-center"  style="overflow: visible; width: 200px;
                            height: 50px;">{{$value->name}}</td>
                              <td class="text-center">{{$value->type_product->category->name}}</td>
                            <td class="text-center">{{$value->type_product->name}}</td>
                            <td class="text-center">{{$value->inventory_number}}</td>
                            <td class="text-center"><img src="{{url('public/img/admin/product/',$value->image)}}" height="100" width="100"></td>
                           <td class="text-center">
                              @if($value->promotion_price != 0)
                             <p> Giá khuyến mãi: </br> {{$value->promotion_price}} đồng</p></br>
                              <p>Giá thực:</p><p style="text-decoration:line-through;"> {{$value->unit_price}} đồng</p>
                              @else
                                <p>Giá thực: </br>{{$value->unit_price}} đồng</p>
                                @endif
                            </td>
                             <td class="text-center"><a href="{{ url('admin/products/VATproduct',$value->id) }}">{!! ($value->VAT==0)?"<i class='fas fa-times-circle' style='color: red;'></i>":"<i class='fas fa-check-circle'></i>" !!}</a></td>
                            <td class="text-center">
                               <a href="{{url('admin/products/detail',$value->id)}}" class="btn btn-link  like" style="background-color: violet;"><i class="fa fa-eye"></i></a>
                              <a href="{{url('admin/products/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a>
                            <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove" style="color: white;"><i class="fa fa-trash" style="color: white;"></i></button>
                          </td>
                           </tr>
                             <div class="modal fade modal-mini modal-primary" id="model_delete_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-small">
                                <div class="modal-content">
                                  <div class="modal-header btn-success">
                                    <h4>Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Bạn có muốn xóa máy tính : <i style="font-weight: bold;">{{ $value->name }}</i> không ?</p>
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    
                                     <a  href="{{ url('admin/products/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end small modal -->
                          @endif
                      @endforeach
                   
                   
                   
                  </tbody>
                </table>
                 <p class="text-center">{{ $list_all_products->links() }}</p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection