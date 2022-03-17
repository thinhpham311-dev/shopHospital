 <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto" style="font-family: Arial;"><i class="fa fa-phone icon_phone ml-3" style="margin-right: 10px;"></i> <i class="zmdi zmdi-phone-in-talk"></i> <span> 0834 669 814</span> <i class="zmdi zmdi-google"></i>  <span>phamthinh30522@gmail.com</span> <i class="zmdi zmdi-google-maps"></i> <span>Long xuyên, An Giang</span>  </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="top-link clearfix">

                                <ul class="link f-right">
                                     
                                @if(Auth::check())
                                    @if($account_users->right==0)
                                    
                                    <li>    
                                             <a href="{{url('client/accounts/profile')}}">
                                             <img src="{{($account_users->users->image!="")?url('./public/img/admin/customer',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 30px; height: 30px; border-radius: 100px; margin-bottom: 5px;" class="rounded-circle">
                                             {{ $account_users->users->name }}(Khách Hàng) 
                                               </a>
                                    </li>
                                    @elseif($account_users->right==1)
                                   
                                     <li>
                                             <a href="{{url('client/accounts/profile')}}">
                                             <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 30px; height: 30px;border-radius: 100px; margin-bottom: 5px;" class="rounded-circle">
                                            {{ $account_users->users->name }}(Quản trị) 
                                            </a> 
                                    </li>
                                    <li>
                                        <a href="{{url('admin/')}}">
                                           <i class="zmdi zmdi-view-list"></i> Quản lý
                                        </a>
                                    </li>
                                    @else
                                     <li>
                                             <a href="{{url('client/accounts/profile')}}">
                                             <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 30px; height: 30px;border-radius: 100px; margin-bottom: 5px;" class="rounded-circle">
                                            {{ $account_users->users->name }}(Nhân viên)
                                            </a>  
                                    </li>
                                     <li>
                                        <a href="{{url('/staff/')}}">
                                           <i class="zmdi zmdi-view-list"></i> Quyền nhân viên sử dụng
                                        </a>
                                    </li>
                                    @endif
                                @else
                                     <li>
                                        <a href="my-account.html" style="font-family: Arial;">
                                            <i class="zmdi zmdi-account"></i>Chưa đăng nhập
                                        </a>
                                    </li>
                                @endif
                                  
                                  
                                      @if(Auth::check())
                                    <li>
                                        <a href="{{url('client/accounts/logout')}}">
                                          <i class="zmdi zmdi-lock-open"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{url('client/accounts/login')}}">
                                           <i class="zmdi zmdi-lock-outline"></i>
                                            Đăng nhập
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="{{url('/')}}">
                                        <img src="{{asset('public/img/logo/logo4.png')}}" height="50" class="hidden-xs" width="150" alt="main logo" style="float: center;">
                                    </a>
                                    
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li>
                                            <a href="{{url('/')}}" style="font-weight: bold;">Trang chủ</a> 
                                             <ul class="dropdwn">
                                                @foreach($list_all_category as $value)
                                                <li>
                                                    <img src="{{url('public/img/admin/category/',$value->image)}}" height="20" width="20"> <a href="{{url('client/type_products/list_category',$value->id)}}">{{$value->name}}</a>
                                                </li>
                                               @endforeach
                                            </ul>
                                        </li>  
                                         <li class="mega-parent"><a href="{{url('/')}}" style="font-weight: bold;">Danh mục sản phẩm</a>
                                            <div class="mega-menu-area clearfix">
                                                <div class="mega-menu-link mega-menu-link-4  f-left">
                                                     @foreach($list_all_category as $value)
                                                    @if(count($value->type_product)>0)
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">  <img src="{{url('public/img/admin/category/',$value->image)}}" height="20" width="20"> <a href="{{url('client/type_products/list_category',$value->id)}}" style="font-weight: bold;">{{$value->name}}</a></li>
                                                                @foreach($value->type_product as $value1)
                                                                <li>
                                                                   <a href="{{ url('client/products/list_product_type',$value1->id) }}">{{$value1->name}}</a>
                                                                </li>
                                                                @endforeach
                                                           
                                                       
                                                       <li><a href="{{url('client/type_products/list_category',$value->id)}}" style="font-weight: bold;">Tất Cả</a></li>
                                                    </ul>
                                                    @endif
                                                    @endforeach
                                                    </div>
                                                </div>   
                                        </li>
                                          <li >
                                            <a href="{{url('/')}}" style="font-weight: bold;">Blog</a>
                                                    <ul class="dropdwn">
                                                       
                                                        @foreach($list_all_Taxonomy_header as $list)
                                                        <li>
                                                            <a href="{{url('client/taxonomys/list_taxonomy',$list->id)}}">{{$list->name}}</a>
                                                        </li>
                                                       @endforeach
                                                      
                                                    </ul> 
                                        </li>
                                        <li>
                                            <a href="{{url('client/contacts/index')}}" style="font-weight: bold;">Liên hệ</a>
                                        </li>
                                         @if(Auth::check())
                                        <li class="mega-parent"><a href="{{url('/')}}" style="font-weight: bold;">Hồ sơ</a>
                                            <div class="mega-menu-area clearfix">
                                                <div class="mega-menu-link f-left">
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title"><a href="{{url('client/accounts/profile')}}">{{$account_users->users->name}}</a>
                                                            @if($account_users->right==1)
                                                            <span style="color: red;">(Quản trị)</span>
                                                            @elseif($account_users->right==0)
                                                            <span style="color: red;">(khách hàng)</span>
                                                            @else
                                                            <span style="color: red;">(Nhân Viên)</span>
                                                            @endif
                                                        </li>
                                                        <li>
                                                             <a href="{{url('client/accounts/edit_password',$account_users->id)}}">Đổi mật khẩu</a>
                                                            <!-- Button trigger modal -->
                                                        </li>
                                                        <li>
                                                            <a href="{{url('client/accounts/profile')}}">Hồ sơ đăng nhập</a>
                                                        </li>
                                                      
                                                         @if($account_users->right==0)
                                                        <li>
                                                            <a href="{{url('client/products/view_bill_me')}}">Lịch sử mua hàng</a>
                                                        </li>
                                                        @endif
                                                        <li>
                                                            <a href="{{url('client/accounts/logout')}}">Đăng xuất</a>
                                                        </li>
                                                    </ul>
                                                 
                                                </div>
                                                <div class="mega-menu-photo f-left">
                                                    <a href="#">
                                                        @if($account_users->right==1)
                                                            <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 300px; height: 300px;" class="rounded-circle">
                                                        @elseif($account_users->right==0)
                                                           <img src="{{($account_users->users->image!="")?url('./public/img/admin/customer',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 300px; height: 300px;" class="rounded-circle">
                                                         @else
                                                         <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 300px; height: 300px;" class="rounded-circle">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                            <form action="{{ url('client/search/index') }}" method="get">
                                                <div class="top-search-box">
                                                    <input type="text" name="keyword" placeholder="Hãy nhập sản phẩm cần mua...">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                @if(Auth::check())
                                    @if(Auth::user()->right==0)
                                    @if(Session::has('cart'))
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="#">
                                                    <span class="cart-quantity">({{Session('cart')->totalQty}})</span><br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>                            
                                            </div>
                                            <ul>
                                                <li>
                                                    <div class="top-cart-inner your-cart">
                                                        <h5 class="text-capitalize">GIỎ HÀNG</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total-cart-pro">
                                                        <!-- single-cart -->
                                                         @foreach($product_cart as $product)
                                                        <div class="single-cart clearfix">
                                                            <div class="cart-img f-left">
                                                                <a href="#">
                                                                    <img src="{{ url('./public/img/admin/product',$product['item']['image']) }}" width="100" height="100" alt="Cart Product" />
                                                                </a>
                                                                <div class="del-icon">
                                                                    <a href="{{url('client/products/delete_cart',$product['item']['id'])  }}">
                                                                        <i class="zmdi zmdi-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="cart-info f-left">
                                                                <h6 class="text-capitalize">
                                                                    <a href="#">{{Str::words($product['item']['name'],4,'...')}}</a>
                                                                </h6>
                                                                <p style="font-family: Arial;">
                                                                     <span style="font-family: Arial;">Giá<strong>:</strong> </span>
                                                                    {{($product['item']['promotion_price']==0)?number_format($product['item']['unit_price']):number_format($product['item']['promotion_price'] ) }}  đồng
                                                                </p>
                                                                <p style="font-family: Arial;">
                                                                      <span style="font-family: Arial;">Số lượng:</span>{{ $product['qty'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                       @endforeach
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner subtotal">
                                                        <h4 class="text-uppercase g-font-2" style="font-family: Arial">
                                                            Tổng tiền  =  
                                                            <span>{{number_format(Session('cart')->totalPrice) }} vnd</span>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="{{ url('client/products/payment_cart') }} ">Xem giỏ hàng</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    @endif
                                    
                                    @endif
                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        <!-- END HEADER AREA -->