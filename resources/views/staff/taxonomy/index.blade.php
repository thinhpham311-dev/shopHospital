@extends('staff.layout.master')
@section('content1')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Danh sách thể loại bài viết</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('/staff/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Thể loại bài viết</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             
                 <form action="{{ url('manage/taxonomys/create') }}" method="post" class="mt-3 mr-4" class="float-right">
                          {{ csrf_field() }}
                          <div class="float-right">
                            <input type="text" name="name" class="border pl-2">
                            <button type="submit" class="btn btn-primary btn-sm ml-2"> <i class="fa fa-plus font-weight-bold"></i> Thêm</button>
                          </div>
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
                      <th class="text-center">Tên danh mục</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên danh mục</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                    <th colspan="8">
                        <div class="float-right">
                            Tổng cộng : {{ count($list_all_taxonomy) }} thể loại
                         </div>
                      </th>
                  </tfoot>
                   
                  <tbody>
                    @foreach($list_all_taxonomys as $value)
                     <tr>
                         <td class="text-center">{{$number_order= $number_order+1}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center"> 
                            <button  data-toggle="modal" data-target="#model_delete_{{$value->id}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="fa fa-trash" style="color: white;"></i></button>
                            <a href="{{url('manage/taxonomys/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a>
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
                                              <p>Bạn có muốn thể loại bài viết : <i style="font-weight: bold;">{{ $value->name }}</i> không ?</p>
                                          </div>
                                          <div class="modal-footer justify-content-center">

                                             <a  href="{{ url('manage/taxonomys/delete',$value->id)}}" class="btn btn-danger">Có</a>
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Không</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <!-- end small modal -->
                    @endforeach
                  </tbody>
                </table>
                 <p class="text-center">{{ $list_all_taxonomys->links() }}</p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection