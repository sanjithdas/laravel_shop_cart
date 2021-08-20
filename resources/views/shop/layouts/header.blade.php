<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}



    <!--Styles for RTL-->s

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    @yield('css')

</head>


<body>
@yield('video')
<header class="header" id="site-header">


    <div class="container">

        <div class="header-content-wrapper">

            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{ Cart::content()->count()}}</span>
                    </a>
                    @if (Cart::content()->count()<=0)
                        <div class="cart-popup-wrap">
                            <div class="popup-cart">
                                <h4 class="title-cart">No products in the cart!</h4>
                                <p class="subtitle">Please make your choice.</p>
                                <div class="btn btn-small btn--dark">
                                    <span class="text">view all catalog</span>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">${{ Cart::total()}}</h4>
                            <a href="{{ route('cart') }}">
                            <div class="btn btn-small btn--dark">
                            <span class="text">View cart</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endif

                </li>
            </ul>
        </div>

    </div>

</header>


@yield('content')

<!-- Footer -->

@include('shop.layouts.footer')
{{--<script src="{{ asset('js/toastr.min.js') }}"></script>--}}



<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/crum-mega-menu.js')}}"></script>
<script src="{{asset('js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('js/theme-plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/form-actions.js')}}"></script>

<script src="{{asset('js/velocity.min.js')}}"></script>
<script src="{{asset('js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('js/animation.velocity.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- ...end JS Script -->

<script>

    @if (Session::has('success'))
    //alert('here');
        toastr.success('{{ Session::get('success') }}')
    @endif
    @if (Session::has('purchased'))
     toastr.success('{{ Session::get('purchased') }}')
    @endif
</script>


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>
