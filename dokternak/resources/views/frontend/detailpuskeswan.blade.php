<?php
// Start the session
//session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokternak.id - Detail Puskeswan</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="{{ asset('Petugas/css/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('Petugas/css/bootstrap.min.cs')}}s" rel="stylesheet">
    <link href="{{ asset('Petugas/styles/main.css')}}" rel="stylesheet">

    <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('Petugas/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/price_rangs.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{ asset('Petugas/assets/css/style.css')}}">


    <style>
      .capt {
      margin-top: 0%;
      margin-bottom: 3%;
      text-transform: uppercase;
      font-weight: bold;
      color: white;
    }
    </style>

  <base target='_blank' />
  </head>
  <body id="top">

  <header>
 
 @include('frontend/layouts.navbar');
 </header>

  <div class="page-content">
      <!-- <div> -->

      <!-- Koneksi Database / Pemanggilan Data dari Tabel Dokter -->
 

    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header page-header-small" filter-color="green">
          <div class="page-header-image" data-parallax="true" 
          data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}"></div>
          {{-- style="background-image:{{ asset('Frontend/assets/img/gallery/s2.jpg')}}" --}}
          <div class="container">
            <div class="content-center">
              <div class="cc-profile-image"><a href="#"><img src="/data/data_puskeswan/{{ $puskeswan->gambar }}" alt="Image"/></a></div>
              <div class="h2 title">{{ $puskeswan->nama_puskeswan }}</div>
              <p class="capt">{{ $puskeswan->alamat}}</p>
              <a class="genric-btn primary" href="{{ $puskeswan->maps}}" terget="_blank">Cek Lokasi</a>
            </div>
          </div>
          <div class="section">
            <div class="button-container">
              <a class="fab fa-facebook" href="#" rel="tooltip" title="Follow me on Facebook"></a>
              <a class="fab fa-twitter" href="#" rel="tooltip" title="Follow me on Twitter"></a>
              <a class="fab fa-google-plus" href="#" rel="tooltip" title="Follow me on Google+"></a>
              <a class="fab fa-instagram" href="#" rel="tooltip" title="Follow me on Instagram"></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section" id="about">
      <div class="container">
        <div class="card" data-aos="fade-up" data-aos-offset="10">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Jam Kerja</div>
                <p>{{ $puskeswan->jam_kerja}}</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Lokasi</div>
                <div class="row">
                  <div class="col-sm-4"><strong class="text-uppercase">Alamat</strong></div>
                  <div class="col-sm-8">{{ $puskeswan->alamat}}</div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section" id="reference">
      <div class="container cc-reference">
          <div class="h4 mb-4 text-center title">Tenaga Medis</div>
          <div class="card" data-aos="zoom-in">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">

                  @foreach ($petugas as $item)
                  <div class="col-lg-2 col-md-3 cc-reference-header">
                    <img class="rounded-circle z-depth-0" src="/data/data_dokter/{{ $item->foto }}" alt="Image"/>
                    <div class="h6 pt-2"><b></b></div>
                    {{-- <p class="category">{{ $item->jabatan }}</p> --}}
                    <strong class="text-uppercase">{{ $item->nama_dokter }}</strong>
                    <p>{{ $item->jabatan }} | {{ $item->tempat }}</p>
                    <a class="genric-btn primary" href="/dokter/{{ $item->id_dokter }}/detail" >Detail</a>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
      </div>
    </div> 

    {{-- <div class="section" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="h4 text-center mb-4 title">Dokumentasi</div>
          </div>
        </div>
        <div class="tab-content gallery mt-5">
          <div class="tab-pane active" id="web-development">
            <div class="ml-auto mr-auto">
              <div class="row">


                  <div class="col-md-6">
                    <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="#">
                        <figure class="cc-effect"><img src="gambar_dokumentasi.php?id_dokumentasi=" alt="Image"/>
                          <figcaption>
                            <div class="h4"></div>
                            <p></p>
                          </figcaption>
                        </figure></a>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  --}}
  </div><br><br>

    <!-- Java Script -->
    <script src="{{ asset('Petugas/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{ asset('Petugas/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('Petugas/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('Petugas/js/now-ui-kit.js?v=1.1.0')}}"></script>
    <script src="{{ asset('Petugas/js/aos.js')}}"></script>
    <script src="{{ asset('Petugas/scripts/main.js')}}"></script>

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