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
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style2.css') }}">
{{-- @extends('frontend/layouts.template') --}}
@extends('layouts.app')
@section('content')

<main>

    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('Frontend/assets/img/gallery/s2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h2><span id="title-ajakan">Temukan Dokter Hewan <br> di Lingkungan Terdekatmu <br>  <br> </span></h2>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                             <!-- form -->
                             <form method="POST" action="/home/cari" class="search-box">
                                {{ csrf_field() }}
                                <div class="input-form">
                                    {{-- <input type="text" placeholder="Masukkan Nama Dokter" name="cari_petugas" id="s_keyword" value=""> --}}
                                    <input list="cari_petugas" class="form-control {{ $errors->has('cari_petugas') ? 'is-invalid' : ''}}" placeholder='Masukkan Nama Dokter' id="s_keyword" name="cari_petugas" >
                                    <datalist id="cari_petugas" name="cari_petugas">
                                        @foreach ($data['pencarian_dokter'] as $data_doktercari)
                                        <option value="{{ $data_doktercari->nama_dokter }}" >{{ $data_doktercari->nama_dokter }}</option>
                                        @endforeach
                                        @foreach ($data['penyuluh'] as $data_penyuluh)
                                        <option value="{{$data_penyuluh->nama_penyuluh}}"> {{$data_penyuluh->nama_penyuluh}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="input-form">
                                    {{-- <div class="select-itms"> --}}
                                    <input list="kategori_kecamatan" class="form-control {{ $errors->has('kategori_kecamatan') ? 'is-invalid' : ''}}" placeholder='Masukkan Lokasi Kecamatan' id="s_keyword" name="kategori_kecamatan" >
                                    <datalist id="kategori_kecamatan" name="kategori_kecamatan">
                                        <option value="Bondowoso" >Bondowoso</option>
                                        <option value="Binakal" >Binakal</option>
                                        <option value="Cermee">Cermee</option>
                                        <option value="Curahdami">Curahdami</option>
                                        <option value="Grujugan" >Grujugan</option>
                                        <option value="Jambesari" >Jambesari</option>
                                        <option value="Klabang" >Klabang</option>
                                        <option value="Maesan" >Maesan</option>
                                        <option value="Pakem" >Pakem</option>
                                        <option value="Prajekan" >Prajekan</option>
                                        <option value="Pujer" >Pujer</option>
                                        <option value="Sempol" >Sempol</option>
                                        <option value="Sukosari" >Sukosari</option>
                                        <option value="Sumberwringin" >Sumberwringin</option>
                                        <option value="Taman Krocok" >Taman Krocok</option>
                                        <option value="Tamanan" >Tamanan</option>
                                        <option value="Tapen" >Tapen</option>
                                        <option value="Tegalampel">Tegalampel</option>
                                        <option value="Tenggarang" >Tenggarang</option>
                                        <option value="Tlogosari" >Tlogosari</option>
                                        <option value="Wonosari" >Wonosari</option>
                                        <option value="Wringin" >Wringin</option>
                                    </datalist>
                                    {{-- </div> --}}
                                </div>
                                <div class="">
                                {{-- <a><button id="search" name="search" class="btn head-btn1">Cari</button></a> --}}
                                <a><input type="submit" class="btn btn-primary mb-1" class="btn head-btn1" value="CARI"></a>
                                </div>	
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- slider Area End-->
                <!-- Featured_job_start -->
                <section class="featured-job-area feature-padding">
                    <div class="container">
                        <!-- Section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle text-center">
                                    <h5>KABUPATEN BONDOWOSO</h5>
                                    <h2>Daftar Dokter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                @if (! $kode = 11)
                                <table>
                                <tbody>
                                <tr>
                                @foreach ($data['dokter'] as $data_dokter)
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                 <div class="job-items">
                                     <div class="company-img">
                                         <a><img class="center" src="/data/data_dokter/{{ $data_dokter->foto }}" alt="" width="100" height="100"></a>
                                     </div>
                                     <div class="job-tittle">
                                         <a href="/dokter/{{ $data_dokter->id_dokter }}/detail/"><h4>{{ $data_dokter->nama_dokter }}</h4></a>
                                         <ul>
                                             <li>{{ $data_dokter->jabatan }}</li>
                                             <li><i class="fas fa-map-marker-alt"></i>{{ $data_dokter->tempat }}</li>
                                             <li>{{ $data_dokter->telpon }}</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="items-link f-right">
                                     <a href="/dokter/{{ $data_dokter->id_dokter }}/detail/" >Detail</a>
                                     {{-- <span>7 hours ago</span> --}}
                                 </div>
                             </div>
                                @endforeach
                                @endif
                                @foreach ($data['dokter'] as $data_dokter)
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                 <div class="job-items">
                                     <div class="company-img">
                                         <a><img class="center" src="/data/data_dokter/{{ $data_dokter->foto }}" alt="" width="100" height="100"></a>
                                     </div>
                                     <div class="job-tittle">
                                         <a href="/dokter/{{ $data_dokter->id_dokter }}/detail/"><h4>{{ $data_dokter->nama_dokter }}</h4></a>
                                         <ul>
                                             <li>{{ $data_dokter->jabatan }}</li>
                                             <li><i class="fas fa-map-marker-alt"></i>{{ $data_dokter->tempat }}</li>
                                             <li>{{ $data_dokter->telpon }}</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="items-link f-right">
                                     <a href="/dokter/{{ $data_dokter->id_dokter }}/detail/" >Detail</a>
                                     {{-- <span>7 hours ago</span> --}}
                                 </div>
                             </div>
                                @endforeach
                                </tr>
                                </tbody>
                                </table>
                                @if ($data['dokter']->isEmpty())
                                <div class="col">
                                    <center>
                                        <img src="{{ asset('Frontend/assets/img/icon/error.png') }}" class="datatidakada" alt="Data Kosong">
                                    </center>
                                </div>
                                @endif
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
                                    {{-- {{ $data['dokter']->links()}} --}}
                                    {{ $data['dokter']->onEachSide(1)->links() }}
                                    </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <section>

                            <!-- slider Area End-->
                <!-- Featured_job_start -->
                <section class="featured-job-area feature-padding">
                    <div class="container">
                        <!-- Section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle text-center">
                                    <h5>KABUPATEN BONDOWOSO</h5>
                                    <h2>Daftar Penyuluh</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                @if (! $kode = 11)
                                <table>
                                <tbody>
                                <tr>
                                @foreach ($data['penyuluh'] as $data_penyuluh)
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                 <div class="job-items">
                                     <div class="company-img">
                                         <a><img class="center" src="/data/data_penyuluh/{{ $data_penyuluh->foto }}" alt="" width="100" height="100"></a>
                                     </div>
                                     <div class="job-tittle">
                                         <a href="/penyuluh/{{ $data_penyuluh->id_penyuluh }}/detail/"><h4>{{ $data_penyuluh->nama_penyuluh }}</h4></a>
                                         <ul>
                                             <li><i class="fas fa-map-marker-alt"></i>{{ $data_penyuluh->tempat }}</li>
                                             <li>{{ $data_penyuluh->telpon }}</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="items-link f-right">
                                     <a href="/penyuluh/{{ $data_penyuluh->id_penyuluh }}/detail/" >Detail</a>
                                     {{-- <span>7 hours ago</span> --}}
                                 </div>
                             </div>
                                @endforeach
                                @endif
                                @foreach ($data['penyuluh'] as $data_penyuluh)
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                 <div class="job-items">
                                     <div class="company-img">
                                         <a><img class="center" src="/data/data_penyuluh/{{ $data_penyuluh->foto }}" alt="" width="100" height="100"></a>
                                     </div>
                                     <div class="job-tittle">
                                         <a href="/penyuluh/{{ $data_penyuluh->id_penyuluh }}/detail/"><h4>{{ $data_penyuluh->nama_penyuluh }}</h4></a>
                                         <ul>
                                             <li><i class="fas fa-map-marker-alt"></i>{{ $data_penyuluh->tempat }}</li>
                                             <li>{{ $data_penyuluh->telpon }}</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="items-link f-right">
                                     <a href="/penyuluh/{{ $data_penyuluh->id_penyuluh }}/detail/" >Detail</a>
                                     {{-- <span>7 hours ago</span> --}}
                                 </div>
                             </div>
                                @endforeach
                                </tr>
                                </tbody>
                                </table>
                                @if ($data['penyuluh']->isEmpty())
                                <div class="col">
                                    <center>
                                        <img src="{{ asset('Frontend/assets/img/icon/error.png') }}" class="datatidakada" alt="Data Kosong">
                                    </center>
                                </div>
                                @endif
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
                                    {{-- {{ $data['dokter']->links()}} --}}
                                    {{ $data['penyuluh']->onEachSide(1)->links() }}
                                    </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <section>
                    <!-- Tips dan Trik Start -->
                    <div class="home-blog-area blog-h-padding">
                        <div class="container">
                            <!-- Section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-tittle text-center">
                                        <span>Artikel Terkini</span>
                                        <h2>TIPS DAN TRIK</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                        <table>
                            <tbody>         
                            <tr>
                                @foreach ($data['artikel'] as $data_artikel)                           
                                    <td>
                                        <div class="col-xl-10 col-lg-10 col-md-10">
                                                <div class="home-blog-single mb-30">
                                                    <div class="blog-img-cap">
                                                        <div class="blog-img">  
                                                            <!-- <img src="assets/img/blog/home-blog1.jpg" alt=""> -->
                                                            <!-- Baris img src dibawah ini untuk memanggil gambar sesuai syntax di gambar.php -->
                                                            <img class="card-img rounded-0" src="/data/data_artikel/{{ $data_artikel->gambar }}"alt="post" width="300px" height="300px" />
                                                            <div class="blog-date text-center">
                                                                <span>{{ $data_artikel->tanggal }}</span>
                                                                <p>Kategori :{{ $data_artikel->kategori_artikel }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="blog-cap">
                                                            <p>{{ $data_artikel->nama_penulis}}</p>
                                                            <h3>{{ $data_artikel->judul }}<a href="detailartikel.php?id_artikel={{ $data_artikel->judul }}"></a></h3>
                                                            <a class="more-btn" href="/artikel/{{ $data_artikel->id_artikel }}/detail/">Read more»</a>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                            </tbody>
                        </table> 
                    <!-- Blog Area End -->
                    <!--Pagination Start  -->
                    </div>

                    <!--Pagination Start  -->
                <div class="pagination-area pb-115 text-center">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-xl-10"> -->
                                <div class="single-wrap d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">     
                                    {{-- //pagination use bootstrap --}}
                                    {{-- {{ $data['artikel']->links()}} --}}
                                    {{-- {!! $data['artikel']->appends(['sort' => 'artikel'])->links() !!} --}}
                                    {{-- {{ $data['artikel']->fragment('artikel')->links() }} --}}
                                    {{ $data['artikel']->onEachSide(1)->links() }}
                                    </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <section>
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h5>PANDUAN PENGGUNA APLIKASI</h5>
                            <h2>TUTORIAL </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <table><tbody><tr>
                    @foreach ($data['tutorial'] as $data_tutorial)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class=""><img class="card-img rounded-0" src="/data/data_tutorial/{{ $data_tutorial->icon }}" width="50px"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">{{ $data_tutorial->judul_tutorial }}</a></h5>
                               <div class="items-link f-right">
                                <a href="/home/tutorial/{{ $data_tutorial->id_tutorial }}/detail/">Detail</a>
                               </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tr></tbody></table>
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
                            {{ $data['tutorial']->links()}}
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    </div>
                </section>
        <section>
            @include('frontend/layouts.footer');
        </section>
        @endsection

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
       
        