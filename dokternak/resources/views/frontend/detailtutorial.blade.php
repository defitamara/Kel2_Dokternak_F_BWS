<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Dokternak.id - Tutorial </title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  
   <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/slicknav.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/price_rangs.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/animate.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/magnific-popup.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/fontawesome-all.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/themify-icons.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/slick.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/nice-select.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css')}}">
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css')}}">
</head>

<body>
    @include('frontend/layouts.navbar');
   <!-- Hero Area Start-->
   <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg')}}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>TUTORIAL</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Hero Area End -->

        <!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>TUTORIAL</span>
                                <h2>{{ $tutorial->judul_tutorial }}</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">Kami berharap anda dapat memperoleh pengalaman terbaik di website kami. Berikut ini adalah tutorial mengenai </p>
                                <p>{{ $tutorial->isi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img class="card-img rounded-0" src="/data/data_tutorial/{{ $tutorial->icon }}">
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
        <!-- Support Company End-->
        <!-- How  Apply Process Start-->
        {{-- <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <h4><b>Tutorial Lainnya</b><h4>
                        </div>
                    </div>
                <!-- Apply Process Caption -->
  <div class="our-services section-pad-t30">
            <div class="container">
                <div class="row d-flex justify-contnet-center">
                   
                        <div class="col-lg-4 col-md-6">
                        <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($tutorial->icon)) }}"><br>
                            
                                </div>
                                <div class="services-cap">
                                    <h5>{{ $tutorial->judul_tutorial }}</h5><br><br>
                                    <div class="btn_detail">
                                <div class="services-cap">
                                    <a href="detailtutorial.php?id_tutorial=" class="genric-btn primary radius">Detail</a>
                                    </div>
                                </div>
                                </div>
                            </div> 
                        </div> 
                </div>
                </div>
                </div>
            </div>
        </div> --}}
        <!-- How  Apply Process End-->

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