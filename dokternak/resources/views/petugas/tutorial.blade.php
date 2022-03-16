<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title> Tutorial </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
   </head>

   <body>
  <!-- Our Services Start -->
  @include('petugas/layouts.navbar');

  <!-- Banner Atas Start-->
  <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg')}}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>DAFTAR TUTORIAL</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="our-services section-pad-t30">
    <div class="container">
        <div class="row d-flex justify-contnet-center">
            <table>
                <tbody>
                {{-- Perulangan untuk menampilkan data sebanyak yang ada di database --}}
                    @foreach ($tutorial as $data_tutorial)
                    <tr>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                        {{-- //Code untuk menampilkan gambar yang berbentuk blob --}}
                        <img class="card-img rounded-0"src="/data/data_tutorial/{{ $data_tutorial->icon }}" width="10px" width="10px">
                        </div>
                        <div class="process-cap">
                            <h5>{{ $data_tutorial->judul_tutorial }}</h5>
                        <div class="btn_detail">
                            <div class="items-link f-center">
                            <a href="/petugas/tutorial/{{ $data_tutorial->id_tutorial }}/detail/">Detail</a>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
            </tr>
                @endforeach
                </tbody>
            </table> 
        </div>
    </div>
  </div>


</body>


<section>
@include('petugas/layouts.footer');
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