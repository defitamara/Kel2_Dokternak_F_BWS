<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Data Obat</title>

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
                        <h2>Tabel Data Obat</h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="/cetak_pdf/dataobat" class="btn btn-secondary" target="_blank"><i class="material-icons">&#xE24D;</i> <span>Export to PDF</span></a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahDataObat">
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
                        {{-- <div class="filter-group">
                            <label>Jenis</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Berlin</option>
                                <option>London</option>
                                <option>Madrid</option>
                                <option>New York</option>
                                <option>Paris</option>								
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Kategori</label>
                            <select class="form-control">
                                <option>Kucing</option>
                                <option>Kambing</option>
                                <option>Sapi</option>
                                <option>Kerbau</option>
                                <option>Kuda</option>
                            </select>
                        </div> --}}
                        {{-- <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div> --}} 
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Supplier</th>						
                        <th>Expired</th>						
                        <th>Keterangan</th>
                        <th>Terakhir Dirubah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Mulai foreach untuk mengambil data obat sesuai petugas yang login --}}
                    @php $no = 1; @endphp
                    @foreach ($obat_petugas as $item)
        
                    @if ($item->id == Auth::user()->id)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_obat}}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->supplier }}</td>
                        <td>{{ date('d-M-y', strtotime($item->expired)) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="" method="GET" class="btn btn-warning" data-toggle="modal" data-target="#EditDataObat-{{ $item->id_obat }}"><i class="fa fa-edit"></i></a>
                            <a href="" method="GET" class="btn btn-danger" data-toggle="modal" data-target="#HapusDataObat-{{ $item->id_obat }}"><i class="fa fa-trash-o"></i></a>
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
                    {{ $obat_petugas->links()}}
                </ul>
            </div>
        </div>
    </div>
    
    
    {{-- MODAL TAMBAH DATA HERE --}}
    <div id="TambahDataObat" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="data_obat_form" action="{{ route('simpanobat') }}">
                        @csrf
                        <input type="hidden" name="id_obat" value="">
                        @foreach ($obat_petugas as $item)
                            @if ($item->id == Auth::user()->id)
                            <input type="hidden" name="id_dokter" value="{{ $item->id_dokter }}" required class="single-input">
                            @endif
                        @endforeach
                        <div class="form-group">
                            <label class="control-label">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stok</label>
                            <input type="number" class="form-control" name="stok" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Supplier</label>
                            <input type="text" class="form-control" name="supplier" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Expired</label>
                            <input type="date" class="form-control" name="expired" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" required></textarea>
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
    @foreach ($data_obat as $data)
    <div id="EditDataObat-{{ $data->id_obat }}" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST"  action="{{ url('petugas/data-obat/edit/'.$data->id_obat) }}">
                            @csrf
                            <input type="hidden" name="id_rmd" value="{{ $data->id_obat }}">
                            <div class="form-group">
                                <label class="control-label">Nama Obat</label>
                                <input type="text" class="form-control" name="nama_obat" value="{{ $data->nama_obat }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{ $data->stok }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <input type="text" class="form-control" name="supplier" value="{{ $data->supplier }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Expired</label>
                                <input type="date" class="form-control" name="expired" value="{{ $data->expired }}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" required>{{ $data->keterangan }}</textarea>
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
    @foreach ($data_obat as $data)
    <div id="HapusDataObat-{{ $data->id_obat }}" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus Data Obat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('petugas/data-obat/delete/'.$data->id_obat) }}" method="GET"> 
                <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data dengan ID <b>{{ $data->id_obat }}</b> ini?</p>
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