  @extends('client.layout.master')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title" style="font-family: Arial;">LIÊN HỆ</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li>Liên Hệ</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- ADDRESS SECTION START -->
            <div class="address-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-pin"></i>
                                <h6 style="font-family: Arial"> Chi nhánh 1: 223/6 Lương Thế Vinh, Phường Mỹ Long, TP. Long Xuyên, tỉnh An Giang</h6>
                                <h6 style="font-family: Arial"> Chi nhánh 2: </h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-phone"></i>
                                <h6><a href="tel:555-555-1212">070-289-5474</a></h6>
                                <h6><a href="tel:555-555-1212">070-612-6413</a></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-email"></i>
                                <h6>Heathyshop@gmail.com</h6>
                                <h6>info@Heathyshop.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADDRESS SECTION END --> 
            
            <!-- GOOGLE MAP SECTION START -->
            <div class="google-map-section" style="margin-bottom: 100px;">
                <div class="container-fluid">
                    <div class="google-map plr-185">
                         <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.627229108094!2d105.43015021428428!3d10.371661069371429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2sAn%20Giang%20University!5e0!3m2!1svi!2s!4v1570543116371!5m2!1svi!2s" width="1045" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    </div>
                </div>
            </div>
            <!-- GOOGLE MAP SECTION END -->
            
                        
                                         <!--start notification -->
                                       @if(Session::has('notification'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <!-- MESSAGE BOX SECTION START -->
            <div class="message-box-section mt--50 mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="message-box box-shadow white-bg">
                                <form id="contact-form" action="{{url('client/contacts/create')}}" method="post">

                                     {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="blog-section-title border-left mb-30" style="font-family: Arial;">Gửi thông tin liên hệ</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Nhập họ và tên">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="email" placeholder="Nhập Email">
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <textarea class="custom-textarea" name="content" placeholder="Nhập thông tin cần liện hệ"></textarea>
                                            <button class="submit-btn-1 mt-30 btn-hover-1" type="submit" style="font-family: Arial;">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MESSAGE BOX SECTION END --> 
        </section>
        <!-- End page content -->
@endsection