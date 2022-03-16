<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Tentang Kami </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  
   
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
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css')}}">

    <!-- CSS Apps Android -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/et-line.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets-app/css/plyr.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/css-app/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css-app/responsive.css') }}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400%7CUbuntu:400,700%7COpen+Sans" rel="stylesheet">

    {{-- End CSS Android --}}


      <style>
        .radiuz{
        border-radius: 50%;
        width : 170px;
        }
        </style>


</head>

<body>
    <section>
        @include('frontend/layouts.navbar');
    </section>
    

   <!-- Banner Area -->
   <div id="banner" class="banner">
    {{-- <div class="banner-item banner-1 steller-parallax" data-stellar-background-ratio="0.5"> --}}
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="banner-text-content">
                            <h2 class="banner-title">Dokternak kini juga tersedia <br/>dalam versi Android</h2>
                            <p class="banner-text">Download dan install aplikasinya sekarang juga!</p>
                            <div class="button-group">
                                <a class="btn btn-lg" href="https://drive.google.com/drive/folders/1Le24EEg1vmJ_rqqMDXPrjwsR_RA1jh5K?usp=sharing" target="_blank">Download</a>
                                <a class="btn btn-lg video-play" href="https://youtu.be/d8opEP-9AqU" target="_blank"><i class="fa fa-play"></i> Watch Video</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 hidden-sm hidden-xs">
                        <div class="mock right-style">
                            <img class="back-mock wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s" src="{{ asset('Frontend/images-app/mocks/banner-mock-back.png') }}" alt="mock back">
                            <img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="{{ asset('Frontend/images-app/mocks/banner-mock-front.png') }}" alt="mock front">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Banner Area End -->

    <div class="main-wrap">

        <!-- Intro Section -->
        <div class="section section-padding">
            <div class="container">
                <div class="intros">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <h4 class="intro-title">Cari Petugas</h4>
                                <p class="intro-content">Cari dokter hewan, paramedis,
                                    dan petugas inseminasi buatan.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <h4 class="intro-title">Konsultasi</h4>
                                <p class="intro-content">Konsultasi kepada petugas
                                    kesehatan hewan secara mudah.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-book"></span>
                                </div>
                                <h4 class="intro-title">Artikel</h4>
                                <p class="intro-content">Baca artikel  atau tips dan trik
                                    seputar kesehatan hewan.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </div>
                                <h4 class="intro-title">Cari Puskeswan</h4>
                                <p class="intro-content">Cek lokasi Puskeswan (Pusat 
                                    Kesehatan Hewan) terdekat.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </div>
                                <h4 class="intro-title">Tulis Artikel</h4>
                                <p class="intro-content">Tulis artikel berdasarkan sumber tertentu 
                                    atau pengalaman seputar kesehatan hewan yang ingin anda bagikan.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="intro-item wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                                <div class="intro-icon">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </div>
                                <h4 class="intro-title">Dan 10++ fitur lainnya</h4>
                                <p class="intro-content">Fitur lainnya terbagi pada hak akses admin, 
                                    petugas, dan user umum yaitu peternak/pet lovers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Intro section end -->
    </div>

    
<!-- Banner Atas Start-->
   <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Tentang Kami</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Banner End -->

 <!-- Support Company Start-->
 <div class="support-company-area fix section-padding2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="right-caption">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2">
                        {{-- <span>Siapa Kami?</span> --}}
                        <h2>Mahasiswa Politeknik Negeri Jember <br> Kampus Bondowoso</h2>
                    </div>
                    <div class="support-caption">
                        <p class="pera-top">Kami Pengembang Website Dokternak.id</p>
                        <p>Dokternak.id adalah
Sistem Informasi Tenaga Kesehatan Hewan yang merupakan sistem informasi berbasis website untuk mempermudah para peternak dalam mencari petugas kesehatan hewan terdekat serta dapat melakukan konsultasi melalui website mengenai permasalahan yang dihadapi oleh para peternak seperti penyakit pada ternak. Di dalam website ini juga terdapat tips dan trik seputar kesehatan hewan, sehingga para peternak dapat lebih mudah mengetahui atau menambah ilmu wawasan tentang kesehatan hewan. Para peternak juga dapat menulis sebuah catatan pengalaman untuk dibagikan ke website, agar peternak lain dapat mengetahui pengalaman penulis.
</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="support-location-img">
                    <img src="{{ asset('Frontend/assets/img/gallery/kami.jpg') }}" alt="">
                    <div class="support-img-cap text-center">
                        <p>Sejak</p>
                        <span>2020</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Support Company End-->
<!-- How  Apply Process Start-->
<div class="apply-process-area apply-bg pt-150 pb-150" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle white-text text-center">
                    <h2> Apa Saja Tujuan Website Ini</h2>
                </div>
            </div>
        </div>
        <!-- Apply Process Caption -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="single-process text-center  mb-30">
                    <div class="process-ion">
                        <span class="flaticon-curriculum-vitae"></span>
                    </div>
                    <div class="process-cap">
                        <h5>Sistem Informasi Tenaga Kesehatan Hewan berbasis website bertujuan untuk membantu peternak ataupun masyarakat yang mempunyai hewan peliharaan untuk mempermudah mendapatkan informasi seputar hewan peliharaannya dan informasi seputar petugas kesehatan hewan di Bondowoso. Kini website ini juga tersedia versi android, namun hanya dapat digunakan oleh user peternak saja.</h5>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- How  Apply Process End-->
<!-- Testimonial Start -->
<div class="testimonial-area testimonial-padding">
    <div class="container">
        <!-- Testimonial contents -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="h1-testimonial-active dot-style">
                    
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <!-- founder -->
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                <img src="{{ asset('Frontend/assets/img/gallery/anam.png') }}" class="radiuz" alt="">
                                    <span>Muhammad Haerul Anam</span>
                                    <p>Developer Team</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <!-- founder -->
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{ asset('Frontend/assets/img/gallery/ardan.png') }}" class="radiuz" alt="">
                                    <span>Ardan Venora Falahudin</span>
                                    <p>Developer Team</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“Kamu Merasa Ga berguna? Kopi yang pahit pun masih memiliki penggemar”</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <!-- founder -->
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                <img src="{{ asset('Frontend/assets/img/gallery/defi.png') }}" class="radiuz" alt="">
                                    <span>Defi Tamara</span>
                                    <p>Developer Team</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <!-- founder -->
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{ asset('Frontend/assets/img/gallery/wike.png') }}" class="radiuz" alt="">
                                    <span>Wike Sri Widari</span>
                                    <p>Developer Team</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“Bangkit dari kegagalan,Belajar menciptakan sesuatu yang berguna bagi banyak orang”</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Testimonial -->
                    <div class="single-testimonial text-center">
                        <!-- Testimonial Content -->
                        <div class="testimonial-caption ">
                            <!-- founder -->
                            <div class="testimonial-founder  ">
                                <div class="founder-img mb-30">
                                    <img src="{{ asset('Frontend/assets/img/gallery/widya.png') }}" class="radiuz" alt="">
                                    <span>Widya Yuristika Oktavia</span>
                                    <p>Developer Team</p>
                                </div>
                            </div>
                            <div class="testimonial-top-cap">
                                <p>“Berhenti menyalahkan segalanya ,bangkit dari kegagalan sekaligus kerjakan dengan lebih dan sepenuh hati”</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
        @include('frontend/kritikdansaran');
</section>
{{-- </main> --}}
<!-- Testimonial End -->
<section>
    @include('frontend/layouts.footer');
</section>

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
        
</body>
</html>