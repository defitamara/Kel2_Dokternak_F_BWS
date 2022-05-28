<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Kopus</title>
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
		<h5>Laporan Data Koordinator Puskeswan</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Foto</th>
				<th>Id</th>
				<th>Jabatan</th>
				<th>Tempat Dinas</th>
				<th>Jenis Kelamin</th>
				<th>Telpon</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    @foreach ($data_kopus as $item)
                    <tr>
						<td>{{ $no++ }}</td>
						<td>{{ $item->nama_kp }}</td>
						<td><img src="/data/data_kopus/{{ $item->foto }}" width="100"></td>
						<td>{{ $item->id_kp }}</td>
						<td>{{ $item->jabatan }}</td>
						<td>{{ $item->nama_puskeswan }}</td>
						<td>{{ $item->jenis_kelamin }}</td>
						<td>{{ $item->telpon }}</td>
						<td>{{ $item->alamat }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>