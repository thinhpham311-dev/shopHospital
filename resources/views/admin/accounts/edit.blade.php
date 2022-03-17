@extends('admin.layout.master')
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
<script >
  $(function(){
    $('#file').change(function(){
      $('.image_old').hide();
    });
    $('#btn_edit_password_show').click(function(){
       $('#container_password').removeClass('d-none');
       $('#btn_edit_password_show').addClass('d-none');
       $('#btn_edit_password_hide').removeClass('d-none');
    });
    $('#btn_edit_password_hide').click(function(){
       $('#container_password').addClass('d-none');
       $('#btn_edit_password_hide').addClass('d-none');
       $('#btn_edit_password_show').removeClass('d-none');
    });
  });
</script>
  <script>
    $(function(){
      $(".form-group a").click(function(){
        let $this = $(this);

        if($this.hasClass('active'))
        {
          $this.parents('.form-group').find('input').attr('type','password')
          $this.removeClass('active');
        }else{
           $this.parents('.form-group').find('input').attr('type','text')
            $this.addClass('active')
        }
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
                                <h1 class="main-title float-left" style="color: white;">Thay Đổi Thông Tin đăng nhập </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/accounts/index')  }}">tài khoản</a></li>
                                    <li class="breadcrumb-item active">thay đổi thông tin tài khoản</li>
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
                          <form action="{{ url('admin/accounts/edit',$accounts->id) }}" method="post" id="TypeValidation" enctype="multipart/form-data" >
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
                                     <div class="col-md-4">
                                      <div class="form-group">
                                      <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                                      <label for="file" class="w-100 text-center">
                    									 @if($accounts->right==0)
                                       <img  src="{{($accounts->users->image!="")?url('./public/img/admin/customer',$accounts->users->image):url('./public/img/logo/logo2.png') }}"  style="width:300px;height:300px;" class="rounded border image_old">
                                    @else
                                       <img  src="{{($accounts->users->image!="")?url('./public/img/admin/accounts',$accounts->users->image):url('./public/img/logo/logo2.png') }}"  style="width:300px;height:300px;" class="rounded border image_old">
                                    @endif

                                        <div id="imagePreview"></div>
                                      </label>
                                   </div>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Họ và tên<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$accounts->users->name}}" >
                                         @if($errors->has('name'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('name')}}
                                              </div>
                                          @endif
                                      </div>
                                      <div class="row">
                                        <div class="col-md-2">
                                          <label for="gender" class="bmd-label-floating">Giới Tính</label>
                                        </div>
                                        <div class="col-md-9">
                                          <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                              <input class="form-check-input" {{($accounts->users->gender=="Nam")?'checked':''}} checked type="radio" name="gender" id="gender" value="Nam"> Nam
                                              <span class="circle">
                                                  <span class="check"></span>
                                              </span>
                                            </label>
                                          </div>
                                          <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                              <input class="form-check-input" {{($accounts->users->gender=="Nữ")?'checked':''}} type="radio" name="gender" id="gender" value="Nữ"> Nữ
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
                                            <optgroup label="Quyền hạn cũ">
                                            <option value="{{ $accounts->id }}">
                                                @if($accounts->right==0)
                                                khách hàng
                                                @elseif($accounts->right==1)
                                                Quản trị
                                                @else
                                               nhân viên 
                                                @endif
                                            </option>
                                          </optgroup>
                                           <optgroup label="Quyền hạn mới">
                                            <option value="">--  Chọn quyền hạn  --</option>
                                              <option value="1">Quản trị</option>
                                              <option value="2">Nhân viên</option>
                                            </optgroup>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="phone" class="bmd-label-floating">Điện Thoại<span style="color: red;">*</span></label>
                                          <input type="text" class="form-control" id="phone" name="phone" value="{{$accounts->users->phone}}" >
                                           @if($errors->has('phone'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('phone')}}
                                              </div>
                                          @endif
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="bmd-label-floating">Email<span style="color: red;">*</span></label>
                                          <input type="text" class="form-control" id="email" name="email" value="{{$accounts->users->email}}"   >
                                           @if($errors->has('email'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('email')}}
                                              </div>
                                          @endif
                                        </div>
                                    </div>
                                  </div>
                                  <br/>
                                   
                                     <div class="w-100 ">
                                       <a href="#" class="btn-primary btn-sm  mb-4" id="btn_edit_password_show">Hiện Đổi mật khẩu </a>
                                        <a href="#" class="btn-primary btn-sm  mb-4 d-none" id="btn_edit_password_hide">Ẩn Đổi mật khẩu</a>
                                  </div>
                                   <div class="row d-none " id="container_password">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                         <label for="username">Tài Khoản<span style="color: red;">*</span></label>
                                         <input type="text" class="form-control" id="username" name="username"  value="{{ $accounts->username }}">
                                          @if($errors->has('username'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('username')}}
                                              </div>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group " >
                                          <label for="password" class="bmd-label-floating">Mật khẩu<span style="color: red;">*</span></label>
                                          <input type="password" class="form-control" id="password" name="password"/>
                                           <a href="javascript:;void(0)" style="position: absolute; top: 45%; right: 20px; color: #333;"><i class="fa fa-eye"></i></a>
                                           @if($errors->has('password'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('password')}}
                                              </div>
                                          @endif
                                        </div>
                                      </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                    <label for="address">Địa  Chỉ<span style="color: red;">*</span></label>
                                    <textarea class="form-control " id="address" name="address" rows="3">{{$accounts->users->address  }}</textarea>
                                     @if($errors->has('address'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('address')}}
                                              </div>
                                          @endif
                                  </div>

                                </div>
                                </div>
                              </div>

                             <div class="row">
                              <div class="col-md-4"></div>
                              <div class="col-md-2" style="margin-bottom: 10px;"><button type="submit" class="btn btn-primary btn-block">Cập nhật</button></div>
                              <div class="col-md-2" style="margin-bottom: 10px;"><a href="{{ url('admin/accounts/index') }}" class="btn btn-primary btn-block" >Trở lại DS</a>
                              </div>
                            </div>  
                              <div class="col-md-3"></div>
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
