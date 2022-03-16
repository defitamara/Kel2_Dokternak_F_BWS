<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Rekam Medik</title>

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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
<style>
body {
	/* color: #566787;
	background: #f5f5f5; */
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
h2{
    color: white;
}
h3{
    color: black;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-wrapper .btn {
	float: right;
	color: #333;
	background-color: #fff;
	border-radius: 3px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-wrapper .btn:hover {
	color: #333;
	background: #f2f2f2;
}
.table-wrapper .btn.btn-primary {
	color: #fff;
	background: #03A9F4;
}
.table-wrapper .btn.btn-primary:hover {
	background: #03a3e7;
}
.table-title .btn {		
	font-size: 13px;
	border: none;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
.table-title {
	color: #fff;
	background: #4b5366;		
	padding: 16px 25px;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.show-entries select.form-control {        
	width: 60px;
	margin: 0 5px;
}
.table-filter .filter-group {
	float: right;
	margin-left: 15px;
}
.table-filter input, .table-filter select {
	height: 34px;
	border-radius: 3px;
	border-color: #ddd;
	box-shadow: none;
}
.table-filter {
	padding: 5px 0 15px;
	border-bottom: 1px solid #e9e9e9;
	margin-bottom: 5px;
}
.table-filter .btn {
	height: 34px;
}
.table-filter label {
	font-weight: normal;
	margin-left: 10px;
}
.table-filter select, .table-filter input {
	display: inline-block;
	margin-left: 5px;
}
.table-filter input {
	width: 200px;
	display: inline-block;
}
.filter-group select.form-control {
	width: 110px;
}
.filter-icon {
	float: right;
	margin-top: 7px;
}
.filter-icon i {
	font-size: 18px;
	opacity: 0.7;
}	
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 80px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.view {        
	width: 30px;
	height: 30px;
	color: #2196F3;
	border: 2px solid;
	border-radius: 30px;
	text-align: center;
}
table.table td a.view i {
	font-size: 22px;
	margin: 2px 0 0 1px;
}   
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.status {
	font-size: 30px;
	margin: 2px 2px 0 0;
	display: inline-block;
	vertical-align: middle;
	line-height: 10px;
}
.text-success {
	color: #10c469;
}
.text-info {
	color: #62c9e8;
}
.text-warning {
	color: #FFC107;
}
.text-danger {
	color: #ff5b5b;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}   

</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>

@include('petugas.layouts.navbar');

<div class="container-xl">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Tabel Rekam Medik</h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="/cetak_pdf/rekammedik" class="btn btn-secondary" target="_blank"><i class="material-icons">&#xE24D;</i> <span>Export to PDF</span></a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahDataRMDForm">
                            <i class="material-icons">add</i><span>Tambah</span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="show-entries">
                            <span>Show</span>
                            <select class="form-control">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Search</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="filter-group">
                            <label>Jenis Hewan</label>
                            <select name="id_ktg" class="form-control">
                                @foreach ($kategori_artikel as $data)
                                  <option value="{{ $data->id_ktg }}" selected>{{ $data->kategori_artikel}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Kategori Hewan</label>
                            <select class="form-control">
                                <option>Hewan Ternak</option>
                                <option>Hewan Kesayangan/Pets</option>
                            </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div> --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id RMD</th>
                        <th>Tanggal</th>
                        <th>Kategori Hewan</th>
                        <th>Jenis Hewan</th>						
                        <th>Nama Hewan</th>						
                        <th>Nama Peternak</th>
                        <th>Alamat</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Pelayanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Mulai foreach untuk mengambil data rekam medik sesuai petugas yang login --}}
                    @php $no = 1; @endphp
                    @foreach ($rmd_petugas as $item)
        
                    @if ($item->id == Auth::user()->id)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_rmd}}</td>
                        <td>{{ date('d-M-y', strtotime($item->tanggal)) }}</td>
                        <td>{{ $item->kategori_hewan }}</td>
                        <td>{{ $item->kategori_artikel }}</td>
                        <td>{{ $item->nama_hewan }}</td>
                        <td>{{ $item->nama_peternak }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->keluhan }}</td>
                        <td>{{ $item->diagnosa }}</td>
                        <td>{{ $item->pelayanan }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="" method="GET" class="btn btn-warning" data-toggle="modal" data-target="#EditDataRMDForm-{{ $item->id_rmd }}"><i class="fa fa-edit"></i></a>
                            <a href="" method="GET" class="btn btn-danger" data-toggle="modal" data-target="#HapusDataRMD-{{ $item->id_rmd }}"><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
                <ul class="pagination">
                    {{-- <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li> --}}
                    {{ $rmd_petugas->links()}}
                </ul>
            </div>
        </div>
    </div>
    
    
    {{-- MODAL TAMBAH DATA HERE --}}
    <div id="TambahDataRMDForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Rekam Medik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="rekam_medik_form" action="{{route('simpandata')}}">
                        @csrf
                        <input type="hidden" name="id_rmd" value="">
                        <input type="hidden" name="id_dokmed" value="">
                        @foreach ($rmd_petugas as $item)
                            @if ($item->id == Auth::user()->id)
                            <input type="hidden" name="id_dokter" value="{{ $item->id_dokter }}" required class="single-input">
                            @endif
                        @endforeach
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label class="control-label">Pilih Kategori Hewan</label>
                                <div class="tab">
                                    <input type="radio" name="id_kategori" id="tab-l" class="tab-switch" value="1" selected>
                                    <label for="tab-l" class="tab-label">Hewan Ternak</label>
                                </div>
                                <div class="tab">
                                    <input type="radio" name="id_kategori" id="tab-p" class="tab-switch" value="2" selected>
                                    <label for="tab-p" class="tab-label">Hewan Kesayangan/Pets</label>
                                </div>
                            </div>
                            <div class="col">
                                <label class="control-label">Alamat</label>
                                <textarea type="text" class="form-control input-lg" name="alamat" required></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label class="control-label">Pilih Jenis Hewan</label>
                                {{-- <input type="text" class="form-control input-lg" name="id_ktg" required> --}}
                                <select name="id_ktg" class="form-control">
                                    @foreach ($kategori_artikel as $data)
                                      <option value="{{ $data->id_ktg }}" selected>{{ $data->kategori_artikel}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="control-label">Keluhan</label>
                                <textarea type="text" class="form-control input-lg" name="keluhan" required></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label class="control-label">Nama Hewan</label>
                                <input type="text" class="form-control input-lg" name="nama_hewan" required>
                            </div>
                            <div class="col">
                                <label class="control-label">Diagnosa</label>
                                <input type="text" class="form-control input-lg" name="diagnosa" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label class="control-label">Nama Peternak</label>
                                <input type="text" class="form-control input-lg" name="nama_peternak" required>
                            </div>
                            <div class="col">
                                <label class="control-label">Pelayanan</label>
                                <input type="text" class="form-control input-lg" name="pelayanan" required>
                            </div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- MODAL EDIT DATA HERE --}}
    @foreach ($rekam_medik as $data)
    <div id="EditDataRMDForm-{{ $data->id_rmd }}" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Rekam Medik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST"  action="{{ url('petugas/rekam-medik/edit/'.$data->id_rmd) }}">
                            @csrf
                            <input type="hidden" name="id_rmd" value="{{ $data->id_rmd }}">
                            <div class="row">
                                <div class="col">
                                    <label class="control-label">ID Rekam Medik</label>
                                    <input type="text" class="form-control" name="id_rmd" value="{{ $data->id_rmd }}" disabled>
                                </div>
                                <div class="col">
                                    <label class="control-label">Nama Peternak</label>
                                    <input type="text" class="form-control input-lg" name="nama_peternak" value="{{ $data->nama_peternak }}"  required>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label class="control-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}">
                                </div>
                                <div class="col">
                                    <label class="control-label">Alamat</label>
                                    <textarea type="text" class="form-control input-lg" name="alamat" required>{{ $data->alamat }}</textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label class="control-label">Pilih Kategori Hewan</label>
                                    {{-- <input type="text" class="form-control input-lg" name="id_kategori" value="{{ $data->id_kategori }}"  required> --}}
                                    <div class="tab">
                                        <input type="radio" name="id_kategori" id="tab-l" class="tab-switch" value="1"  <?php if($data['id_kategori']=='1') echo 'checked' ?>>
                                        <label for="tab-l" class="tab-label">Hewan Ternak</label>
                                    </div>
                                    <div class="tab">
                                        <input type="radio" name="id_kategori" id="tab-p" class="tab-switch" value="2"  <?php if($data['id_kategori']=='2') echo 'checked' ?>>
                                        <label for="tab-p" class="tab-label">Hewan Kesayangan/Pets</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="control-label">Keluhan</label>
                                    <textarea type="text" class="form-control input-lg" name="keluhan" equired>{{ $data->keluhan }}</textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label class="control-label">Pilih Jenis Hewan</label>
                                    {{-- <input type="text" class="form-control input-lg" name="id_ktg" value="{{ $data->id_ktg }}"  required> --}}
                                    <select name="id_ktg" class="form-control" value="{{ $data->id_ktg }}">
                                        @foreach ($kategori_artikel as $data2)
                                          <option value="{{ $data2->id_ktg }}" selected>{{ $data2->kategori_artikel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="control-label">Diagnosa</label>
                                    <input type="text" class="form-control input-lg" name="diagnosa" value="{{ $data->diagnosa }}"  required>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label class="control-label">Nama Hewan</label>
                                    <input type="text" class="form-control input-lg" name="nama_hewan" value="{{ $data->nama_hewan }}"  required>
                                </div>
                                <div class="col">
                                    <label class="control-label">Pelayanan</label>
                                    <input type="text" class="form-control input-lg" name="pelayanan" value="{{ $data->pelayanan }}"  required>
                                </div>
                            </div><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach

    {{-- MODAL DELETE HERE --}}
    @foreach ($rekam_medik as $data)
    <div id="HapusDataRMD-{{ $data->id_rmd }}" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus Data Rekam Medik</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('petugas/rekam-medik/delete/'.$data->id_rmd) }}" method="GET"> 
                <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data dengan ID <b>{{ $data->id_rmd }}</b> ini?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    @endforeach
</div>

<section>
    @include('petugas/layouts.footer');
</section>

{{-- Script Here --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>