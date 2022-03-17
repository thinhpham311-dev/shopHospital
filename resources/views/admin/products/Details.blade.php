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
      document.getElementById('imagePreview').innerHTML = '<img style="width:50px;height:50px;" src="'+e.target.result+'"/>';
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
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                               
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/products/index')  }}">sản phẩm</a></li>
                                    <li class="breadcrumb-item active">chi tiết sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-12">
                      <div class="card card-product ">
                        <div class="card-header " style="background-color:#3399FF; color:white">
                          <h2 class="text-center ">Chi Tiết Sản Phẩm</h2>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              <div class="col-lg-5 text-center">
                                  <img src="{{($product->image=="")?url('./public/img/logo/logo1.png'):url('./public/img/admin/product',$product->image)}}" style="width: 400px;height: 485px" class="rounded" >
                                   <div class="w-100 " style="margin-left: 50px;">
                                  @foreach($list_all_imageproduct as $value)
                                     <div class="float-left">
                                        <img  src="{{($value->image=="")?url('./public/img/logo/logo1.png'):url('./public/img/admin/image_products',$value->image) }}"  style="width:50px;height:50px; " class="border" />
                                        <a href="{{url('admin/image_product/delete',$value->id)}}" style="position:relative;top:-16px; color: red;"><i class="fa fa-times"></i></a>
                                    </div>
                                  @endforeach
                                    <p class="float-left" style="height:50px;width:15px; border-left:3px solid black; " class="border"></p>
                                  <form action="{{ url('admin/image_product/create') }}" method="post" enctype="multipart/form-data" class="float-left">
                                         {{ csrf_field() }}
                                         <input type="hidden" name="id_product" value="{{ $product->id }}">
                                          <div class="form-group">
                                              <input type="file" id="file" name="image" onchange="return fileValidation()" class="inputfile"/>
                                              <label for="file">
                                                <img  src="{{ url('./public/img/logo/download.jpg') }}"  style="width:50px;height:50px;" class="image_old">
                                                <div id="imagePreview"></div>
                                              </label>
                                              <button type="submit" class=" btn btn-sm btn-primary">Thêm</button>
                                           </div>

                                    </form>

                                  </div>
                              </div>
                              <div class="col-lg-7 ">
                                  <h1 class="text-left">{{ $product->name }}</h1>
                                    @if($product->status==1)
                                    <p style="background: red; width: 50px; color: white; text-align: center; border-radius: 10px;"> Mới</p>
                                  
                                    @endif
                                  <p>
                                    
                                    Đánh Giá Sản Phẩm:
                          @if($reviews_product<0)
                            không hợp lê
                          @elseif($reviews_product>=0 && $reviews_product<1 )
                            <i class="far fa-star"></i>
                           <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                           <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          @elseif($reviews_product>=1 && $reviews_product<2 )
                            <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                           <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                           <i class="far fa-star"></i>
                          @elseif($reviews_product>=2 && $reviews_product<3 )
                             <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                           <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                          @elseif($reviews_product>=3 && $reviews_product<4 )
                             <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                          <i class="fas fa-star-half-alt"></i>
                           <i class="far fa-star"></i>
                          @elseif($reviews_product>=4 && $reviews_product<5 )
                           <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                          @else
                          <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          @endif
                                  </p>
                                  <p>Ngày sản xuất: {{$product->date_start}}</p>
                                  <p>Giá thực: {{ number_format($product->unit_price) }} đồng</p>
                                  <p>Giá khuyến mãi: {{ number_format($product->promotion_price) }} đồng</p>
                               		<p>Số lượng tồn:{{ $product->inventory_number}}</p>
                                 	<p>Màu sản phẩm: <img src="{{url('public/img/admin/colorproduct/',$product->color_product->image)}}" width="20" height="20" /></p>
                                  <h6 style="font-weight: bold;">Nhà cung cấp:</h6>
                                    <p> - Tên nhà cung cấp: {{$product->provider->name}}</p>
                                    <p> - Số điện thoại: {{$product->provider->phone}}</p>
                                    <p> - Địa chỉ: {{$product->provider->address}}</p>
                                    @if($product->Guarantee==0)
                                    @else
                                    <p> <span style="font-weight: bold;">Bảo hành:</span> {{$product->Guarantee}} tháng</p>
                                    @endif
                                     @if($product->Origin==null)
                                    @else
                                    <p> <span style="font-weight: bold;"> Xuất xứ:</span> {{$product->Origin}}</p>
                                    @endif
                                      @if($product->Trademark==null)
                                    @else
                                    <p> <span style="font-weight: bold;"> Thương hiệu:</span> {{$product->Trademark}}</p>
                                  @endif
                                    <a href="{{url('admin/products/delete',$product->id)}}" class="btn btn-danger btn-user "><i class="fa fa-trash" style="color: white;"></i></a>
                                   <a href="{{url('admin/products/edit',$product->id)}}" class="btn btn-warning btn-user "><i class="far fa-edit"></i></a>
                                    <a href="{{ url('admin/products/index') }}" class="btn btn-primary btn-user ">Trở về dang sách</a>
                              </div>
                          </div>
                          <div class="w-100" style="margin-top: 20px;">
                             <h2 class="bg-success" style="color: white; height: 50px; padding-left: 20px; padding-top: 8px; border-radius: 50px;" >Mô tả chi tiết</h2>
                             <div class="border p-2" class="describe">
                                 {!! $product->describe !!}
                             </div>
                          </div>
                          @if($product->tech_product==null)

                          @else
                            <div class="w-100">
                             <h2 class="bg-success" style="color: white; height: 50px; padding-left: 20px; padding-top: 8px; border-radius: 50px;" >Thông số kỹ thuật</h2>
                             <div class="border p-2" class="tech_product">
                                 {!! $product->tech_product !!}
                             </div>
                          </div>
                          @endif
                        </div>
                       
                      <!-- end content-->
                      </div>
                      <!--  end card  -->
                    </div>
                    <!-- end col-md-12 -->
                  </div>
                  <!-- end row -->
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
@endsection
