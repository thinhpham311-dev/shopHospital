@extends('staff.layout.master')

@section('content1')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Đổi Mật Khẩu</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('/staff/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item active">Đổi Mật Khẩu</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="card">

                        <div class="card-body">

                          <form action="{{url('manage/profile/edit_password',Auth::guard('account')->id() )}}" method="post" class="m-5">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <!--Nếu đăng nhập với quyền khách hàng-->
                                @if($account->right==0)
                                    @if($account->users->image=="")
                                        <img src="{{ url('./public/img/logo/logo2.png') }}" style="width:100%; height: 175px;  border: 5px solid green" class="rounded-circle m-2 ">
                                        <p class="text-center font-weight-bold">{{$account->users->name}}</p>
                                    @else
                                       <image src="{{ url('./public/img/admin/customer',$account->users->image) }}" style="width:100%; height: 175px; border: 5px solid green;" class="rounded-circle m-2" >
                                        <p class="text-center font-weight-bold">{{$account->users->name}}</p>
                                    @endif
                                <!--Nếu đăng nhập khác quyền  khách hàng-->
                                @else
                                    @if($account->users->image=="")
                                        <img src="{{ url('./public/img/logo/logo2.png') }}" style="width:100%; height: 175px;  border: 5px solid green" class="rounded-circle m-2">
                                         <p class="text-center font-weight-bold">{{$account->users->name}}</p>
                                    @else
                                        <image src="{{ url('./public/img/admin/accounts',$account->users->image) }}" style="width:100%; height: 175px;  border: 5px solid green" class="rounded-circle m-2"  >
                                         <p class="text-center font-weight-bold">{{$account->users->name}}</p>
                                    @endif
                                @endif
                            </div>
                            <div class="col-4"></div>
                        </div>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <!--start notification -->
                               @if(Session::has('notification'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <strong> {{Session::get('notification')}}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              @endif
                              <!--end notification -->
                              <!--start error-->
                              @if(count($errors)>0)
                                <div class="alert alert-danger"  id="error">
                                  @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                  @endforeach
                                </div>
                              @endif
                               <!--end error-->
                               <div class="form-group">
                                    <label for="password_old" class="bmd-label-floating pl-2 ">Mật khẩu Cũ</label>
                                    <input type="password" class="form-control border rounded pl-2" id="password_old"  name="password_old" required="true" focus>
                                </div>
                                <div class="form-group">
                                    <label for="password_new" class="bmd-label-floating pl-2 ">Mật khẩu Mới</label>
                                    <input type="password" class="form-control border rounded pl-2" id="password_new" name="password_new" required="true" >
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary btn-block ">Đổi Mật Khẩu</button>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        </form>
                        </div>
                      <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                    <div class="col-md-2"></div>

                  </div>
                  <!-- end row -->
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->
@endsection
<!--end section(content)-->
