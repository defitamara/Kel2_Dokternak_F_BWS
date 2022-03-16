<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF </title>
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Foto Peternak</th>
                      <th>Password</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    
			@foreach ($peternak as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->namadepan_peternak }} {{ $item->namabelakang_peternak }}</td>
				<td>{{ $item->email }}</td>
				<td>{{ $item->no_hp }}</td>
				<td>{{ $item->jenis_kelamin }}</td>
				<td>{{ $item->alamat }}</td>
				<td><img src="/data/data_peternak/{{ $item->foto_peternak }}" width="100"></td>
				<td>{{\Illuminate\Support\Str::limit ($item->password,10) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>