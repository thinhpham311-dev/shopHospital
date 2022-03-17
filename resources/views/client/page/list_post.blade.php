 @extends('client.layout.master')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">{{$Taxonomy->name}}</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li>{{$Taxonomy->name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
             
                    <div class="row">
                     
                    	@foreach($list_all_posts as $list)
                        @if($list->status==1)
                        <!-- blog-item start -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-item">
                                <img src="{{($firstimage[$list->id]==''?url('public/img/noimage.png'):$firstimage[$list->id])  }}" alt="" style="height: 350px;">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">{{$list->post_title}}</a></h5>
                                     <div class="mb-1 text-muted" style="font-family: Arial; color: white;">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $list->created_at)->format('d/m/Y H:i') }}</div>
                                    <p>{{Str::limit($list->post_excerpt, 150)}}</p>
                                    <div class="read-more">
                                        <a href="{{url('client/posts/details_posts',$list->id)}}">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href=""><i class="zmdi zmdi-favorite"></i>{{ $list->post_views }} lượt xem.</a>
                                        </li>
                                  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- blog-item end -->
                        @endif
                       @endforeach
                     
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->             

        </div>
        <!-- End page content -->
@endsection