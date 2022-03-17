<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 07:20:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HeathyShop || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/img/logo/logo3.png')}}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('public/client/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('public/client/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('public/client/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('public/client/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('public/client/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('public/client/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('public/client/css/custom.css')}}">
    
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('public/client/css/style-customizer.css')}}">
    <link href="#" data-style="styles" rel="stylesheet">

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

    <!-- Modernizr JS -->
    <script src="{{asset('public/client/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    @yield('cssheader')
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        @include('client.layout.header')
       
         @include('client.layout.menu')

       	@yield('content')

         @include('client.layout.footer')


        
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{asset('public/client/js/vendor/jquery-3.1.1.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('public/client/js/bootstrap.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('public/client/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('public/client/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('public/client/js/main.js')}}"></script>
    @yield('jsfooter')
</body>


<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 07:20:53 GMT -->
</html>