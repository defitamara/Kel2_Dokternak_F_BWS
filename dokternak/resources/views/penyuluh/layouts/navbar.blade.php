<header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-lg-3 col-md-2">
                         <!-- Logo -->
                         <div class="logo">
                             <a href="#"><img src="{{ asset('Petugas/assets/img/logo/logo1.png') }}" alt=""></a>
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
                                         <li><a href="/lppenyuluh">HOME</a></li>
                                         <li><a href="/penyuluh/artikel">ARTIKEL </a></li>
                                         <li><a href="/penyuluh/respon-konsultasi">NOTIFIKASI</a></li>
                                         <li><a href="/penyuluh/tutorial">TUTORIAL</a></li>
                                     </ul>
                                 </nav>
                             </div>
                             <!-- Header-btn -->
                             <div class="main-menu f-right">
                                <ul>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{-- {{ Auth::user()->name }} --}}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/penyuluh/change-password"> Ubah Password </a>
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
 </header>