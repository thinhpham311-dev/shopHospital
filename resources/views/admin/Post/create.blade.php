@extends('admin.layout.master')
<!--start section(jsfooter)-->
@section('jsfooter')
<script src="{{ url('./public/js/ckeditor/ckeditor.js')}}"></script>
@endsection
<!--start section(jsfooter)-->
<!--start section(content)-->
@section('content')
     <div class="container">
   <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('admin/')  }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/typeproducts/index')  }}">Bài viết</a></li>
                                    <li class="breadcrumb-item active">Thêm bài viết</li>
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
                <h1 class="h4 text-gray-900 mb-4">Thêm bài viết</h1>
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
              <form class="user" action="{{ url('admin/posts/create') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="id_taxonomy">Thể Loại</label>
                                <select name="id_taxonomy" id="id_taxonomy" class="form-control border p-1 custom-select" >
                                  <option value="">Chọn Thể Loại</option>
                                  @foreach($list_all_taxonomy as $list)
                                      <option value="{{ $list->id }}">{{ $list->name }}</option>
                                  @endforeach
                                </select>
                </div>
                   <div class="form-group row">
                   <label for="post_title">Tiêu Đề</label>
                                <input type="text"  name="post_title" id="post_title" class="form-control border p-1">
                  </div>
                   <div class="form-group row">
                   <label for="post_excerpt">Tóm Tắt Nội Dung</label>
                                <input type="text"  name="post_excerpt" id="post_excerpt" class="form-control border p-1" >
                  </div>
                   <div class="form-group">
                   <label for="post_content">Nôi dung</label>
                                <br/>
                                <textarea class="form-control ckeditor border p-1" id="post_content" name="post_content" rows="3"></textarea>
                  </div>
               <div class="form-group">
                        <input class="form-check-input" type="checkbox" id="comment_status" name="comment_status" {{ old('comment_status') ? 'checked' : '' }} />
                  <label class="form-check-label" for="comment_status">Cho phép bính luận</label>
                </div>
                    <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block"><i class="far fa-save"></i> Lưu</button></div>
                      <div class="col-md-2"><a href="{{ url('admin/posts/index') }}" class="btn btn-primary btn-block"><i class="fas fa-undo-alt"></i> Trở lại DS</a></div>
                      </div>   
              </form>
            </div>
         
       
      </div>
    </div>

  </div>
@endsection
<!--end section(content)-->
