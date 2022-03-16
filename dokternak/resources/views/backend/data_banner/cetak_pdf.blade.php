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
                      <th>ID Banner</th>
                      <th>Gambar</th>
                      <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    @foreach ($banner as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_banner }}</td>
                        <td><img src="/data/data_banner/{{ $item->gambar }}" width="200"></td>
                        <td>{{ $item->status }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>