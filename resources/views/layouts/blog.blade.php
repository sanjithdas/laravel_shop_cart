<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

   

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/grid.css') }}">
   
    @yield('css')
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

       

        <section class="navbar-mobile">
        <span class="navbar-divider d-mobile-none"></span>

        
        </section>

       

        <a class="btn btn-xs btn-round btn-success btn-small" href="{{ route('login') }}">Login</a>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    {{-- <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header><!-- /.header --> --}}
    @yield('header')

    <!-- Main Content -->
    @yield('content')
    

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d2695bf8b58a567"></script>
<script>


   //alert(document.getElementById("img-container2"));
    var options = {
        width: 400,
        zoomWidth: 500,
        offset: {vertical: 0, horizontal: 10}
    };
    
    new ImageZoom(document.getElementById("img-container1"), options);
     

    
    </script>
  <script id="dsq-count-scr" src="//sass-blog-5.disqus.com/count.js" async></script>

  

  </body>
</html>
