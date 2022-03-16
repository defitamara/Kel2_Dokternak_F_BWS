<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Rekam Medik</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Rekam Medik</h4>
	</center>

    {{-- <a href="/petugas/rekam-medik" class="btn btn-primary"><span>Kembali</span></a><br> --}}
 
	<table class='table table-bordered'>
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
			</tr>
		</thead>
		<tbody>
			{{-- Mulai foreach untuk mengambil data rekam medik sesuai petugas yang login --}}
            @foreach ($rekam_medik as $item)
        
            {{-- @if ($item->id == Auth::user()->id) --}}
            <tr>
                <td>{{ $loop->iteration }}</td>
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
            </tr>
            {{-- @endif --}}
            @endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>