@extends('client.layout.master')
@section('cssheader')
<style>
  .inputfile
  {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    display: inline-block;
    cursor: pointer;
  }

  .inputfile:focus + label,
  .inputfile + label:hover {
   opacity: 0.5;
  }
</style>
@endsection
@section('jsfooter')
<script>
  function fileValidation()
  {
      var fileInput = document.getElementById('file');
      var filePath = fileInput.value;//lấy giá trị input theo id
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
    //Kiểm tra định dạng
    if(!allowedExtensions.exec(filePath))
    {
        alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }
    else
    {
      //Image preview
      if (fileInput.files && fileInput.files[0])
      {
      var reader = new FileReader();
      reader.onload = function(e) {
      document.getElementById('imagePreview').innerHTML = '<img style="width:100%;height:300px; opacity:1.0" class="rounded mx-auto d-block" src="'+e.target.result+'"/>';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>
<script >
  $(function(){
    $('#file').change(function(){
      $('.image_old').hide();
    });
  });
</script>
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
<!--end section(jsfooter)-->
@section('content')
<div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">HỒ SƠ CÁ NHÂN</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>Hồ sơ cá nhân</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

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
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#personal_info">Xem thông tin khách hàng</a>
                                        </h4>
                                    </div>
                                    <div id="personal_info" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <form action="#">
                                                <div class="new-customers">
                                                    <div class="p-30">
                                                         <div class="row">
						            <div class="col-md-5">
						                @if(Auth::guard('account')->check())
						                    @if(Auth::guard('account')->user()->right==0 )
						                        <img src="{{($account->users->image!="")?url('./public/img/admin/customer',$account->users->image):url('./public/img/logo/logo2.png') }}" class="rounded" style="width:250px; height: 250px;">
						                    @else
						                        <img src="{{($account->users->image!="")?url('./public/img/admin/accounts',$account->users->image):url('./public/img/logo/logo2.png') }}" class="rounded" style="width:250px; height: 250px;">
						                    @endif
						                @else
						                    <p> Chưa đăng nhập</p>
						                @endif
									            </div>
									            <div class="col-md-5">
									                <p class="w-100" style="font-family: Arial;">
									                    <span style=" font-weight: bold; padding:5px;" >Họ và tên:</span> {{ $account->users->name}}
									                </p>
									                <br/>
                                                     <p class="w-100" style="font-family: Arial;">
                                                        <span style=" font-weight: bold; padding:5px;" >Quyền hạn:</span> 
                                                        @if($account->right==1)
                                                          Quản trị
                                                        @elseif($account->right==0)
                                                            Khách hàng
                                                        @else
                                                            Nhân viên
                                                        @endif
                                                    </p>
                                                    <br/>
									                <p class="w-100" style="font-family: Arial;">
									                     <span style=" font-weight: bold; padding:5px;" >Giới Tính:</span> {{ $account->users->gender}}
									                </p>
									                <br/>
									                <p class="w-100" style="font-family: Arial;">
									                     <span style=" font-weight: bold; padding:5px;" >Điện thoại:</span> {{ $account->users->phone}}
									                </p>
									                <br/>
									                <p class="w-100" style="font-family: Arial;">
									                    <span style=" font-weight: bold; padding:5px;" >Email:</span> {{ $account->users->email}}
									                </p>
									                <br/>
									                <p class="w-100" style="font-family: Arial;">
									                    <span style=" font-weight: bold; padding:5px;" >Địa Chỉ:</span> {{ $account->users->address }}
									                </p>
									                 <br/>
									                 <p class="w-100" style="font-family: Arial;">
									                    <span style=" font-weight: bold; padding:5px;" >Quyền hạn:</span> 
									                    @if($account->right==0)
									                    khách hàng
									                    @elseif($account->right==1)
									                    Quản trị
									                    @else
									                    Nhân viên
									                    @endif
									                </p>
									                <br/>
									            </div>

			        						</div>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- My shipping address -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#my_shipping">Cập nhật thông tin khách hàng</a>
                                        </h4>
                                    </div>
                                    <div id="my_shipping" class="panel-collapse collapse" role="tabpanel" >
                                        <div class="panel-body">
                                            <form action="{{ url('client/accounts/edit_profile',$account->id) }}" method="post" enctype="multipart/form-data">
                                            		 {{ csrf_field() }}
                                                <div class="new-customers p-30">
                                                    <div class="row">
									                  <div class="col-md-5">
									                    @if($account->right==0)
									                        <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
									                        <label for="file" class="w-100">
									                          <img  src="{{($account->users->image!="")?url('./public/img/admin/customer',$account->users->image):url('./public/img/logo/logo2.png') }}"  style="width:250px; height: 250px;" class="rounded border image_old">
									                          <div id="imagePreview"></div>
									                        </label>
									                    @else
									                        <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
									                        <label for="file" class="w-100">
									                          <img  src="{{($account->users->image!="")?url('./public/img/admin/accounts',$account->users->image):url('./public/img/logo/logo2.png') }}"  style="width:250px; height: 250px;" class="rounded border image_old">
									                          <div id="imagePreview"></div>
									                        </label>
									                    @endif

									                  </div>
									                  <div class="col-md-7">
									                    <div class="form-group">
									                    <label for="name" style="font-weight: bold; ">Họ và tên(*)
                                          @if($errors->has('name'))
                                                      <div class="error-text" style="color: red;">
                                                            {{$errors->first('name')}}
                                                      </div>
                                                      @endif
                                                      </label>
                                                     
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$account->users->name}}">
                                                    
                									                    </div>
                									                    @if($account->users->gender=="Nam")
                									                       <div class="form-group">
                									                         <label for="gender" style="font-weight: bold; margin-left: 10px; ">Giới Tính</label>
                									                         <input  type="radio" name="gender" id="gender" value="Nam" checked="true"> Nam
                									                         <input  type="radio" name="gender" id="gender" value="Nữ"> Nữ
                									                      </div>
                									                    @else
                									                       <div class="form-group">
                									                         <label for="gender" style="font-weight: bold; margin-left: 10px; ">Giới Tính</label>
                									                         <input  type="radio" name="gender" id="gender" value="Nam" > Nam
                									                         <input  type="radio" name="gender" id="gender" value="Nữ" checked="true"> Nữ
                									                      </div>
                									                    @endif

                									                    <div class="form-group">
                									                        <label for="phone" style="font-weight: bold; ">Điện Thoại(*)</label>
                									                        <input type="text" class="form-control" id="phone" name="phone" number="true" value="{{  $account->users->phone}}" >
                									                     </div>
                									                      <div class="form-group">
                									                        <label for="email" style="font-weight: bold; ">Email(*)</label>
                									                        <input type="text" class="form-control" id="email" name="email" email="true" value="{{  $account->users->email}}" >
                									                    </div>
                									                  </div>
                									                  <div class="form-group">
                									                    <label for="address" style="font-weight: bold; ">Địa  Chỉ</label>
                									                    <br/>
                									                    <textarea class="form-control " id="address" name="address" rows="3">{{  $account->users->address}}</textarea>
                									                  </div>
                									                </div>
                                                 
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Lưu</button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- My billing details -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#billing_address">Đổi mật khẩu</a>
                                        </h4>
                                    </div>
                                    <div id="billing_address" class="panel-collapse collapse" role="tabpanel" >
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
