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
		<h5>Laporan PDF </h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>NO</th>
                      <th>ID Puskeswan</th>
                      <th>Nama Puskeswan</th>
                      <th>Alamat</th>
                      <th>Jam Kerja</th>
                      <th>Gambar</th>
                      <th>Maps</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($puskeswan as $item)
			{{-- @foreach ($data ['puskeswan'] as $item) --}}
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->id_puskeswan }}</td>
				<td>{{ $item->nama_puskeswan }}</td>
				<td>{{ $item->alamat }}</td>
				<td>{{ $item->jam_kerja }}</td>
				<td><img src="/data/data_puskeswan/{{ $item->gambar }}" width="200"></td>
				<td>{{ $item->maps }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>