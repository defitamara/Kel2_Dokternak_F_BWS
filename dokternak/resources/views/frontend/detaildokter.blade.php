<?php
// Start the session
// session_start();
// if (!isset($_SESSION["username"])) {
//     header("location:daftar_dokter.php?pesan=gagal");
// }
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokternak.id - Detail Dokter</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
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

    <style type="text/css">
    .label-telpon {
      font-size: 85%;
      margin-bottom: 0%
    }
    .capt {
      margin-top: 0%;
      margin-bottom: 3%;
      text-transform: uppercase;
      font-weight: bold;
      color: white;
    }
    </style>

</head>
<body id="top">

<header>
 
@include('frontend/layouts.navbar');
</header>

    <div class="page-content">
      <div>

      <!-- Koneksi Database / Pemanggilan Data dari Tabel Dokter -->
      
    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header page-header-small" filter-color="blue">
          <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('Frontend/assets/img/gallery/s2.jpg')}}');"></div>
          <div class="container">
            <div class="content-center">
              <div class="cc-profile-image"><a href="#"><img src="/data/data_dokter/{{ $dokter->foto }}" /></a></div>
              <div class="h2 title">{{ $dokter->nama_dokter }}</div>
              <p class="capt">{{ $dokter->jabatan}}</p>
              <a class="genric-btn primary" href="https://api.whatsapp.com/send?phone={{ $dokter->telpon }}">WhatsApp</a>
              <a class="genric-btn primary" href="/tuliskonsultasi">Konsultasi</a>
            </div>
          </div>
          <div class="section">
            <div class="container">
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
                <div class="h4 mt-0 title">Jadwal Kerja</div>
                <p>{{ $dokter->jadwal_kerja }}</p>
                <div class="h4 mt-0 title">Wilayah Kerja</div>
                <p>{{ $dokter->tempat }}</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Profil</div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Jenis Kelamin</strong></div>
                  <div class="col-sm-8">{{ $dokter->jenis_kelamin }}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Telepon</strong></div>
                  <div class="col-sm-8">
                  <a class="genric-btn primary" href="tel:" rel="tooltip" title="Telpon Langsung"><span class="fa fa-phone"></span></a>
                  {{ $dokter->telpon }}<br>
                  <p class="label-telpon">Tekan tombol telpon untuk melakukan panggilan langsung</p>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Alamat</strong></div>
                  <div class="col-sm-8">{{ $dokter->alamat }}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Email</strong></div>
                  <div class="col-sm-8">{{ $dokter->email }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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