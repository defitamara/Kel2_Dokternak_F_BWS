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
                      <th>ID Dokter</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Tempat</th>
                      <th>Telpon</th>
                      <th>Foto</th>
                      <th>Id Jabatan</th>
                      <th>Jadwal Kerja</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    @foreach ($dtdokter as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_dokter }}</td>
                        <td>{{ $item->nama_dokter }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->telpon }}</td>
                        <td><img src="/data/data_dokter/{{ $item->foto }}" width="100"></td>
                        <td>{{ $item->id_jabatan }}</td>
                        <td>{{ $item->jadwal_kerja }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>