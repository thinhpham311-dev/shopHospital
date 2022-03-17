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
@endsection
<!--start section(jsfooter)-->

<!--start section(jsfooter)-->
@section('content')
 <div class="container">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/type_products/index')  }}">Loại sản phẩm</a></li>
                                    <li class="breadcrumb-item active">Cập nhật loại sản phẩm</li>
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
                <h1 class="h4 text-gray-900 mb-4">Cập nhật loại sản phẩm</h1>
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
                              <!--start error-->
                              @if(count($errors)>0)
                                <div class="alert alert-danger"  id="error">
                                  @foreach($errors->all() as $err)
                                    {{$err}}<br/>
                                  @endforeach
                                </div>
                              @endif
                               <!--end error-->
              <form class="user" action="{{ url('admin/type_products/edit', $typeproduct->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-lg-3">
                     <div class="form-group">
                      <div class="col-5">
                           @if($typeproduct->image=="")
                           <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                              <label for="file" class="w-100">
                               <img  src="{{ url('./public/img/logo/logo1.png') }}"  style="width:200px;height: 200px;" class="rounded border image_old">
                               <div id="imagePreview"></div>
                               </label>
                           @else
                               <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                               <label for="file" class="w-100">
                                <img  src="{{ url('./public/img/admin/typeproduct',$typeproduct->image) }}"  style="width:200px;height: 200px;" class="rounded border image_old">
                                <div id="imagePreview"></div>
                               </label>
                          @endif
                     </div>
                  </div>
                   </div>
                  <div class="col-lg-9">
                   <div class="form-group">
                      <label for="name"> Tên loại sản phẩm</label>
                        <input type="text" class="form-control " id="name" name="name" value="{{$typeproduct->name}}" placeholder="nhập tên loại sản phẩm">
                   </div>
                 <div class="form-group">
                 <label>Loại sản phẩm</label>
                    <select class="form-control  border rounded pl-2" data-style="btn btn-link" id="id_type" name="id_type">
                                  <optgroup label="Loại sản phẩm cũ">
                                    <option value="{{ $typeproduct->id_category }}">{{ $typeproduct->category->name }}</option>
                                  </optgroup>
                                  <optgroup label="Chọn loại sản phẩm mới">
                                    @foreach($list_name_category as $list)
                                      <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                  </optgroup>
                                </select>
                      </div>
                  </div>
                 </div>
                   <div class="form-group">
                    <label for="description"> Mô tả</label>
                      <textarea class="form-control  ckeditor" id="description" name="description" >{{$typeproduct->description}}</textarea>
                  </div>
                   
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Lưu</button></div>
                      <div class="col-md-2"><a href="{{ url('admin/type_products/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                      </div>   
              </form>
            </div>
         
       
      </div>
    </div>

  </div>
@endsection
