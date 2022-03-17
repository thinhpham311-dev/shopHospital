 @extends('admin.layout.master')
@section('content')
 <div class="container">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/providers/index')  }}">Nhà cung cấp</a></li>
                                    <li class="breadcrumb-item active">Thêm nhà cung cấp</li>
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
                <h1 class="h4 text-gray-900 mb-4">Thêm mới thông tin nhà cung cấp</h1>
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
              <form class="user" action="{{ url('admin/providers/create') }}" method="post" >
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="name">Tên nhà cung cấp <span style="color: red;">*</span></label>
                    <input type="text" class="form-control " id="name" name="name" placeholder=" nhập Tên nhà cung cấp" required="true">
                </div>
                <div class="form-group row">
                  <label for="phone">Số điện thoại <span style="color: red;">*</span></label>
                    <input type="text" class="form-control " id="phone" name="phone" placeholder=" nhập số điện thoại" required="true">
                </div>
                   <div class="form-group row">
                    <label for="address">Địa chỉ <span style="color: red;">*</span></label>
                      <textarea class="form-control" id="address" name="address" placeholder=" nhập địa chỉ" required="true"></textarea>
                  </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Lưu</button></div>
                      <div class="col-md-2"><a href="{{ url('admin/providers/index') }}" class="btn btn-primary btn-block">Trở lại DS</a></div>
                      </div>   
              </form>
            </div>
         
       
      </div>
    </div>

  </div>
@endsection
