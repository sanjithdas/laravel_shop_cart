<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <style>
        .btn-info{
            color: #fff;
        }
    </style>

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="#navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                    {{ __('My Profile') }}
                                    </a>

                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
           
            @auth
                <div class="container">
                    @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                @if (auth()->user()->isAdmin())
                                    <li class="list-group-item">
                                        <a href="{{route('users.index')}}">Users</a> 
                                    </li>
                                @endif    
                                <li class="list-group-item">
                                    <a href="{{route('posts.index')}}">Posts</a> 
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('categories.index')}}">Categories</a> 
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('tags.index')}}">Tags</a> 
                                </li>
                            </ul>

                            <ul class="list-group mt-5">
                                <li class="list-group-item">
                                    <a href="{{route('trashed-posts.index')}}">Trashed Posts</a> 
                                </li>
                               
                            </ul>

                            <ul class="list-group mt-5">
                                <li class="list-group-item">
                                    <a href="{{route('products.index')}}">Products (Admin only)</a> 
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                @yield('content')
            @endauth    
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"  crossorigin="anonymous"></script>
    
    <script>
        
        @if(Session::has('success'))
           toastr.success("{{ session()->get('success') }}")
        @endif
    </script>
    
    @yield('scripts')
    <script id="dsq-count-scr" src="//sass-blog-5.disqus.com/count.js" async></script>
</body>
</html>
