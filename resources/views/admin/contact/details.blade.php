@extends('admin.layout.master')
@section('content')
   
      <div class="container">
    <div class="row">
                        <div class="col-xl-12">
                           <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"> Chi Tiết liên hệ</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active"> chi tiết liên hệ </li>
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
                <h1 class="h4 text-gray-900 mb-4">Chi tiết thư của các hàng</h1>
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
             <div class="row">
                  <div class="col-6">
                      <p class="float-left"><span style="font-weight: bold;">Họ và tên:</span> {{$contact->name }}</p>
                  </div>
                  <div class="col-6">
                      <p class="float-right"><span style="font-weight: bold;">Email:</span> {{$contact->email }}</p>
                  </div>
            </div>
                <p><span style="font-weight: bold;">Nội dung</span></p>
                <p class="border p-3">{{$contact->content }}</p>
                  <div class="row">
                      <div class="col-6">
                          <p class="float-left"><span style="font-weight: bold;">Ngày tạo:</span> {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contact->created_at)->format('d/m/Y H:i') }} </p>
                      </div>
                      <div class="col-6">
                          <p class="float-right"><span style="font-weight: bold;">Ngày cập nhật:</span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $contact->updated_at)->format('d/m/Y H:i') }}</p>
                      </div>
                  </div>
                  <div class="float-right">
                          <a href="https://mail.google.com" target="_blank" class="btn btn-primary"><i class="fa fa-envelope fa-lg">  Chuyển sang trang gmail</i></a>
                          <a href="{{ url('admin/contacts/index') }}" class="btn btn-danger" >Trở Lại Danh Sách</a>
                  </div>
            </div>
         
       
      </div>
    </div>

  </div>
@endsection
 
          