<!-- START FOOTER AREA -->

<footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner gray-bg">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="img/logo/logo.png" alt="">

                                        </div>
                                        <div class="footer-brief">
                                            <p style="font-family: Arial;">Heathyshop thành lập năm 2019. Chúng tôi luôn mang đến những sản phẩm chất lượng cho khách hàng, giúp khách hàng chọn lựa những sản phẩm theo nhu cầu cùa khách hàng và đảm bảo sức khỏe cho người tiêu dùng</p>
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Danh mục sản phẩm</h4>
                                        <ul class="footer-menu">
                                            
                                            @foreach($list_all_category as $value)
                                            <li>
                                                <a href="{{url('client/type_products/list_category',$value->id)}}"><i class="zmdi zmdi-circle"></i><span>{{$value->name}}</span></a>
                                            </li>
                                           @endforeach
                                        </ul>
                                    </div>
                                </div>
                              
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Gửi ý kiến phản hồi</h4>
                                        <div class="footer-message">
                                            <form action="{{url('client/contacts/create')}}" method="post">
                                                 {{ csrf_field() }}

                                                <input type="text" name="name" placeholder="Nhập họ và tên">
                                                <input type="text" name="email" placeholder="Nhập email">
                                                <textarea class="height-80" name="content" placeholder="Gửi ý kiến phản hồi"></textarea>
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" style="font-family: Arial;">Gửi</button> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright-text">
                                        <p style="font-family: Arial;">© 2020 Bản quyền thuộc quyền sở hữu của <a href="http://www.agu.edu.vn/" target="_blank">Trường Đại Học An Giang</a></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <ul class="footer-payment text-right">
                                        <li>
                                            <a href="#"><img src="{{asset('public/client/img/payment/1.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('public/client/img/payment/2.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('public/client/img/payment/3.jpg')}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{asset('public/client/img/payment/4.jpg')}}" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->'