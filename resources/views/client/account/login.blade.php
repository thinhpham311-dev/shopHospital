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

<div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">ĐĂNG NHẬP / ĐĂNG KÝ</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Đăng nhập / Đăng ký</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
 <!-- Start page content -->
        <div id="page-content" class="page-wrapper">
             <!-- BREADCRUMBS SETCTION END -->
       
            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">

                <div class="container">
                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="registered-customers">
                                <h6 class=" border-left mb-50" style="font-family: Arial; font-weight: bold;" >ĐĂNG NHẬP TÀI KHOẢN KHÁCH HÀNG</h6>
                                <form action="{{ url('client/accounts/login') }}" method="post">
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
                                    <div class="login-account p-30 box-shadow">
                                       <h5 style="font-family: Arial;">Tên đăng nhập</h5>
                                        <input type="text" name="username" placeholder="Hãy nhập tên đăng nhập" value="{{ old('username') }}">
                                         @if($errors->has('username'))
                                              <div class="error-text">
                                                  {{$errors->first('username')}}
                                              </div>
                                          @endif
                                        <h5 style="font-family: Arial;">Mật khẩu</h5>
                                        <div class="f1">
                                           <input type="password" name="password" placeholder="Hãy nhập mật khẩu" value="{{ old('password') }}"/><a href="javascript:;void(0)" style="position: absolute; bottom:95px; font-size: 20px;  right: 60px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                           </div>
                                           
                                         @if($errors->has('password'))
                                              <div class="error-text">
                                                  {{$errors->first('password')}}
                                              </div>
                                          @endif
                                        
                                       
                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- new-customers -->
                        <div class="col-md-6">
                            <div class="new-customers">
                               <h6 class=" border-left mb-50" style="font-family: Arial; font-weight: bold;">ĐĂNG KÝ TÀI KHOẢN KHÁCH HÀNG</h6>
                                <form action="{{ url('client/accounts/register') }}" method="post">
                                     {{ csrf_field() }}
                                      @if(Session::has('notification1'))
                                        <div class="alert alert-danger alert-dismissible show " role="alert">
                                          <strong> {{Session::get('notification1')}}</strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                      @endif
                                      <!--end notification -->
                                   
                                    <div class="login-account p-30 box-shadow">
                                           <div class="row">
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <label for="name" class="bmd-label-floating">Họ và tên(*)
                                                  @if($errors->has('name'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('name')}}
                                                </div>
                                                  @endif
                                                  </label>
                                                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" placeholder="Nhập họ và tên người dùng">
                                                 
                                              </div>
                                              <div class="row" style="margin-bottom: 20px; ">
                                                <div class="col-md-3">
                                                  <label for="name" class="bmd-label-floating">Giới Tính</label>
                                                </div>
                                                <div class="col-md-9">
                                                   <input  checked type="radio" name="gender" id="gender" value="Nam" > Nam

                                                    <input class="ml-3" type="radio" name="gender" id="gender" value="Nữ"> Nữ 
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="phone" class="bmd-label-floating">Điện Thoại(*)
                                                    @if($errors->has('phone'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('phone')}}
                                                </div>
                                                 @endif
                                                 </label>
                                                  <input type="text" class="form-control" id="phone" name="phone"  value="{{ old('phone') }}"  placeholder="+84">
                                                    
                                                </div>
                                               <div class="form-group">
                                                  <label for="email" class="bmd-label-floating">Email(*)
                                                     @if($errors->has('email'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('email')}}
                                                </div>
                                                 @endif
                                                 </label>
                                                 
                                                  <input type="text" class="form-control" id="email" name="email" placeholder="@example.com"  value="{{ old('email') }}">  
                                              </div>

                                              <div class="form-group">
                                                  <label for="username" class="bmd-label-floating">Tài khoản(*)
                                                    @if($errors->has('username'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('username')}}
                                                </div>
                                                 @endif
                                                 </label>
                                                  <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Nhập tên tài khoản">
                                                    
                                              </div>
                                              <div class="form-group">
                                                  <label for="password" class="bmd-label-floating">Mật khẩu(*)
                                                     @if($errors->has('password'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('password')}}
                                                </div>
                                                 @endif
                                                  </label>
                                                  <div class="f1">
                                                    <input type="password" class="form-control" id="password" name="password"  value="{{ old('password') }}" placeholder="Nhập mật khẩu..."><a href="javascript:;void(0)" style="position: absolute; bottom: 115px; font-size: 20px;  right: 30px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                  </div>
                                                  
                                                     
                                              </div>
                                              <div class="form-group">
                                                  <label for="password_resets" class="bmd-label-floating">Xác nhận mật khẩu(*)
                                                       @if($errors->has('password_resets'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('password_resets')}}
                                                </div>
                                                 @endif
                                                  </label>
                                                  <div class="f1">
                                                     <input type="password" class="form-control" id="password_resets" name="password_resets"  value="{{ old('password_resets') }}" placeholder="Nhập lại mật khẩu..."><a href="javascript:;void(0)" style="position: absolute; bottom: 30px; font-size: 20px;  right: 30px; color: #A4A4A4;"><i class="zmdi zmdi-eye"></i></a>
                                                  </div>
                                                 
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="address">Địa  Chỉ
                                                    @if($errors->has('address'))
                                                <div class="error-text" style="color: red;">
                                                    {{$errors->first('address')}}
                                                </div>
                                                 @endif
                                                </label>
                                                <br/>
                                                <textarea class="form-control " id="address" name="address" rows="3"  placeholder="Địa chỉ liên hệ...">{{ old('address') }}</textarea>
                                              </div>
                                            </div>
                                          </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Đăng ký</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->             

        </div>
        <!-- End page content -->
@endsection