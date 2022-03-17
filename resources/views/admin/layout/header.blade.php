 <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-image: linear-gradient(-90deg, #AEB404, #0404B4);">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>{!!(count($list_contact_header)==0)?'':'<span class="notif-bullet"></span>'!!}
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{(count($list_contact_header)==0)?'':count($list_contact_header)}}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Thông tin liên hệ
                </h6>
                @if(count($list_contact_header)!=0)
                   @foreach($list_contact_header as $value)
                      <a href="{{ url('admin/contacts/statuschange',$value->id) }}" class="dropdown-item notify-item">
                         <p class="notify-details ml-0">
                            <b class="text-primary">{{$value->name  }}</b>
                            <span class="text-muted">{{$value->email  }}</span>
                            <span>{{ Str::words($value->content,5,'...') }}</span>
                            <small class="text-muted">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i') }}</small>
                        </p>
                      </a>
                   @endforeach
                @else
                    <p class="text-center text-danger">Hiện tại chưa thư</p>
                @endif
                <a class="dropdown-item text-center small text-gray-500" href="{{url('admin/contacts/index')}}">Xem tất cả</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">{{(count($list_bill_header)==0)?'':count($list_bill_header)}}</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Đơn hàng mới
                </h6>
                  @if(count($list_bill_header)!=0)
                    @foreach($list_bill_header as $value)
                    <a class="dropdown-item d-flex align-items-center" href="{{url('admin/bills/list_all_bill_notpayment')}}">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="{{($value->customer->users->image=='')?url('public/img/logo/logo2'): url('public/img/admin/customer',$value->customer->users->image) }}" alt=""> 
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="font-weight-bold">
                        <b>{{ $value->customer->users->name }}</b>
                        <div class="text-truncate">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i') }}</div>
                      </div>
                    </a>
                    @endforeach
                  @else
                   <p class="text-center text-danger">Hiện tại chưa có đơn hàng</p>
                  @endif
                   <a class="dropdown-item text-center small text-gray-500" href="{{ url('admin/bill/list_all_bill_notpayment') }}">Xem tất cả</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <div class="photo " style="font-weight: bold; color: white;" >
                    @if($account_users->users->image=="")
                      <img class="rounded-circle" style="width:40px; height:40px; border:3px solid white;  " src="{{url('public/img/logo/logo2.png')}}" />
                    @else
                       <img class="rounded-circle" style="width:40px; height:40px; border:3px solid white;  " src="{{url('public/img/admin/accounts/',$account_users->users->image)}}" />
                    @endif
                      {{ $account_users->users->name }}
                  </div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                 <div class="dropdown-item noti-title">
                    <h5 class="text-overflow"><small>Chào, {{ $account_users->users->name }}</small> </h5>
                  </div>

                                <!-- item-->
                  <a href="{{ url('admin/profile/info_account') }}" class="dropdown-item notify-item"><i class="fa fa-user"></i> <span>Hồ Sơ</span></a>
                                <!-- item-->
                  <a href="{{ url('admin/profile/edit_password',Auth::guard('account')->user()->id) }}" class="dropdown-item notify-item"><i class="fa fa-user"></i> <span>Đổi Mật Khẩu</span></a>

                                <!-- item-->
                  <a href="{{url('admin/logout')}}" class="dropdown-item notify-item"><i class="fa fa-power-off"></i> <span>Đăng Xuất</span></a>

                                <!-- item-->
                  <a target="_blank" href="{{ url('/') }}" class="dropdown-item notify-item"><i class="fa fa-external-link"></i> <span>Người Dùng</span></a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->