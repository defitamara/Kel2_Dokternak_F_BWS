<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Artikel </title>
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
    @include('penyuluh/layouts.navbar');

    <!-- Banner Atas Start-->
   <div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>DAFTAR ARTIKEL</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <table>
                        <tbody>
                            {{-- Perulangan untuk menampilkan data sebanyak yang ada di database --}}
                            @foreach ($artikel as $data_artikel)
                            <tr>
                            <article class="blog_item">
                                    <div class="blog_item_img">
                                        {{-- //Code untuk menampilkan gambar yang berbentuk blob --}}
                                        <!-- <img class="card-img rounded-0" src="data:image/png;base64,{{ chunk_split(base64_encode($data_artikel->gambar)) }}" alt="gambar artikel"> -->
                                        <img class="card-img rounded-0" src="/data/data_artikel/{{ $data_artikel->gambar }}">
                                        <a href="/penyuluh/artikel/{{ $data_artikel->id_artikel }}/detail/" class="blog_item_date">
                                            <h3>{{ $data_artikel->nama_penulis }}</h3>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2><a href="/penyuluh/artikel/{{ $data_artikel->id_artikel }}/detail/">{{ $data_artikel->judul }}</a></h2>
                                        </a>
                                        {{-- Code untuk memotong text menggunakan Str limit --}}
                                        <p>{!! \Illuminate\Support\Str::limit($data_artikel->isi, 250) !!}  <a href="/penyuluh/artikel/{{ $data_artikel->id_artikel }}/detail/" class="more-btn">  <strong> Read more » </strong></a></p>
                                        <ul class="blog-info-link">
                                            <li><a>{{ $data_artikel->kategori_artikel }}</a></li>
                                            <li><a>{{ $data_artikel->tanggal }}</a></li>
                                        </ul>
                                    </div>
                            </article>
                            </tr>
                            @endforeach
                            @if ($artikel->isEmpty())
                            <div class="col">
                                <center>
                                    <img src="{{ asset('Frontend/assets/img/icon/error.png') }}" class="datatidakada" alt="Data Kosong">
                                </center>
                            </div>
                            @endif
                            </tbody>
                        </table> 
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <div class="btn_tulis">
                            <div class="items-link f-center">
                                <a href="/penyuluh/tulisartikel" class="genric-btn primary">++ TULIS ARTIKEL</a>
                            </div>
                        </div>
                        <aside class="single_sidebar_widget search_widget">
                            <form action="/penyuluh/artikel/cari" method="GET">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'" name="cari">
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-primary mb-1" value="CARI">
                                        </div>
                                    </div>
                                </div>
                                <!-- <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button> -->
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach ($kategori_artikel as $data_katartikel)
                                <li>
                                    <a href="/penyuluh/artikel/kategori?cari={{ $data_katartikel->kategori_artikel }}" class="d-flex">
                                        <p> {{ $data_katartikel->kategori_artikel }}</p>
                                        <p></p>
                                    </a>
                                </li>  
                                @endforeach                       
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
     <!--Pagination Start  -->
     <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <!-- <div class="col-xl-10"> -->
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">     
                        {{-- //pagination use bootstrap --}}
                        {{ $artikel->links()}}
                        </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <section>
        @include('penyuluh/layouts.footer');
    </section>

        
    <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('Frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('Frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('Frontend/assets/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/price_rangs.js') }}"></script>

		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('Frontend/assets/js/wow.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/animated.headline.js') }}"></script>
		
		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('Frontend/assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('Frontend/assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.magnific-popup.js') }}"></script>

        <!-- contact js -->
        <script src="{{ asset('Frontend/assets/js/contact.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.form.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/mail-script.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('Frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/main.js') }}"></script>
        
</body>
</html>