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

    @include('penyuluh/layouts.navbar');

    <h2>
        <center><b>Tulis Artikel</b></center>
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
                            <form method="POST" action="{{ route('uploadartikel') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <!-- <div class="mt-30"> -->

                                {{-- AKTIFKAN AUTH SETELAH LOGIN PENYULUH BERHASIL --}}
                                {{-- <input type="hidden" name="nama_penulis" value=" {{ Auth::user()->name }}" required class="single-input"> --}}

                                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="status" value="notampil">
                            <!-- </div> -->
                            <div class="single-element-widget mt-10">
                                <h5 class="mb-15">Kategori</h5>
                                {{-- <input list="id_ktg" class="form-control {{ $errors->has('id_ktg') ? 'is-invalid' : ''}}" placeholder='Masukkan Jenis Hewan' value="{{ old('id_ktg')}}" name="id_ktg" >
                                @if ( $errors->has('id_ktg'))
                                    <span class="text-danger small">
                                        <p>{{ $errors->first('id_ktg') }}</p>
                                    </span>
                                @endif
                                <datalist id="id_ktg" name="id_ktg">
                                <div class="form-select" id="default-select">
                                    <select name="s_kategori" class="form-control" id="exampleFormControlSelect1">              
                                        <option value="" ></option>
                                        </select><br>
                                </div> --}}
                                <div class="form-select">
                                <select name="id_ktg" class="form-control">
                                    @foreach ($kategori_artikel as $data)
                                    <option value="{{ $data->id_ktg }}" selected>{{ $data->kategori_artikel}}</option>
                                    @endforeach
                                </select>
                                </div> 
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Judul Artikel</h5>
                                <input type="text" name="judul" placeholder="Masukkan Judul Artikel"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Judul Artikel'" class="form-control {{ $errors->has('judul') ? 'is-invalid' : ''}}" required class="single-input-primary">
                                    @if ( $errors->has('judul'))
                                    <span class="text-danger small">
                                        <p>{{ $errors->first('judul') }}</p>
                                    </span>
                                @endif    
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Sumber</h5>
                                    <input type="text" name="sumber" placeholder="Masukkan Sumber"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Sumber'" class="form-control {{ $errors->has('sumber') ? 'is-invalid' : ''}}">
                                @if ( $errors->has('sumber'))
                                    <span class="text-danger small">
                                        <p>{{ $errors->first('sumber') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Gambar</h5>
                                <input type="file" name="gambar" id="gambar" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}">
                                @if ( $errors->has('gambar'))
                                <span class="text-danger small">
                                    <p>{{ $errors->first('gambar') }}</p>
                                </span>
                                @endif
                            </div>
                            <div class="mt-30">
                                <h5 class="mb-15">Isi Artikel</h5>
                                <div>
                                    <textarea class="ckeditor" name="isi" id="ckedtor" required></textarea>
                                </div>
                                <br/>
                                <div id="container_btn">
                                    <input type="submit" name="tombol" class="genric-btn primary" value="POSTING">             
                                    <a href="artikel" class="genric-btn default">BATAL</button>
                                </div>
                                </form>
                                @if ( $errors->has('isi'))
                                <span class="text-danger small">
                                    <p>{{ $errors->first('isi') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="kotak">
                    <h5 class="mb-15">Isi Artikel</h5>
                        <div>
                            <textarea class="ckeditor" name="isi" id="ckedtor" required></textarea>
                        </div>
                        <br/>
                        <div id="container_btn">
                            <input type="submit" name="tombol" class="genric-btn primary" value="POSTING">             
                            <a href="artikel" class="genric-btn default">BATAL</button>
                        </div>
                        </form>
                        @if ( $errors->has('isi'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('isi') }}</p>
                        </span>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>
    
    {{-- @include('penyuluh/layouts.footer'); --}}
    

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