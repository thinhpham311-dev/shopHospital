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
@section('content')
	 <!-- Begin Page Content -->
        <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Danh sách thể loại bài viết</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Thể loại bài viết</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
             
                 <form action="{{ url('admin/taxonomys/edit',$taxonomy->id) }}" method="post" class="mt-3 mr-4" class="float-right">
                          {{ csrf_field() }}
                          <div class="float-right">
                            <label>Tên tiêu đề</label>
                            <input type="text" name="name" value="{{$taxonomy->name}}" class="border pl-2">
                          
                          </div>
                          <div class="float-right">
                            <label>Hình ảnh mô tả</label>
                             @if($taxonomy->image=="")
                                            <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                                            <label for="file" class="w-100">
                                               <img  src="{{ url('./public/img/logo/logo1.png') }}"  style="width:300;height: 150px;" class="rounded border image_old">
                                               <div id="imagePreview"></div>
                                            </label>
                                        @else
                                             <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                                             <label for="file" class="w-100">
                                               <img  src="{{ url('./public/img/admin/taxonomy',$taxonomy->image) }}"  style="width:300;height: 150px;" class="rounded border image_old">
                                               <div id="imagePreview"></div>
                                            </label>
                                        @endif
                                </div>
                                  <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i> Cập nhật</button>
                             <a href="{{ url('admin/taxonomys/index')}}" class="btn btn-primary btn-sm ml-2"><i class="fas fa-undo-alt"></i> Trở Lại</a>
                </form>
            </div>
             @if(Session::has('notification'))
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{Session::get('notification')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên danh mục</th>
                      <th class="text-center">Hình ảnh mô tả</th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên danh mục</th>
                      <th class="text-center">Hình ảnh mô tả </th>
                      <th class="text-center">Chức năng</th>
                    </tr>
                    <th colspan="8">
                        <div class="float-right">
                            Tổng cộng : {{ count($list_all_taxonomy) }} thể loại
                         </div>
                      </th>
                  </tfoot>
                   
                  <tbody>
                    @foreach($list_all_taxonomys as $value)
                     <tr>
                         <td class="text-center">{{$number_order= $number_order+1}}</td>
                        <td class="text-center">{{$value->name}}</td>
                        <td class="text-center"><img src="{{url('public/img/admin/taxonomy',$value->image)}}" style="width: 300px; height: 150px;"> </td>
                        <td class="text-center"> 
                            <a href="{{url('admin/taxonomys/delete',$value->id)}}" class="btn btn-danger btn-user "><i class="fa fa-trash"></i></a>
                            <a href="{{url('admin/taxonomys/edit',$value->id)}}" class="btn btn-warning btn-user "><i class="fa fa-wrench"></i></a>
                        </td>
                     </tr>
                    @endforeach
                  </tbody>
                </table>
                 <p class="text-center">{{ $list_all_taxonomys->links() }}</p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection