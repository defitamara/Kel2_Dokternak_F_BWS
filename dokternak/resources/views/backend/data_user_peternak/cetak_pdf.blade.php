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
				<th>No</th>
                <th>Nama</th>
                <th>Id Staf</th>
                <th>Jabatan</th>
                <th>Jenis Kelamin</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Foto</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    @foreach ($data_staf as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_staf }}</td>
                        <td>{{ $item->id_staf }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->telpon }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td><img src="/data/data_staf/{{ $item->foto }}" width="100"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>