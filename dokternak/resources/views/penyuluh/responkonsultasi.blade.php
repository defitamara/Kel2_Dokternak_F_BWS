
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="assets/css/style4.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
  
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
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style3.css')}}">
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style4.css')}}">
	<title>Dokternak.id - Notifikasi</title>
    <link rel="shortcut icon" type="image/x-icon" href="href="{{ asset('Frontend/assets/img/favicon.ico')}}">

	<style>
		.h7
		{
			font-size: 0.9rem
        }
        .lihat{
            border: 0;
        }
        .tab {
        overflow: hidden;
        /* border: 1px solid #ccc; */
        background-color: #fff;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
        background-color: #aa8c70 ;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #aa8c70;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color:#291b10;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        }

        .back{
            visibility: hidden;
        }
        .inbox2,.inbox1{
                display: block !important;
        }
        @media(max-width:768px){
            <?php
                if(isset($_POST['klik'])){
                    ?>
                    .inbox1{
                        display: none !important;
                    }
                    .inbox_people{
                        width: 100%;
                    }
                    <?php
                }else if(isset($_POST['klok'])){
                    ?>
                    .inbox2{
                        display: none !important;
                    }
                    .inbox_people{
                        width: 100%;
                    }
                    <?php
                }
            ?>
            .back{
                visibility: visible;
            }
            .inbox_people{
                width: 100%;
            }
            .mesgs{
                width: 100% !important;
            }
        }
	</style>

</head>
<body>
    @include('petugas/layouts.navbar');
<section>
    <hr>
        <center><h1>
                <b>Respon Konsultasi</b>
        </h1></center>
    <hr>

</section>  
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
<div class="tab">
    @if(isset($konsultasi2) ?? '')
        <button class="tablinks" onclick="openCity(event, 'masuk')" id="defaultOpen">Kotak Masuk</button>
        <button class="tablinks" onclick="openCity(event, 'terkirim')" >Kotak Terkirim</button>
    @else
        <button class="tablinks" onclick="openCity(event, 'masuk')" >Kotak Masuk</button>
        <button class="tablinks" onclick="openCity(event, 'terkirim')" id="defaultOpen">Kotak Terkirim</button>
    @endif
</div>

</div>

<!-- Tab content -->
<div id="masuk" class="tabcontent">
<div class="container">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people inbox1">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4><b>Kotak Masuk</b></h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
            </div>
            </div>
          </div>
          <div class="inbox_chat">

              <!-- Daftar Pesan masuk dari peternak dan belum direspon -->
              @foreach ($konsultasi as $data_riwayatkonsultasi)
                    <a href="#">
                        <div class="chat_list ">
                        <div class="chat_people">
                            <div class="chat_img" name="klik"> <img src="/data/data_peternak/{{ $data_riwayatkonsultasi->foto_peternak }}" class="rounded-circle z-depth-0"
                                                        alt="Nama" height="50"></img></div>
                            <div class="chat_ib">
                            <h5> Dari : {{ $data_riwayatkonsultasi->namadepan_peternak }} <span class="    chat_date" name="klik">{{ $data_riwayatkonsultasi->tanggal }}<br></span></h5>
                            <p>{{\Illuminate\Support\Str::limit($data_riwayatkonsultasi->keluhan, 40)}} </p>
                            <a href="{{ route("respon.detail", $data_riwayatkonsultasi->id_konsultasi) }}"><input type="submit" name="klik" class="genric-btn primary-border" value="Lihat"></a>
                            </div>
                        </div>
                        </div>
                    </a>
            @endforeach
          </div>
        </div>

        {{-- Tempat if --}}
        @if(isset($konsultasi2) ?? '')
        <div class="mesgs">
            @foreach ($konsultasi2 as $data_konsultasi2)
          <div class="msg_history">
                <div class="row m-0">
                    {{-- <div class="flex-grow-1 pl-3">
                    <h5>Dari : {{ $data_konsultasi2->namadepan_peternak }}</h5></h5>
                    </div> --}}
                    <div class="flex-grow-4 pl-1">
                    <input type="hidden" name="idkr" value="id dokter">
                    <input type="hidden" name="idk" value="id k">
                    {{-- <a href="{{ route('konsultasi.hapusmasuk',['id'=>$data_riwayatdetail->id_riwayat,'idk'=>$data_riwayatdetail->id_konsultasi,'idr'=>$data_riwayatdetail->id_respon])}}"><button type="submit" class="genric-btn danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus
                        <i class="fa fa-trash-o"></i></button></a> --}}
                    {{-- <input type="submit" name="hapus" class="genric-btn danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" value="HAPUS">  --}}
                    </div>
                </div>
				<!-- Post Begins -->
				<section class="card mt-4">
					<div class="border p-2">
						<!-- post header -->
						<div class="row m-0">
							<div class="">
								<a class="text-decoration-none" href="#">
									<img src="/data/data_peternak/{{ $data_konsultasi2->foto_peternak }}"class="rounded-circle z-depth-0"
                                            alt="fotoakun" height="50">
								</a>
							</div>
							<div class="flex-grow-1 pl-2">
								<!-- <a class="text-decoration-none" href="#"> -->
									<h2 class="text-capitalize h5 mb-0"><b>{{ $data_konsultasi2->namadepan_peternak }}</b></h2>
								<!-- </a>  -->
								<p class="small text-secondary m-0 mt-1"> {{ $data_konsultasi2->tanggal }}</p>
                            </div>
                            <div class="flex-grow-2 pl-2">
                                <p class="small text-secondary m-0 mt-1">{{ $data_konsultasi2->kategori_hewan }}<br>{{ $data_konsultasi2->nama_hewan }}</p>
                            </div>
						</div>
						<!-- post body -->
						<div class="">
							<p class="my-2">
                           {{ $data_konsultasi2->keluhan }}
							</p>
						</div>

                        <section class="card mt-4">
                            <!--- Post Form Begins -->
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Respon Keluhan</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('respon.store') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                        <input type="hidden" name="id_respon" value="">
                                        <input type="hidden" name="id_dokter" value="{{ $data_konsultasi2->id_dokter  }}">
                                        <input type="hidden" name="id_konsultasi" value="{{ $data_konsultasi2->id_konsultasi }}">
                                        <input type="hidden" name="id_riwayat" value="">
                                        <div class="form-group">
                                            <textarea class="form-control" id="respon" name="respon" rows="3" placeholder="Masukkan Solusi Keluhan..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="balas" class="btn btn-primary">KIRIM</button>
                                </div>
                                </form>
                            </div>
                        <!--- Post Form Ends -->
                        </section>
						
				</section>
                <!-- Post Ends -->
                <div class="back">
                    <form action="riwayat_konsultasi.php" method="POST">
                        <center>
                            <button type="submit" class="genric-btn primary-border" >KEMBALI</button>
                        </center>
                    </form>
                </div>
                @endforeach
            </div>
            @endif

        </div>
        </div>
    </div>
</div>
      </div>
      </div>      
    </div></div>
          <!-- </div> -->
          
          <!-- Tab content -->
<div id="terkirim" class="tabcontent">
<div class="container">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people inbox2">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4><b>Kotak Terkirim</b></h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
            </div>
            </div>
          </div>
          <div class="inbox_chat">
            <!-- Daftar pesan masuk -->
            @foreach ($riwayat_konsultasi as $data_konsultasi)
                {{-- <form method="POST"> --}}
                        {!! csrf_field() !!}
                    <a href="#">
                    {{-- <input type="hidden" name="idst" value="id konsultasi">
                    <input type="hidden" name="stt" value="off"> --}}
                        <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img" name="klik"> <img src="/data/data_peternak/{{ $data_konsultasi->foto_peternak }}" class="rounded-circle z-depth-0"
                                                        alt="Nama" height="50"></img></div>
                            <div class="chat_ib">
                            <h5> Kepada : {{ $data_konsultasi->namadepan_peternak }} <span class="chat_date" name="klik">{{ $data_konsultasi->tanggal }}<br></span></h5>
                            <p name="klik">{{ $data_konsultasi->respon }}</p>
                            <a href="{{ route("respon.detailterkirim", $data_konsultasi->id_riwayat) }}"><button name="klok" class="genric-btn primary-border openMsg" onclick="openCity(event, 'terkirim')"  id="defaultOpen"><p>Lihat</p></button></a>
                            </div>
                        </div>
                        </div>
                    </a>
                    {{-- </form> --}}
            @endforeach
          </div>

        </div>
        {{-- Tempat If --}}
        @if(isset($riwayat_konsultasi2) ?? '')
        <div class="mesgs">
            @foreach ($riwayat_konsultasi2 as $data_riwayatdetail)
          <div class="msg_history">
                <div class="row m-0">
                    <div class="flex-grow-1 pl-3">
                    <h5>Kepada : {{ $data_riwayatdetail->namadepan_peternak }}</h5></h5>
                    </div>
                    <div class="flex-grow-4 pl-1">
                    <input type="hidden" name="idkr" value="id dokter">
                    <input type="hidden" name="idk" value="id k">
                    <a href="{{ route('respon.hapusterkirim',['id'=>$data_riwayatdetail->id_riwayat,'idk'=>$data_riwayatdetail->id_respon])}}"><button type="submit" class="genric-btn danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus
                        <i class="fa fa-trash-o"></i></button></a>
                    {{-- <input type="submit" name="hapus" class="genric-btn danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" value="HAPUS">  --}}
                    </div>
                </div>
				<!-- Post Begins -->
				<section class="card mt-4">
					<div class="border p-2">
						<!-- post header -->
						<div class="row m-0">
							<div class="">
								<a class="text-decoration-none" href="#">
									<img src="/data/data_peternak/{{ $data_riwayatdetail->foto_peternak }}"class="rounded-circle z-depth-0"
                                            alt="fotoakun" height="50">
								</a>
							</div>
							<div class="flex-grow-1 pl-2">
								<!-- <a class="text-decoration-none" href="#"> -->
									<h2 class="text-capitalize h5 mb-0">{{ $data_riwayatdetail->namadepan_peternak }}</h2>
								<!-- </a>  -->
								<p class="small text-secondary m-0 mt-1"> {{ $data_riwayatdetail->tanggal }}</p>
                            </div>
                            <div class="flex-grow-2 pl-2">
                                <p class="small text-secondary m-0 mt-1">{{ $data_riwayatdetail->kategori_hewan }}<br>{{ $data_riwayatdetail->nama_hewan }}</p>
                            </div>
						</div>
						<!-- post body -->
						<div class="">
							<p class="my-2">
                           {{ $data_riwayatdetail->keluhan }}
							</p>
						</div>
						<hr class="my-1">
                        <!-- post footer begins -->
                                    <footer class="">
							<!-- post actions -->
                                    <div class="">
                                        <ul class="list-group list-group-horizontal">		
                                            <li class="list-group-item flex-fill text-center p-0 px-lg-2 border border-right-0 border-top-0 border-bottom-0">
                                                <a class="small text-decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <h6> <i class="fas fa-comment-alt"></i> Respon Konsultasi</h6>
                                                </a>
                                            </li>	
                                        </ul>
                                    </div>
                                    <div class="card border border-right-0 border-left-0 border-bottom-0 mt-1">
									<!-- comment card bgins -->
									<section>
										<div class="card p-2 mt-3">
											<!-- comment header -->
											<div class="d-flex">
												<div class="">
													<a class="text-decoration-none" href="#">
													<img src="/data/data_dokter/{{ $data_riwayatdetail->foto }}" class="rounded-circle z-depth-0"
                                                        alt="Nama" height="40"></img>
													</a>
												</div>
												<div class="flex-grow-1 pl-2">
													<a class="text-decoration-none text-capitalize h6 m-0" href="#"><b>Anda</b></a>
													<p class="small m-0 text-muted">{{ $data_riwayatdetail->tanggal_respon }}</p>
												</div>		
											</div>
											<!-- comment header -->
											<!-- comment body -->
											<div class="card-body p-0">
												<p class="card-text h7 mb-1">{{ $data_riwayatdetail->respon }}</p>		
											</div>
										</div>
									</section>
									<!-- comment card ends -->

                                </div>
                             
							</div>
							<!-- collapsed comments ends -->
						</footer>
						<!-- post footer ends -->
					</div>
				</section>
                <!-- Post Ends -->
                <div class="back">
                    <form action="riwayat_konsultasi.php" method="POST">
                        <center>
                            <button type="submit" class="genric-btn primary-border" >KEMBALI</button>
                        </center>
                    </form>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
        </div>
      </div>      
    </div></div>
    <section>
        @include('petugas.layouts.footer');
    </section>
    
<!-- JS here -->
    

        <script>
            document.getElementById("defaultOpen").click();
            function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }
        </script>

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
        
      
    <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
            @php
                if (isset($_POST['klik'])){
                    @endphp
                    if ($(window).width() < 768){
                        $(".inbox1").css({'display':'none'})
                    }else{
                        $(".inbox1").css({'display':'block'})
                    }
                    @php
                }else if (isset($_POST['klok'])){
                    @endphp
                    if ($(window).width() < 768){
                        $(".inbox2").css({'display':'none'})
                    }else{
                        $(".inbox2").css({'display':'block'})
                    }
                    @php
                }
            @endphp

    </script>
    </body>
    </html>