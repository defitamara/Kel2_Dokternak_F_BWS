<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
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
		<h5>Laporan Data Petugas Puskeswan</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Petugas</th>
				<th>Puskeswan</th>
				<th>Foto</th>
				<th>Jabatan</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($dtdokpus as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_dokter }}</td>
				<td>{{ $item->nama_puskeswan }}</td>
				<td><img src="/data/data_dokter/{{ $item->foto }}" width="200"></td>
				<td>{{ $item->jabatan }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>