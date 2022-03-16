<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

		<!-- CSS here -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="../assets/css/flaticon.css">
            <link rel="stylesheet" href="../assets/css/price_rangs.css">
            <link rel="stylesheet" href="../assets/css/slicknav.css">
            <link rel="stylesheet" href="../assets/css/animate.min.css">
            <link rel="stylesheet" href="../assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../assets/css/themify-icons.css">
            <link rel="stylesheet" href="../assets/css/slick.css">
            <link rel="stylesheet" href="../assets/css/nice-select.css">
            <link rel="stylesheet" href="../assets/css/style.css">
            <link rel="stylesheet" href="../assets/css/style2.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <style>
        .emp-profile{
            width: 80%;
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem black;
            background: #f0f0f0;
            /* background-color: rgba(255,255,255,0.8); */
            border-style: 1px solid black ;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        /* .nav-tabs{
            background-color: #818182;
        } */
        .nav-item{
            background-color: #818182;
            color: black;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #818182;
        }
    </style>
</head>
<body>
<section>
    <?php
        include 'navbar.php';
        include '../koneksi.php';
    ?>
    <?php include "../modal/login.php"; ?>
    <?php include "../modal/ubah_password.php"; ?>
    <?php
        $query = "";
        $id = $_SESSION['id'];
        $query = mysqli_query($koneksi,"select * from dokter_user, dokter, user, jabatan where dokter_user.id_user=user.id_user AND dokter_user.id_dokter=dokter.id_dokter AND dokter.id_jabatan=jabatan.id_jabatan AND dokter_user.id_dokter='$id'");
        $data = mysqli_fetch_assoc($query);
        $nama = $data['nama'];
    ?>
    </section>

         <!-- Script Alert Pemberitahuan -->
    <?php
        if (isset($_GET['pesan'])){
            $pesan = $_GET['pesan'];
                if ($pesan == 'berhasil') {
    ?>
                <div class="alert alert-success">
                    <center>Biodata anda berhasil dirubah. </center>
                </div>
    <?php
                }elseif($pesan == 'gagal'){
    ?>
                <div class="alert alert-danger">
                    <center>Mohon maaf, perubahan biodata anda gagal.</center>
                </div>
    <?php
                }
        }
    ?>


<div class="slider-area ">
        <div class="slider-active">
        </div>
<section>
<div class="slider-area ">
      <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../assets/img/gallery/s2.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                            <h2>Hallo!</h2>
                            <h2> <?php echo $_SESSION["jabatan"];?> <?php echo $data['nama'];?></h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </div>
    <div class="section-tittle text-center">
    <hr><br><br><h2>Akun Profile</h2>
    </div>
<div class="container emp-profile">
            <?php 
            include '../koneksi.php';

            if(isset($_POST['sfoto'])){
                $lokasiFoto = $_FILES['foto']['tmp_name'];
                if(!$lokasiFoto==""){
                    $id = $_SESSION["id"];
                    $fp  = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
                    $sql1 = "UPDATE dokter SET foto = '$fp' WHERE id_dokter = '$id'";
                    if(mysqli_query($koneksi, $sql1)){
                        echo "<script type='text/javascript'>alert('Foto Berhasil Diubah.');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Foto Gagal Diubah.');</script>";
                    }
                }else{
                    ?><script> alert ("Maaf! Anda Tidak melakukan perubahan foto profil terlebih dahulu"); </script><?php
                } 
                
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="fotoakun.php?id_dokter=<?php echo $_SESSION['id']; ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                <input type="file" name="foto" id="foto">
                                Ubah Foto Profil
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h4><b>
                                    <?php echo $data["nama"];?></b>
                                    </h4>
                                    <h6>
                                    <?php echo $data["jabatan"];?>
                                    </h6>
                                    <p class="proile-rating"> <?php echo $data["tempat"];?></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tsab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dokumen Berkas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="editbiodatadokter.php" class="genric-btn primary">Edit Profile</a> <br><br><br>
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <div class="profile-work">
                                <center>
                                <input type="submit" name="sfoto" class="genric-btn second" value="Simpan"/> <br><br><br>
                                <label><b>Username : </b></label> <?php echo $data["username"];?><br>
                                <label><b>Password : </b></label> <?php echo $data["password"];?>
                                </center>
                         </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="container tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["nama"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jenis Kelamin :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["jenis_kelamin"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["email"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>No. Handphone/Whatsapp :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["telpon"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kecamatan (Tempat Dinas/Praktek) :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["tempat"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jadwal Kerja :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?= nl2br(str_replace(' ', ' ', htmlspecialchars($data["jadwal_kerja"]))); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo $data["alamat"];?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="container tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sertifikasi :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="profile-img">
                                                <img src="sertifikasi.php?id_dokter=<?php echo $_SESSION['id']; ?>" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        </section>
        
        <section>
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

<!-- Disini adalah konten artikel yang diulang menggunakan while, untuk menampilkan keseluruhan database -->
                <?php
                include "../koneksi.php";

                // Belajar paging : https://www.youtube.com/watch?v=Q1xJdoHrTj4

                // Paging - Konfigurasi
                $jumlahDataPerHalaman = 2;
                $result = mysqli_query($koneksi, "SELECT * FROM artikel where artikel.status='tampil'");
                $jumlahData = mysqli_num_rows($result);
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
                $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;

                // halaman 2, awalDatanya = 2. Dimulai indeks 0,1,2,3, dst
                $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
                // Akhir dari Konfigurasi

                // ambilData adalah variabel untuk menampilkan data dari 2 tabel, yaitu artikel dan kategori_artikel. 
                // Sehingga kita dapat menampilkan kategorinya, sesuai id_ktg di kedua tabel
                $ambilData=mysqli_query($koneksi, "SELECT * FROM artikel, kategori_artikel where artikel.id_ktg=kategori_artikel.id_ktg and artikel.status='tampil' order by id_artikel desc
                LIMIT $awalData,$jumlahDataPerHalaman");


                while ($data = mysqli_fetch_array($ambilData)) { ?>

                <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <!-- <img src="assets/img/blog/home-blog1.jpg" alt=""> -->
                                    <!-- Baris img src dibawah ini untuk memanggil gambar sesuai syntax di gambar.php -->
                                    <img src="../gambar.php?id_artikel=<?php echo $data['id_artikel']; ?>"/>
                                    <div class="blog-date text-center">
                                        <span><?php echo $data['tanggal']; ?></span>
                                        <p>Kategori : <?php echo $data['kategori_artikel']; ?></p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>|   <?php echo $data['nama_penulis']; ?></p>
                                    <h3><a href="detailartikel.php?id_artikel=<?php echo $data['id_artikel']; ?>"><?php echo $data['judul']; ?></a></h3>
                                    <a href="detailartikel.php?id_artikel=<?php echo $data['id_artikel']; ?>" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div> 
                    </div> <?php } ?>
                </div>
        <!-- Blog Area End -->

        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">

                                    <!-- Memberi tombol prev -->
                                    <?php if( $halamanAktif > 1) : ?>
                                        <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">&lt; Sebelumnya</a></h4>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Navigasi Pages -->
                                    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                        <?php if ($i == $halamanAktif ) : ?>
                                            <li class="page-item active">
                                            <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                            <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <!-- Memberi tombol next -->
                                    <?php if( $halamanAktif < $jumlahHalaman) : ?>
                                        <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Selanjutnya &gt;</span></a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        </section>


        <script>
            $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
            });
        </script>
  <footer>
        <?php include 'footer.php'; ?>
        </footer>

        <!-- All JS Custom Plugins Link Here here -->
        <script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="../assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="../assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/slick.min.js"></script>
        <script src="../assets/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="../assets/js/wow.min.js"></script>
		<script src="../assets/js/animated.headline.js"></script>
        <script src="../assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="../assets/js/jquery.scrollUp.min.js"></script>
        <script src="../assets/js/jquery.nice-select.min.js"></script>
		<script src="../assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="../assets/js/contact.js"></script>
        <script src="../assets/js/jquery.form.js"></script>
        <script src="../assets/js/jquery.validate.min.js"></script>
        <script src="../assets/js/mail-script.js"></script>
        <script src="../assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
</body>
</html>