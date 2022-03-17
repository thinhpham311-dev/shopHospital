@extends('admin.layout.master')
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Danh sách thể loại bài viết</h1>
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
             
                 <form action="{{ url('manage/taxonomys/edit',$taxonomy->id) }}" method="post" class="mt-3 mr-4" class="float-right">
                          {{ csrf_field() }}
                          <div class="float-right">
                            <input type="text" name="name" value="{{$taxonomy->name}}" class="border pl-2">
                            <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i> Cập nhật</button>
                             <a href="{{ url('manage/taxonomys/index')}}" class="btn btn-primary btn-sm ml-2"><i class="fas fa-undo-alt"></i> Trở Lại</a>
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
                  <thead>
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
                            <a href="{{url('admin/taxonomys/delete',$value->id)}}" class="btn btn-danger btn-user "><i class="fa fa-trash"></i></a>
                            <a href="{{url('admin/taxonomys/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="fa fa-wrench"></i></a>
                        </td>
                     </tr>
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