<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dokternak.id - Kritik dan Saran</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  
   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{'Frontend/assets/css/bootstrap.min.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/owl.carousel.min.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/slicknav.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/price_rangs.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/animate.min.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/magnific-popup.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/fontawesome-all.min.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/themify-icons.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/slick.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/nice-select.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/style.css'}}">
      <link rel="stylesheet" href="{{'Frontendassets/css/responsive.css'}}">
</head>

<body>
   <!-- Banner-->
   <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Kritik dan Saran</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Banner End-->
   <!--================Kritik saran =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         @if (session('success'))
            <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
            </div>
         @endif
         <div class="row">
            <div class="col-lg-8 posts-list">
               

               <div class="comment-form">
                   <h4>Hai, apakah ada sesuatu yang menyulitkan anda di website ini? Mungkin kami bisa membantu anda.</h4>
                  <p>Silahkan tulis kritik / saran anda disini.</p>
                  <form method="POST" action="{{ route('kritiksaran.store') }}" enctype="multipart/form-data">
                     {!! csrf_field() !!}
                  {{-- <form class="form-contact comment_form" action="kritiksaran_aksi.php" id="commentForm" method="POST"> --}}
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                               <input type="hidden" name="tanggal" value="{{ date("Y-m-d") }}">
                              <textarea class="form-control w-100" name="komentar" id="komentar" cols="30" rows="9"
                                 placeholder="Tuliskan komentar anda disini"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email_hp" id="email_hp" type="text" placeholder="Email / No.HP">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="pekerjaan" id="pekerjaan" type="text" placeholder="Pekerjaan">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Kirim</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- Akhir dari kritik dan saran -->
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