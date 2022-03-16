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
                <th>ID Kategori</th>
                <th>Tanggal</th>
                <th>Nama Penulis</th>
                <th>Judul</th>
                <th> Isi</th>
                <th>Gambar</th>
                <th>Sumber</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach ($artikel as $item)
			<tr>
				<td>{{ $no++ }}</td>
				{{-- <td>{{ $item->id_artikel }}</td> --}}
				<td>{{ $item->kategori_artikel }}</td>
				<td>{{ $item->tanggal }}</td>
				<td>{{ $item->nama_penulis }}</td>
				<td>{{ $item->judul }}</td>
				<td>{{\Illuminate\Support\Str::limit($item->isi , 250)}} <a href="/artikel/{{ $item->id_artikel }}/detail/" class="more-btn">  <strong> Read more » </strong></a></td>
				<td><img src="/data/data_artikel/{{ $item->gambar }}" width="200"></td>
				<td>{{ $item->sumber }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>