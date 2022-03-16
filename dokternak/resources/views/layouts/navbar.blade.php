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
        <!-- Header End -->
</header>