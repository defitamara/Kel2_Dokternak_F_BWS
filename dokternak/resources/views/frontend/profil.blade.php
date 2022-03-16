<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokternak.id - Profil Akun</title>
    <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- CSS here -->
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
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style3.css')}}">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

.card {
  /* position:absolute; */
  margin-top: 400px;
  margin-bottom: -400px;
  top:80%;
  left:50%;
  transform:translate(-50%,-50%);
  width:80%;
  min-height:820px;
  background:#fff;
  box-shadow:0 20px 50px rgba(0,0,0,.1);
  border-radius:10px;
  transition:0.5s;
}
.card:hover {
  box-shadow:0 30px 70px rgba(0,0,0,.2);
}
.card .box {
  position:absolute;
  top:50%;
  left:0;
  transform:translateY(-50%);
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  width:100%;
}
.card .box .img {
  width:120px;
  height:120px;
  margin:0 auto;
  border-radius:50%;
  overflow:hidden;
}
.card .box .img img {
  width:100%;
  height:100%;
}
.card .box h2 {
  font-size:20px;
  color:#262626;
  margin:20px auto;
}
.card .box h2 span {
  font-size:14px;
  background:#aa8c70;
  color:#fff;
  display:inline-block;
  padding:4px 10px;
  border-radius:15px;
}
.card .box p {
  color:#262626;
}
.card .box span {
  display:inline-flex;
}
.card .box ul {
  margin:0;
  padding:0;
}
.card .box ul li {
  list-style:none;
  float:left;
}
.card .box ul li a {
  display:block;
  color:#aa8c70;
  margin:0 10px;
  font-size:20px;
  transition:0.5s;
  text-align:center;
}
.card .box ul li:hover a {
  color:#aa8c70;
  /* transform:rotateY(360deg); */
}
</style>
</head>

<body>
    @include('frontend/layouts.navbar');
     {{-- Alert --}}
     @if ($message = Session::get('success'))
     <div class="alert alert-success" role="alert">
         {{ $message }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     @endif
 <div class="slider-area ">
  <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Profil Akun</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <!-- Banner End -->
   
<section class="blog_area section-padding">
    
    <div class="container">
                  <div class="card">
                      <div class="box">
                        @csrf
                        {{-- @foreach ($profil as $profils) --}}
                          <div class="img">
                              <img src="https://wsjti.id/dokternak/public/data/data_peternak/{{ $profil->foto_peternak }}" alt="gambar peternak" width="300px">
                          </div>        
                          <br><h3><b>{{ $profil->namadepan_peternak }} {{ $profil->namabelakang_peternak }}</b><br></h3>
                          <h2><span></span></h2><hr>
                          <span>Email :</span><br>
                          <span><b>{{ $profil->email_peternak }}</b></span> <BR><hr>
                          <span>No. HP/WA :</span><br>
                          <span><b>{{ $profil->no_hp }}</b></span><HR>
                          <span>Alamat :</span><br>
                          <span><b>{{ $profil->alamat }}</b></span><HR>
                          <span>Jenis Kelamin : </span>
                          <span><b>{{ $profil->jenis_kelamin }}</b></span> <BR>
                          <span>
                              <ul>
                                  <li><a href="{{ route("editprofil.edit",['id'=>$profil->id_peternak]) }}" ><i class="fas fa-edit" aria-hidden="true"></i><span>Edit Akun</span></a></li>
                              </ul>
                          </span>
                      </div>
                  </div>
                  {{-- @endforeach --}}
      </div>
</section>

<footer>
    @include('frontend/layouts.footer');
</footer>


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