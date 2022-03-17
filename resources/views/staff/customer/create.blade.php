@extends('staff.layout.master')
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
@section('content1')
     <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                               <h1 class="main-title float-left" style="color: white;">Đăng Ký Khách Hàng</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('/staff/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('manage/customers/index')  }}">Khách hàng</a></li>
                                    <li class="breadcrumb-item active">Đăng ký khách hàng</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
           {{--  <div class="col-md-2"></div> --}}
            <div class="col-md-12">
              <div class="card card-product">
                <div class="card-header ">
                  <h2 class="card-title text-center">Thông Tin Nhập</h2>
                </div>
                <div class="card-body">

                  <!--start form-->
                  <form action="{{ url('manage/customers/create') }}" method="post" id="TypeValidation" enctype="multipart/form-data" >
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
                      <!--start error-->
                      @if(count($errors)>0)
                        <div class="alert alert-danger"  id="error">
                          @foreach($errors->all() as $err)
                            {{$err}}<br/>
                          @endforeach
                        </div>
                      @endif
                       <!--end error-->
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
                                    <div class="col-lg-8">
                                      <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Họ và tên(*)</label>
                                        <input type="text" class="form-control" id="name" name="name" required="true">
                                      </div>
                                      <div class="row">
                                        <div class="col-4">
                                          <label for="name" class="bmd-label-floating">Giới Tính</label>
                                        </div>
                                        <div class="col-8">
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
                                        <label for="type" class="col-md-3">Loại khách hàng(*)</label>
                                        <div class="col-md-9">
                                          <select id="type" class="form-control " name="type">
                                            <option value="">--  Chọn loại khách hàng  --</option>
                                              <option value="0">Thường</option>
                                              <option value="1">Vip</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="phone" class="bmd-label-floating">Điện Thoại(*)</label>
                                          <input type="text" class="form-control" id="phone" name="phone" number="true" required="true" >
                                      </div>
                                      <div class="form-group">
                                        <label for="address">Địa  Chỉ</label>
                                        <textarea class="form-control " id="address" name="address" rows="3"></textarea>
                                  </div>

                                    </div>

                                  </div>
                                  <br/>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                           <label for="username" class="bmd-label-floating">Tài khoản(*)</label>
                                           <input type="text" class="form-control" id="username" name="username"  required="true" >
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="bmd-label-floating">email(*)</label>
                                          <input type="text" class="form-control" id="email" name="email" email="true" required="true" >
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                           <label for="password" class="bmd-label-floating">Mật khẩu(*)</label>
                                           <input type="password" class="form-control" id="password" name="password"  required="true" >
                                        </div>
                                        <div class="form-group">
                                             <label for="confirm_password" class="bmd-label-floating">Xác nhận mật khẩu(*)</label>
                                             <input type="password" class="form-control" id="confirm_password" name="confirm_password"  required="true" >
                                        </div>
                                      </div>
                                  </div>
                            <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Đăng ký</button></div>
                              <div class="col-md-2"><a href="{{ url('admin/customers/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                            </div>  
                          </form>
                          <!--end form-->
                        </div>
                      <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                    {{-- <div class="col-md-2"></div> --}}

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
