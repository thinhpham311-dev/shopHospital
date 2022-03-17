@extends('client.layout.master')
@section('content')
 <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- BY BRAND SECTION START-->
            <div class="by-brand-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Blog sức khỏe</h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                    <div class="by-brand-product">
                        <div class="row active-by-brand slick-arrow-2">
                      
                            @foreach($list_all_posts as $list)
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="{{url('public/img/admin/taxonomy/',$list->taxonomy->image)}}" alt="" style="height: 200px;"></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="{{url('client/taxonomys/list_taxonomy',$list->taxonomy->id)}}" > {{$list->Taxonomy->name}} </a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                             @endforeach
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- BY BRAND SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="card mt-3 shadow-sm">
		            <h5 class="card-header" style="font-family: Arial; font-weight: bold;">{{ $posts->post_title }}</h5>
		            <div class="card-body">
		                <p class="small text-muted mb-1" style="font-family: Arial;">{{ $posts->created_at }} - {{ $posts->post_views }} lượt xem.</p>
		                <p class="text-justify" style="font-family: Arial;">{{$posts->post_excerpt }}</p>
		                <p class="text-justify" style="font-family: Arial;">{!!$posts->post_content !!}</p>

		            </div>
                </div>            
            
            <!-- FEATURED PRODUCT SECTION END -- -->
            <div class="row mb-3">
                <div class="col-12">
                  
                        <form action="{{ url('/admin/comments/create') }}" method="post">
                          {{ csrf_field() }}
                            <input type="hidden" name="id_account " />
                            <input type="hidden" name="id_post "  />
                            <div class="form-group">
                                <label for="comment_content">Nội dung bình luận</label>
                                <textarea class="form-control @error('comment_content') is-invalid @enderror" id="comment_content" name="comment_content" placeholder=""></textarea>
                                @error('comment_content')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Đăng bình luận</button>
                        </form>
                  
                </div>
                <div class="col-12 mt-3">
                    <ul class="list-unstyled">
                            @foreach($list_comment_post as $value)
                        <li class="media">
                        <img src="{{ asset('public/images/noimage.png') }}" width="50" class="mr-3 img-thumnails" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $value->accounts->name }}</h5>
                            <p class="blog-post-meta mb-1">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i') }}</p>
                            <p class="text-justify">{{ $value->comment_content }}</p>
                        </div>
                    </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>
        <!-- End page content-->
@endsection