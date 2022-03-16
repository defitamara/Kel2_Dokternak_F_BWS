<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dokternak') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css')}}">
        <style>
            .avatar{
                width: 35px;
                height: 35px;
                border-radius: 100%;
                background-color: black;
                border:1px solid white;
            }
        </style>
</head>
<body>
{{-- <header>
    @guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif
    
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    @else
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="LandingPageDokter.php"><img src="{{ asset('Frontend/assets/img/logo/logo1.png') }}" alt=""></a>
                            </div> 
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9">
                                <div class="menu-wrapper">
                                   <!-- Main-menu -->
                                   <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="LandingPagePeternak.php">HOME</a></li>
                                            <li><a href="daftar_artikel.php">ARTIKEL </a></li>
                                            <li><a href="riwayat_konsultasi.php">KONSULTASI</a></li>
                                            <li><a href="daftar_dokter.php">DOKTER</a></li>
                                            <li><a href="#">INFORMASI</a>
                                                <ul class="submenu">
                                                    <li><a href="daftarpuskeswan.php">PUSKESWAN</a></li>
                                                    <li><a href="daftar_tutorial.php">TUTORIAL</a></li>
                                                    <li><a href="aboutus.php">TENTANG KAMI</a></li>                                                 
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="main-menu f-right">
                                        <ul>
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>        
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-lg-3 col-md-2">                 
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
        @endguest
    </header> --}}
    @include('frontend/layouts.navbar');

    <main class="py-4">
        @yield('content')
    </main>
</body>
<!-- JS here -->
	
		  <!-- All JS Custom Plugins Link Here here -->
          <script src="{{ asset('Petugas/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
          <!-- Jquery, Popper, Bootstrap -->
          <script src="{{ asset('Petugas/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/popper.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/bootstrap.min.js') }}"></script>
          <!-- Jquery Mobile Menu -->
          <script src="{{ asset('Petugas/assets/js/jquery.slicknav.min.js') }}"></script>
  
          <!-- Jquery Slick , Owl-Carousel Plugins -->
          <script src="{{ asset('Petugas/assets/js/owl.carousel.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/slick.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/price_rangs.js') }}"></script>
          
          <!-- One Page, Animated-HeadLin -->
          <script src="{{ asset('Petugas/assets/js/wow.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/animated.headline.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.magnific-popup.js') }}"></script>
  
          <!-- Scrollup, nice-select, sticky -->
          <script src="{{ asset('Petugas/assets/js/jquery.scrollUp.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.nice-select.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.sticky.js') }}"></script>
          
          <!-- contact js -->
          <script src="{{ asset('Petugas/assets/js/contact.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.form.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.validate.min.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/mail-script.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/jquery.ajaxchimp.min.js') }}"></script>
          
          <!-- Jquery Plugins, main Jquery -->	
          <script src="{{ asset('Petugas/assets/js/plugins.js') }}"></script>
          <script src="{{ asset('Petugas/assets/js/main.js') }}"></script>
        
</html>