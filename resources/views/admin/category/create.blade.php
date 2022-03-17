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
   .inputfile1
  {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .inputfile1 + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    display: inline-block;
    cursor: pointer;
  }

  .inputfile1:focus + label,
  .inputfile1 + label:hover {
   opacity: 0.5;
  }
</style>
@endsection
<!--end section(cssheader)-->
<!--start section(jsfooter)-->
@section('jsfooter')
<script src="{{url('public/js/ckeditor/ckeditor.js')}}"></script>
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
  function fileValidation1()
  {
      var fileInput = document.getElementById('file1');
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
      document.getElementById('imagePreview1').innerHTML = '<img style="width:100%;height:300px; opacity:1.0" class="rounded mx-auto d-block" src="'+e.target.result+'"/>';
        };
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  }
</script>
<script >
  $(function(){
    $('#file1').change(function(){
      $('.image_old1').hide();
    });
  });
</script>
@endsection
<!--start section(jsfooter)-->
@section('content')
 <div class="container">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/categorys/index')  }}">Danh mục sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Thêm danh mục loại sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
      
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Thêm mới danh mục loại sản phẩm</h1>
              </div>
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
                             
              <form class="user" action="{{ url('admin/categorys/create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="name">Tên danh mục sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" class="form-control " id="name" name="name" placeholder=" nhập Tên loại sản phẩm" value="{{old('name')}}">
                     @if($errors->has('name'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('name')}}
                                              </div>
                                          @endif
                </div>
                
                   <div class="form-group">
                    <label for="description">Mô tả</label>
                      <textarea class="form-control  ckeditor" id="description" name="description" >{{old('description')}}</textarea>
                       @if($errors->has('description'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('description')}}
                                              </div>
                                          @endif
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <div class="col-5">
                          <label>Hình ảnh <span style="color: red;">*</span></label>
                            <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                               <label for="file" class="w-100">
                                 <img  src="{{ url('./public/img/logo/logo1.png') }}"  style="width:300px;height: 300px;" class="rounded border image_old">
                                  <div id="imagePreview"></div>
                               </label>
                        </div>
                         @if($errors->has('image'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('image')}}
                                              </div>
                                          @endif
      					  </div>
                </div>
                  <div class="col-lg-6">
                  <div class="form-group">
                    <div class="col-5">
                          <label>Hình ảnh quảng cáo <span style="color: red;">*</span></label>
                            <input type="file" id="file1" name="image_banner" onchange="return fileValidation1()" class="inputfile1"/>
                               <label for="file1" class="w-100">
                                 <img  src="{{ url('./public/img/logo/logo1.png') }}"  style="width:300px;height: 300px;" class="rounded border image_old1">
                                  <div id="imagePreview1"></div>
                               </label>
                        </div>
                         @if($errors->has('image_banner'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('image_banner')}}
                                              </div>
                                          @endif
                    </div>
                  </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Lưu</button></div>
                      <div class="col-md-2"><a href="{{ url('admin/categorys/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                      </div>   
              </form>
            </div>
         
       
      </div>
    </div>

  </div>
@endsection
