@extends('admin.layout.master')
@section('content')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Hồ Sơ</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item active">Hồ Sơ</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                 <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                       @if(Session::has('notification'))
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{Session::get('notification')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                       <div class="card ">

                        <div class="card-header bg-primary">
                          {{-- <div class="card-icon">
                            <i class="material-icons">assignment</i>
                          </div> --}}

                          <h4 class="card-title text-white text-center h3">Hồ Sơ Cá Nhân</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">

                            <div class="col-9">
                                <div class="row">
                                  <div class="col-4 " style="font-size: 20px; font-weight: bold; padding:5px;">Họ và tên</div>
                                  <div class="col-8">{{ $account->users->name }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-4" style="font-size: 20px; font-weight: bold; padding:5px">Giới Tính</div>
                                  <div class="col-8">{{ $account->users->gender}}</div>
                                </div>
                                <div class="row">
                                  <div class="col-4" style="font-size: 20px; font-weight: bold; padding:5px">Điện thoại</div>
                                  <div class="col-8">{{ $account->users->phone}}</div>
                                </div>
                                <div class="row">
                                  <div class="col-4" style="font-size: 20px; font-weight: bold; padding:5px">Email</div>
                                  <div class="col-8">{{ $account->users->email}}</div>
                                </div>
                                 <div class='row'>
                              <div class="col-4" style="font-size: 20px; font-weight: bold; padding:5px">Địa chỉ</div>
                              <div class="col-8">
                                <p>{{ $account->users->address }}</p>
                              </div>
                          </div>
                            </div>

                            <div class="col-3">
                              <img src="{{url('./public/img/admin/accounts',$account->users->image)}}" class="rounded" style="width:200px; height: 200px;" >
                            </div>
                          </div>
                         
                          <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                              <a href="{{ url('admin/profile/update_account',$account->id) }}" class="btn btn-success btn-block">Cập nhật Thông Tin</a>
                            </div>
                            <div class="col-4"></div>
                          </div>
                        </div>
                        <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                    <div class="col-md-1"></div>
                    <!-- end col-md-12 -->
                  </div>
                  <!-- end row -->
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->

@endsection
