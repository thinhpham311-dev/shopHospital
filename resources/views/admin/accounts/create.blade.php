@extends('admin.layout.master')
<!--start section(cssheader)-->
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
<!--end section(cssheader)-->
<!--start section(jsfooter)-->
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
      document.getElementById('imagePreview').innerHTML = '<img style="width:300px;height:300px; opacity:1.0" class=" border rounded mx-auto d-block" src="'+e.target.result+'"/>';
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
@endsection
<!--start section(jsfooter)-->
<!--start section(content)-->
@section('content')
     <div class="content-page" style="margin-bottom: 10px;">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left" style="color: white;">Đăng Ký Tài Khoản</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/accounts/index')  }}">tài khoản</a></li>
                                    <li class="breadcrumb-item active">đăng ký tài khoản</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-product">
                        <div class="card-header ">
                           <h2 class="text-center">Thông Tin Nhập</h2>
                        </div>
                        <div class="card-body">
                        
                          <!--start form-->
                          <form action="{{ url('admin/accounts/create') }}" method="post" id="TypeValidation" enctype="multipart/form-data" >
                            {{ csrf_field() }}

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
                           
                                <div class="row">

                                <div class="col-12">
                                  <div class="row">
                                      <div class="col-lg-4">
                                   <div class="form-group">
                                      <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                                      <label for="file" class="w-100 text-center">
                                        <img  src="{{ url('./public/img/logo/logo2.png') }}"  style="width:300px;height:300px;" class="rounded border image_old">
                                        <div id="imagePreview"></div>
                                      </label>
                                    </div>
                                   </div>

                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Họ và tên<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                          @if($errors->has('name'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('name')}}
                                              </div>
                                          @endif
                                      </div>
                                      <div class="row">
                                        <div class="col-md-2">
                                          <label for="name" class="bmd-label-floating">Giới Tính</label>
                                        </div>
                                        <div class="col-md-9">
                                          <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                              <input class="form-check-input" checked type="radio" name="gender" id="gender" value="Nam"> Nam
                                              <span class="circle">
                                                  <span class="check"></span>
                                              </span>
                                            </label>
                                          </div>
                                          <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                              <input class="form-check-input" type="radio" name="gender" id="gender" value="Nữ"> Nữ
                                              <span class="circle">
                                                  <span class="check"></span>
                                              </span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class=" row">
                                        <label for="right" class="col-md-2">Quyền hạn<span style="color: red;">*</span></label>
                                        <div class="col-md-10">
                                          <select id="right" class="form-control " name="right">
                                            <option value="">--  Chọn quyền hạn  --</option>
                                              <option value="1">Quản trị</option>
                                              <option value="2">Nhân viên</option>
                                              
                                          </select>
                                            @if($errors->has('right'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('right')}}
                                              </div>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="phone" class="bmd-label-floating">Số Điện Thoại<span style="color: red;">*</span></label>
                                          <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                                            @if($errors->has('phone'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('phone')}}
                                              </div>
                                          @endif
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="bmd-label-floating">Địa chỉ Email<span style="color: red;">*</span></label>
                                          <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                            @if($errors->has('email'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('email')}}
                                              </div>
                                          @endif
                                        </div>
                                    </div>
                                  </div>
                                  <br/>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="username" class="bmd-label-floating">Tài khoản<span style="color: red;">*</span></label>
                                          <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" >
                                            @if($errors->has('username'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('username')}}
                                              </div>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="password" class="bmd-label-floating">Mật khẩu<span style="color: red;">*</span></label>
                                          <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" >
                                            @if($errors->has('password'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('password')}}
                                              </div>
                                          @endif
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                               <div class="form-group">
                                <label for="address">Địa  Chỉ <span style="color: red;">*</span></label>
                                <br/>
                                <textarea class="form-control " id="address" name="address" rows="3">{{old('address')}}</textarea>
                                  @if($errors->has('address'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('address')}}
                                              </div>
                                          @endif
                              </div>

                            <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Đăng ký</button></div>
                              <div class="col-md-2"><a href="{{ url('admin/products/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                            </div>  
                          </form>
                          <!--end form-->
                        </div>
                      <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                   {{--  <div class="col-md-1"></div> --}}

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
