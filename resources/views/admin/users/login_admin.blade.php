<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{asset('public/Login_v1/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/Login_v1/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
     <nav class="navbar navbar-expand-lg navbar-light" style="background:#ffb6c1;">
    <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="margin-right: 20px;"><a class="nav-link" href="{{url('/')}}" style="font-family: Arial; font-weight: bold;"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ </a></li>
            <li class="nav-item" style="margin-right: 20px; margin-top: 10px;"><i class="fa fa-facebook"></i></li>
            <li class="nav-item" style="margin-right: 20px; margin-top: 10px;"><i class="fa fa-google"></i></li>
             <li class="nav-item" style="margin-top: 10px;"><i class="fa fa-twitter"></i></li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" style="font-family: Arial; font-weight: bold;"><i class="fa fa-address-card" aria-hidden="true"></i> Đăng nhập</a></li>
          </ul>
    </nav>
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{asset('public/Login_v1/images/img-01.png')}}" alt="IMG">
        </div>

        <form action="{{ url('admin/login') }}" method="post" class="login100-form validate-form">
          {{ csrf_field() }}
           @if(Session::has('notification'))
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> {{Session::get('notification')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
               @endif
              
          <span class="login100-form-title" style="font-family: Arial; font-weight: bold;">
            Đăng nhập
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" placeholder="Tên đăng nhập">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            </span>
              @if($errors->has('username'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('username')}}
                                              </div>
                                          @endif
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu" />
            <a href="javascript:;void(0)" style="position: absolute; top: 30%; right: 15px; color: #333;"><i class="fa fa-eye"></i></a>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
              @if($errors->has('password'))
                                              <div class="error-text" style="color: red; font-family: Arial;">
                                                  {{$errors->first('password')}}
                                              </div>
                                          @endif
          </div>
          
          <div class="container-login100-form-btn">
             <button type="submit" class="login100-form-btn">Đăng Nhập</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="{{asset('public/Login_v1/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('public/Login_v1/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('public/Login_v1/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('public/Login_v1/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('public/Login_v1/vendor/tilt/tilt.jquery.min.js')}}"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
<script>
    $(function(){
      $(".wrap-input100 a").click(function(){
        let $this = $(this);

        if($this.hasClass('active'))
        {
          $this.parents('.wrap-input100').find('input').attr('type','password')
          $this.removeClass('active');
        }else{
           $this.parents('.wrap-input100').find('input').attr('type','text')
            $this.addClass('active')
        }
      });
    });
</script>
</body>
</html>