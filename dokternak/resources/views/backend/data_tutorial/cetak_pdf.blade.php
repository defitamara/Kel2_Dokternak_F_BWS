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
                      <th>ID Tutorial</th>
                      <th>Judul Tutorial</th>
                      <th>Isi</th>
                      <th>Icon</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
                    @foreach ($tutorial as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_tutorial }}</td>
                        <td>{{ $item->judul_tutorial }}</td>
                        <td>{{ $item->isi }}</td>
                        <td><img src="/data/data_tutorial/{{ $item->icon }}" width="200"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
<script type="text/javascript">
window.print();
</script>

</body>
</html>