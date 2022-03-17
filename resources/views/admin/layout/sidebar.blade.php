<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        
          <img src="{{url('public/img/logo/logo3.png')}}" width="50" height="50" style="border-radius: 50%;">
        
        <div class="sidebar-brand-text mx-3">HEATHYSHOP</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

     

      <!-- Divider -->
      <hr class="sidebar-divider">
   
          <!-- Heading -->
          <div class="sidebar-heading text-center">
            Danh mục quản lý
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             <i class="fas fa-medkit"></i>
              <span>Quản lý sản phẩm</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/type_products/index')}}">Loại sản phẩm </a>
                <a class="collapse-item" href="{{url('admin/products/index')}}">Sản phẩm</a>
                <a class="collapse-item" href="{{url('admin/providers/index')}}">Nhà cung cấp</a>
                <a class="collapse-item" href="{{url('admin/color_products/index')}}">Màu sản phẩm</a>
                 <a class="collapse-item" href="{{url('admin/categorys/index')}}">Danh mục sản phẩm</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-dollar-sign"></i>
              <span>Quản lý bán hàng</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/bills/list_all_bill_notpayment')}}">Đang xử lý </a>
                <a class="collapse-item" href="{{url('admin/bills/list_all_bill_transport')}}">Đang vận chuyển</a>
                <a class="collapse-item" href="{{url('admin/bills/list_all_bill_payment')}}">Đã thanh toán</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-user-friends"></i>
              <span>Quản lý khách hàng</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/customers/index')}}">Thông tin khách hàng</a>
                <a class="collapse-item" href="{{url('admin/comments/index')}}">Khách hàng bình luận</a>
                <a class="collapse-item" href="{{url('admin/contacts/index')}}">Thông tin liên hệ</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
              <i class="fas fa-address-card"></i>
              <span>Quản lý bài viết</span>
            </a>
            <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/taxonomys/index')}}">Thể loại</a>
                <a class="collapse-item" href="{{url('admin/posts/index')}}">Bài viết</a>
                <a class="collapse-item" href="{{url('admin/comment_post/index')}}">Bình luận</a>
              </div>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
              <i class="far fa-newspaper"></i>
              <span>Quản lý cấu hình</span>
            </a>
            <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/sliders/index')}}">Slider</a>
                <a class="collapse-item" href="">Quảng cáo</a>
              </div>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link collapsed" href="{{url('admin/accounts/index')}}"  >
              <i class="fas fa-user-shield"></i>
              <span>Quản lý tài khoản</span>
            </a>
          </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->