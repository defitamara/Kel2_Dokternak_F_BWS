<!DOCTYPE html>
<html>
<head>
<title>Dokternak.id - Edit Profil Petugas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

<!-- Script JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin-top: 50px;
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 1000px;
  height: fit-content;
}

/* The Close Button */
.close {
  color: #000000;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    * {
  box-sizing: border-box;
}
body {
  font-family: "Open Sans";
  background: #2c3e50;
  color: #000000;
  line-height: 1.618em;
}
.tabs {
  /* position: relative;
  margin: 2rem 0;
  background: #ffffff;
  height: 40rem; */
  margin: 0% 10%;
}
.tabs::before,
.tabs::after {
  content: "";
  display: table;
}
.tabs::after {
  clear: both;
}
.tab {
  /*float: left;*/
}
.tab-switch {
  display: none;
}
.tab-label {
  position: relative;
  display: block;
  line-height: 2.75em;
  height: 3em;
  padding: 0 1.618em;
  background: #e8e8e8;
  /* border: 0.25rem solid #502b00; */
  color: rgb(0, 0, 0);
  cursor: pointer;
  top: 0;
  transition: all 0.25s;
}

.tab-content {
  width: 100%;
  height: auto;
  position: absolute;
  z-index: 1;
  top: 2.75em;
  left: 0;
  padding: 1.618rem;
  background: #fff;
  color: #2c3e50;
  border: 0.25rem solid #502b00;
  /* border-bottom: 0.25rem solid #bdc3c7; */
  opacity: 0;
  transition: all 0.35s;
}
.tab-switch:checked + .tab-label {
  background:#502b00;
  color: #fff;
  border-bottom: 0;
  border-right: 0.125rem solid #fff;
  transition: all 0.35s;
  z-index: 1;
  top: -0.0625rem;
}
.tab-switch:checked + label + .tab-content {
  z-index: 2;
  opacity: 1;
  transition: all 0.35s;
}

.tabs-2 {
  position: relative;
  margin: 1rem 0;
  background: #ffffff;
  height: 4rem;
}

.tabs-2::before,
.tabs-2::after {
  content: "";
  display: table;
}
.tabs-2::after {
  clear: both;
}

.tabs-3 {
  position: relative;
  margin: 1rem 0;
  background: #ffffff;
  height: 4rem;
}

.tabs-3::before,
.tabs-3::after {
  content: "";
  display: table;
}
.tabs-3::after {
  clear: both;
}

/* FORM */
form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  

}
.right{
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
} 

/* Choose File Style */

.input-group {
  position: relative;
  margin: 0;
}

.label--desc {
  font-size: 20px;
  color: #999;
  margin-top: 10px;
}

.input-file {
  display: none;
}  
.btn btn-info {
  margin-left: auto;
  margin-right: ;
}
</style>
</head>
<body>

<section>
  <!-- Modal content -->
  <div class="modal-content">
  <a href="/lppetugas" class="close">&times;</a>
    <div class="wrapper">
      <div class="tabs">
        <div class="tab">
          <!-- <input type="radio" name="css-tabs" id="tab-1" class="tab-switch">
          <label for="tab-1" class="tab-label">Peternak</label> -->
        <!-- <div class="tab-content">
          <div class="modal-body" style="padding:40px 50px;">
        <form role="form" action="" method="post"> -->

        <center><h1> Edit Profil</h1></center><hr><br>
        
        <form method="POST" enctype="multipart/form-data" action="{{ route('editprofilpetugas.update',$profil->id_dokter) }}">
          {!! csrf_field() !!}
        <div id="left">
          <div class="form-group">
            <input name="_method" type="hidden" value="PUT">
            <label for="namadepan_peternak"><span class="glyphicon glyphicon-user"></span> Nama Dokter</label>
            <input type="text" class="form-control" name="nama_dokter" value="{{ isset($profil) ? $profil->nama_dokter : '' }}" required>
          </div>
          <div class="form-group">
            <label for="email_peternak"><span class="glyphicon glyphicon-envelope"></span> Email</label>
            <input type="email" class="form-control" name="email" value="{{ isset($profil) ? $profil->email : '' }}" required>
          </div>

          <div class="form-group">
            <label for="alamat"><span class="glyphicon glyphicon-road"></span> Alamat Lengkap</label>
            <textarea class="form-control" name="alamat" rows="5" value="" required>{{ isset($profil) ? $profil->alamat : '' }}</textarea>
          </div>
          
            <div class="form-group">
                <label for="no_hp"><span class="glyphicon glyphicon-earphone"></span>Tempat Dinas</label>
                <input type="text" class="form-control" name="tempat" value="{{ isset($profil) ? $profil->tempat : '' }}" required>
            </div>

            <div class="form-group">
                <label for="jk"><span class="glyphicon glyphicon-star"></span> Jenis Kelamin</label>
                <div class="wrapper">
                    <div class="tabs-2">
                        <div class="tab">
                        <input type="radio" name="jenis_kelamin" id="tab-l" class="tab-switch" value="Laki-Laki" {{ ($profil->jenis_kelamin=="Laki-Laki")? "checked" : "" }}>
                        <label for="tab-l" class="tab-label">Laki-Laki</label>
                        </div>
                        <div class="tab">
                        <input type="radio" name="jenis_kelamin" id="tab-p" class="tab-switch" value="Perempuan" {{ ($profil->jenis_kelamin=="Perempuan")? "checked" : "" }}>
                        <label for="tab-p" class="tab-label">Perempuan</label>
                        </div>
                    </div>
                    </div>
                </div>
            
        </div>

        <!-- Kanan Bang **************************************************************************************-->
        <div id="right">
        
            <div class="form-group">
                <label for="no_hp"><span class="glyphicon glyphicon-earphone"></span> No Handphone / Telpon</label>
                <input type="number" class="form-control" name="telpon" value="{{ isset($profil) ? $profil->telpon : '' }}" required>
            </div>
        <div class="form-group">
            <input type="hidden" name="nama_gambar" value="{{ isset($profil) ? $profil->foto : '' }}">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Foto</label>
                          <td><img src="/data/data_dokter/{{ isset($profil) ? $profil->foto : '' }}" width="75px"></td>
                          <input type="file" name="foto" id="foto" value="{{ isset($profil) ? $profil->foto : '' }}" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" >
                        @if ( $errors->has('foto'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('foto') }}</p>
                        </span>
                    @endif
                        </div>
                      </div>
        </div><br><br><br><br><br><br>

        <div class="form-group">
            <label for="jabatan"><span class="glyphicon glyphicon-earphone"></span>Jabatan</label>
            <div class="wrapper">
                <div class="tabs-3">
                    <div class="tab">
                    <input type="radio" name="id_jabatan" id="tab-j1" class="tab-switch" value="1" {{ ($profil->id_jabatan=="1")? "checked" : "" }}>
                    <label for="tab-j1" class="tab-label">Dokter</label>
                    </div>
                    <div class="tab">
                    <input type="radio" name="id_jabatan" id="tab-j2" class="tab-switch" value="2" {{ ($profil->id_jabatan=="2")? "checked" : "" }}>
                    <label for="tab-j2" class="tab-label">Paramedis</label>
                    </div>
                    <div class="tab">
                        <input type="radio" name="id_jabatan" id="tab-j3" class="tab-switch" value="3" {{ ($profil->id_jabatan=="3")? "checked" : "" }}>
                        <label for="tab-j3" class="tab-label">Petugas Inseminasi Buatan</label>
                        </div>
                </div>
            </div> 
        </div><br><br><br><br><br>

        <div class="form-group">
            <label for="jadwal_kerja"><span class="glyphicon glyphicon-road"></span>Jadwal Kerja</label>
            <textarea class="form-control" name="jadwal_kerja" rows="5" value="" required>{{ isset($profil) ? $profil->jadwal_kerja : '' }}</textarea>
        </div>
          
          
          <input type="submit" class="btn btn-info" value="Edit" name="edit">
          <a href="/lppetugas" class="btn btn info-border" >Batal</a>
          <!-- <input type="reset" class="btn btn-info" value="Batal" name=""> -->
          <!-- </div> -->

      
        </form>
      </div>
        </div>
        </div>
        </div>
        </section>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
