<?php
// Start the session
session_start();
if (!isset($_SESSION["username"])) {
    header("location:daftar_artikel.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokternak.id</title>
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

    @include('frontend/layouts.navbar');

    <h2>
        <center><b>Tulis Konsultasi</b></center>
    </h2>
    
    <div class="container">
        {{-- Alert --}}
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="slider-active">
            <div class="section-top-border">
                <div class="kotak">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <form method="POST" action="{{ route('tuliskonsultasi.store') }}">
                            {!! csrf_field() !!}
                            <!-- <div class="mt-30"> -->
                                <input type="hidden" name="id_peternak" value=" {{ Auth::user()->id }}" required class="single-input">
                                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="status_kirim" value="norespon">
                            <!-- </div> -->
                            <div class="single-element-widget mt-10">
                                <h5 class="mb-15">Kepada</h5>
                                <div class="form-select">
                                    <select name="id_dokter" class="form-select" id="default-select">
                                        <option disabled selected> Pilih </option>
                                        @foreach ($petugas as $datapetugas)
                                        <option value="{{ $datapetugas->id_dokter }}" selected>{{ $datapetugas->nama_dokter}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input list="dokter" class="form-control {{ $errors->has('dokter') ? 'is-invalid' : ''}}" placeholder='Masukkan Dokter Tujuan'  name="id_d" >
                                    @if ( $errors->has('id_dokter'))
                                        <span class="text-danger small">
                                            <p>{{ $errors->first('dokter') }}</p>
                                        </span>
                                    @endif
                                    <datalist id="dokter" name="id_dokter">
                                        @foreach ($petugas as $data_petugas)
                                            <option value="{{ $data_petugas->nama_dokter }}" ></option>
                                        @endforeach
                                    </datalist> --}}
                                </div> 
                            </div>
                            <div class="single-element-widget mt-10">
                                <h5 class="mb-15">Kategori Hewan</h5>
                                <div class="form-select">
                                <select name="id_kategori" class="form-select" id="default-select">
                                    <option disabled selected> Pilih </option>
                                    @foreach ($kategori_hewan as $datakathewan)
                                    <option value="{{ $datakathewan->id_kategori }}" selected>{{ $datakathewan->kategori_hewan}}</option>
                                    @endforeach
                                </select>
                                </div> 
                            </div>
                            <div class="single-element-widget mt-10">
                                <h5 class="mb-15">Jenis Hewan</h5>
                                <div class="form-select">
                                {{-- <select name="id_ktg" class="form-select" id="default-select">
                                    @foreach ($kategori_artikel as $datajenishewan)
                                    <option value="{{ $datajenishewan->id_ktg }}" selected>{{ $datajenishewan->kategori_artikel}}</option>
                                    @endforeach
                                </select> --}}
                                <input list="id_ktg" class="form-control {{ $errors->has('id_ktg') ? 'is-invalid' : ''}}" placeholder='Masukkan Jenis Hewan'  name="id_ktg" >
                                    @if ( $errors->has('id_ktg'))
                                        <span class="text-danger small">
                                            <p>{{ $errors->first('id_ktg') }}</p>
                                        </span>
                                    @endif
                                    <datalist id="id_ktg" name="id_ktg">
                                        @foreach ($kategori_artikel as $data_jenis_hewan)
                                            <option value="{{ $data_jenis_hewan->kategori_artikel }}" ></option>
                                        @endforeach
                                    </datalist>
                                </div> 
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Nama Hewan</h5>
                                <input type="text" name="nama_hewan" placeholder="Masukkan Nama Hewan"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama Hewan'" class="form-control {{ $errors->has('nama_hewan') ? 'is-invalid' : ''}}" required class="single-input-primary">
                                    @if ( $errors->has('nama_hewan'))
                                    <span class="text-danger small">
                                        <p>{{ $errors->first('nama_hewan') }}</p>
                                    </span>
                                @endif    
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Keluhan</h5>
                                <div>
                                    <textarea name="keluhan" placeholder="Tulis Keluhan" {{ $errors->has('keluhan') ? 'is-invalid' : ''}}" required class="single-input-primary"></textarea>
                                    @if ( $errors->has('keluhan'))
                                    <span class="text-danger small">
                                        <p>{{ $errors->first('keluhan') }}</p>
                                    </span>
                                    @endif  
                                </div>
                                <br/>
                                <div id="container_btn">
                                    <input type="submit" name="tombol" class="genric-btn primary" value="KIRIM">             
                                    <a href="/konsultasi" class="genric-btn default">BATAL</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
    @include('frontend/layouts.footer');
    </section>

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

 
        <!-- Link Js CkEditor -->
        <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>
</body>
</html>