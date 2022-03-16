<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Obat</title>
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
		<h5>Laporan Data Obat</h4>
	</center>

    {{-- <a href="/petugas/rekam-medik" class="btn btn-primary"><span>Kembali</span></a><br> --}}
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Id Obat</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Supplier</th>						
                <th>Expired</th>						
                <th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			{{-- Mulai foreach untuk mengambil data obat sesuai petugas yang login --}}
            @foreach ($data_obat as $item)
        
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id_obat}}</td>
                <td>{{ $item->nama_obat }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->supplier }}</td>
                <td>{{ date('d-M-y', strtotime($item->expired)) }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>