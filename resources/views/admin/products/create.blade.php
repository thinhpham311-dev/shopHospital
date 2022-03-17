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
  <script type="text/javascript">
    $(document).ready(function() {
      $("#change_password_group").hide();
      $("#change_password_checkbox").change(function() {
        if($(this).is(":checked"))
        {
          $("#change_password_group").show();
          $("#change_password_group :input").attr("required", "required");
        }
        else
        {
          $("#change_password_group").hide();
          $("#change_password_group :input").removeAttr("required");
        }
      });
    });
  </script>
<script src="{{ url('./public/js/ckeditor/ckeditor.js')}}"></script>
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
@section('content')
 <div class="container">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/products/index')  }}">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                <h1 class="h4 text-gray-900 mb-4">Thêm mới sản phẩm</h1>
              </div>
              <form action="{{ url('admin/products/create') }}" class="user"  method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                  <div class="row">
                  <div class="col-lg-4">
                     <div class="form-group">
                       <div class="col-5">
                            <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"  />
                               <label for="file" class="w-100">
                                 <img  src="{{ url('./public/img/logo/logo1.png') }}"  style="width:300px;height: 300px;" class="rounded border image_old">
                                  <div id="imagePreview"></div>
                               </label>
                        </div>

                  </div>
                   @if($errors->has('image'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('image')}}
                                              </div>
                                          @endif
                  </div>
                    <div class="col-lg-8">
                <div class="form-group">
                  <label>Tên sản phẩm <span style="color: red;">*</span></label>
                    <input type="text" class="form-control " name="name" id="exampleFirstName" placeholder="Tên sản phẩm" value="{{old('name')}}">
                     @if($errors->has('name'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('name')}}
                                              </div>
                                          @endif
                </div>
                 
                 <div class="form-group">
                  <label>Loại sản phẩm <span style="color: red;">*</span></label>
                     <select class="form-control"  id="id_type" name="id_type" > 
                          <option  value="">--Chọn loại sản phẩm--</option>
                          @foreach($list_all_category as $value)
                          @if(count($value->type_product)>0)
                           <optgroup label="{{$value->name}}">   </optgroup>
                           @foreach($value->type_product as $value1)
                              <option class="form-control-user "  value="{{$value1->id}}">{{$value1->name}}</option>
                           @endforeach
                           @endif

                           @endforeach
                    </select>
                     @if($errors->has('id_type'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('id_type')}}
                                              </div>
                                          @endif
                </div>
                 <div class="form-group">
                  <label>Nhà sản xuất <span style="color: red;">*</span></label>
                     <select class="form-control"  id="id_provider" name="id_provider" > 
                          <option  value="">--Chọn nhà cung cấp--</option>
                           @foreach($list_all_provider as $value)
                              <option class="form-control-user "  value="{{$value->id}}">{{$value->name}}</option>
                           @endforeach
                    </select>
                      @if($errors->has('id_provider'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('id_provider')}}
                                              </div>
                                          @endif
                </div>
                  <div class="form-group">
                  <label>Màu sản phẩm: <span style="color: red;">*</span></label>
                     <select class="form-control"  id="id_color_product" name="id_color_product" > 
                          <option  value="">--Chọn màu sản phẩm--</option>
                           @foreach($list_all_colorproduct as $value)
                              <option class="form-control-user "  value="{{$value->id}}">{{$value->name}}</option>
                           @endforeach
                    </select>
                     @if($errors->has('id_color_product'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('id_color_product')}}
                                              </div>
                                          @endif
                </div>
                
              </div>
            </div>
            <div class="row">
               <div class="col-lg-3">
              <div class="form-group">
                  <label>Giá thực <span style="color: red;">*</span></label>
                    <input type="text" class="form-control " name="unit_price"  value="{{old('unit_price')}}">
                     @if($errors->has('unit_price'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('unit_price')}}
                                              </div>
                                          @endif
                </div>
              </div>
               <div class="col-lg-3">
                 <div class="form-group">
                  <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="promotion_price"  value="{{old('promotion_price')}}">
                     @if($errors->has('promotion_price'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('promotion_price')}}
                                              </div>
                                          @endif
                </div>
              </div>
                 <div class="col-lg-2">
                <div class="form-group">
                  <label>số lượng hàng tồn</label>
                    <input type="number" class="form-control " name="inventory_number"  placeholder="0 " value="{{old('inventory_number')}}">
                     @if($errors->has('inventory_number'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('inventory_number')}}
                                              </div>
                                          @endif
                </div>
                </div>
                <div class="col-lg-3">
               <div class="form-group">
                <label>Ngày sản xuất <span style="color: red;">*</span></label>
                      <input type="date" class="form-control " name="date_start"  placeholder="Số lượng tồn " value="{{old('date_start')}}">
                </div>
              </div>
                   @if($errors->has('date_start'))
                          <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('date_start')}}
                          </div>
                    @endif
               

            </div>
                
                   <div class="form-group ">
                    <label>Mô tả <span style="color: red;">*</span></label>
                      <textarea class="form-control  ckeditor" id="describe" name="describe" >{{old('describe')}}</textarea>
                       @if($errors->has('describe'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('describe')}}
                                              </div>
                                          @endif
                  </div>
                  
                 
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                      <label class="form-check-label" for="change_password_checkbox" style="font-weight: bold;">Thêm thông tin sản phẩm</label>
                    </div>
                    <div id="change_password_group">
                    <div class="row">
                     
                      <div class="col-lg-2">
                          <label>Số ngày bảo hành</label>
                         <div class="form-group">
                          <input type="number" class="form-control" name="Guarantee"  placeholder="0" value="{{old('Guarantee')}}">
                      </div>
                      </div>
                       <div class="col-lg-4">
                      <div class="form-group">
                          <label>Xuất xứ</label>
                          <input type="text" class="form-control" name="Origin"  placeholder="Nhập xuất sứ của sản phẩm" value="{{old('Origin')}}">   
                      </div>
                    </div>
                     <div class="col-lg-4">
                      <div class="form-group">
                          <label>Thương hiệu</label>
                          <input type="text" class="form-control" name="Trademark"  placeholder="Nhập thương hiệu của sản phẩm" value="{{old('Trademark')}}">
                      </div>
                    </div>
                      </div>
                      <div class="form-group ">
                          <label>Thông số kỹ thuật</label>
                          <textarea class="form-control  ckeditor" id="tech_product" name="tech_product" >{{old('tech_product')}}</textarea>
                      </div>
                    </div>
                    
                   
                  <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Lưu</button></div>
                      <div class="col-md-2"><a href="{{ url('admin/products/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                    </div>  
              </form>
            </div> 
      </div>
    </div>

  </div>
@endsection
