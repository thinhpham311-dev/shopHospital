 <!-- START MOBILE MENU AREA -->
        <div class="mobile-menu-area hidden-lg hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="{{url('/')}}" style="font-weight: bold;">Trang chủ</a>
                                        <ul>
                                             @foreach($list_all_category as $value)
                                            <li>
                                               <a href="{{url('client/type_products/list_category',$value->id)}}"> <img src="{{url('public/img/admin/category/',$value->image)}}" height="30" width="30"> {{$value->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/')}}" style="font-weight: bold;">Danh mục sản phẩm</a>  
                                        <ul>
                                             @foreach($list_all_category as $value)
                                              @if(count($value->type_product)>0)
                                            <li> <a href="{{url('client/type_products/list_category',$value->id)}}" style="font-weight: bold;"><img src="{{url('public/img/admin/category/',$value->image)}}" height="20" width="20"> {{$value->name}}</a>
                                                <ul>
                                                     @foreach($value->type_product as $value1)
                                                        <li>
                                                             <a href="{{ url('client/products/list_product_type',$value1->id) }}"><img src="{{url('public/img/admin/typeproduct/',$value1->image)}}" width="30" height="30">{{$value1->name}}</a>
                                                        </li>
                                                     @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                             @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            @foreach($list_all_Taxonomy_header as $list)
                                            <li>
                                                <a href="{{url('client/taxonomys/list_taxonomy',$list->id)}}">{{$list->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{url('client/contacts/index')}}">Liên hệ</a>
                                    </li>
                                       @if(Auth::check())
                                    <li>
                                        <a href="{{url('/')}}">Hồ sơ</a>
                                        <ul>
                                             <li >
                                                 <a href="{{url('client/accounts/profile')}}" style="font-weight: bold;">
                                                 @if($account_users->right==1)
                                                            <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 50px; height: 50px; border-radius:100px; border: 2px solid red;" class="rounded-circle">
                                                        @elseif($account_users->right==0)
                                                           <img src="{{($account_users->users->image!="")?url('./public/img/admin/customer',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 50px; height: 50px;  border-radius:100px; border: 2px solid green;" class="rounded-circle">
                                                         @else
                                                         <img src="{{($account_users->users->image!="")?url('./public/img/admin/accounts',$account_users->users->image):url('./public/img/logo/logo2.png') }}" style="width: 50px; height: 50px;  border-radius:100px; border: 2px solid blue;" class="rounded-circle">
                                                        @endif
                                                  {{$account_users->users->name}}
                                                @if($account_users->right==1)
                                                <span style="color: red;">(Quản trị)</span>
                                                @elseif($account_users->right==0)
                                                <span style="color: blue;">(khách hàng)</span>
                                                @else
                                                <span style="color: green;">(Nhân Viên)</span>
                                                @endif
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{url('client/accounts/edit_password',$account_users->id)}}">Đổi mật khẩu</a>
                                                            <!-- Button trigger modal -->
                                            </li>
                                            <li>
                                                <a href="{{url('client/accounts/profile')}}">Hồ sơ cái nhân</a>
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
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE MENU AREA -->