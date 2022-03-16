<header>
    @guest
    @if (Route::has('login'))
        <header>
            <!-- Header Start -->
           <div class="header-area header-transparrent">
               <div class="headder-top header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-2">
                                <!-- Logo -->
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('Frontend/assets/img/logo/logo1.png') }}" alt=""></a>
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
                                                <li><a href="/">HOME</a></li>
                                                <li><a href="/artikel">ARTIKEL </a></li>
                                                <li><a href="{{ route('login') }}">KONSULTASI</a></li>
                                                <li><a href="dokter">DOKTER</a></li>
                                                <li><a href="#">INFORMASI</a>
                                                    <ul class="submenu">
                                                        <li><a href="puskeswan">PUSKESWAN</a></li>
                                                        <li><a href="tutorial">TUTORIAL</a></li>
                                                        <li><a href="tentangkami">TENTANG KAMI</a></li>                                                 
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                          <!-- Header-btn -->
                                    <div class="header-btn d-none f-right d-lg-block">
                                        @if (Route::has('login'))
                                            <a class="btn head-btn2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        @endif
                                        @if (Route::has('register'))
                                                <a class="btn head-btn1" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                        </div>     
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
                                <a href="/home"><img src="{{ asset('Frontend/assets/img/logo/logo1.png') }}" alt=""></a>
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
                                            <li><a href="/home">HOME</a></li>
                                            <li><a href="/artikel">ARTIKEL </a></li>
                                            <li><a href="/konsultasi">KONSULTASI</a></li>
                                            <li><a href="/dokter">DOKTER</a></li>
                                            <li><a href="#">INFORMASI</a>
                                                <ul class="submenu">
                                                    <li><a href="/puskeswan">PUSKESWAN</a></li>
                                                    <li><a href="/tutorial">TUTORIAL</a></li>
                                                    <li><a href="/tentangkami">TENTANG KAMI</a></li>                                                 
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
                                                    <a href="frontend/profil"> Profil Akun </a>
                                                    <a href="frontend/change-password"> Ubah Password </a>
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
</header>