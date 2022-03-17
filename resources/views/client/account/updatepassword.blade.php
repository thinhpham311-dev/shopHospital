@extends('client.layout.master')
@section('jsfooter')
<script>
    $(function(){
      $(".f1 a").click(function(){
        let $this = $(this);

        if($this.hasClass('active'))
        {
          $this.parents('.f1').find('input').attr('type','password')
          $this.removeClass('active');
        }else{
           $this.parents('.f1').find('input').attr('type','text')
            $this.addClass('active')
        }
      });
    });
</script>
@endsection
@section('content')
   <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">ĐỔI MẬT KHẨU</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Đổi mật khẩu</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="my-account-content" id="accordion2">
                                <!-- My Personal Information -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#personal_info">Đổi mật khẩu</a>
                                        </h4>
                                    </div>
                                    <div id="personal_info" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="row">
						                        <div class="col-lg-3"></div>
						                        <div class="col-lg-6">
						                            <!--Nếu đăng nhập với quyền khách hàng-->
						                            @if($account->right==0)
						                                <img src="{{($account->users->image!="")?url('./public/img/admin/customer',$account->users->image):url('./public/img/logo/logo2.png') }}" style="width:150px; height: 150px; border-radius:100px; margin-left:100px; margin-top:20px;" class="rounded-circle">
						                                <h3 class="text-center font-weight-bold" style="margin-top: 20px;">{{$account->users->name}}</h3>
						                            @else
						                                <img src="{{($account->users->image!="")?url('./public/img/admin/accounts',$account->users->image):url('./public/img/logo/logo2.png') }}" style="width:150px; height: 150px; border-radius:100px; margin-left:100px;  margin-top:20px;" class="rounded-circle">
						                                <h3 class="text-center font-weight-bold" style="margin-top: 20px;">{{$account->users->name}}</h3>
						                            @endif

						                             <!--start notification -->
						                        </div>
						                        <div class="col-lg-3"></div>
						                    </div>
                                            <form action="{{url('client/accounts/edit_password',Auth::guard('account')->id())}}" method="post">
                                            	 {{ csrf_field() }}
								                     @if(Session::has('notification'))
								                        <div class="alert alert-danger alert-dismissible show " role="alert">
								                          <strong> {{Session::get('notification')}}</strong>
								                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								                            <span aria-hidden="true">&times;</span>
								                          </button>
								                        </div>
								                      @endif
								                      <!--end notification -->
          								                          
                                                  <div class="billing-details p-30">

                                                    <label> Mật khẩu cũ
                                                      @if($errors->has('password_old'))
                                                      <div class="error-text" style="color: red;">
                                                            {{$errors->first('password_old')}}
                                                      </div>
                                                      @endif
                                                    </label>
                                                    <div class="f1">
                                                         <input type="password" class="password" name="password_old"  placeholder="Nhập mật khẩu cũ" value="{{ old('password_old') }}" ><a href="javascript:;void(0)" style="position: absolute; bottom: 310px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                    </div>
                                                

                                                    <label>Mật khẩu mới
                                                      @if($errors->has('password_new'))
                                                      <div class="error-text" style="color: red;">
                                                          {{$errors->first('password_new')}}
                                                      </div>
                                                      @endif
                                                    </label>
                                                    <div class="f1">
                                                       <input type="password" class="password" name="password_new" placeholder="Nhập mật mới" value="{{ old('password_new') }}"><a href="javascript:;void(0)" style="position: absolute; bottom: 222px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                    </div>
                                                   

                                                    <label>Xác nhận mật khẩu mới
                                                      @if($errors->has('re_password_new'))
                                                      <div class="error-text" style="color: red;">
                                                          {{$errors->first('re_password_new')}}
                                                      </div>
                                                      @endif
                                                    </label>
                                                    <div class="f1">
                                                       <input type="password" class="password" name="re_password_new" placeholder="Nhập lại mật khẩu mới" value="{{ old('re_password_new') }}"><a href="javascript:;void(0)" style="position: absolute; bottom: 135px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                    </div>
                                                   

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->
        </div>
        <!-- End page content -->
@endsection