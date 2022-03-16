@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title">Welcome!</h2>
          </div>
          <div class="col-auto">
            <form class="form-inline">
              <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Date Ranges</label>
                <div id="reportrange" class="px-2 py-2 text-muted">
                  <span class="small"></span>
                </div>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
  <div class="container-fluid"> 
    <div class="row justify-content-center">
      <div class="col-15">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
        {{-- <h2 class="page-title">Basic table</h2>
        <p> Tables with built-in bootstrap styles </p>  --}}
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center mb-2">
                  <div class="col">
                    <h5 class="card-title">Data Puskeswan</h5>
                    </div>
                  <div class="col-auto">
                    <div class="form">
                      <a href="{{ route('data_puskeswan.create') }}"><button class="btn btn-primary"
                          type="button"><i class="fa fa-plus"></i><span>Tambah</span></button></a>
                    </div>
                  </div>
                </div>
                <div class="widget-box">
                  <a href="/cetak_pdf/data_puskeswan" class="btn btn-primary" target="_blank">CETAK PDF</a>
                      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                      </div>
                </div>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>ID Puskeswan</th>
                      <th>Nama Puskeswan</th>
                      <th>Alamat</th>
                      <th>Jam Kerja</th>
                      <th>Gambar</th>
                      <th>Maps</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach ($puskeswan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->id_puskeswan }}</td>
                        <td>{{ $item->nama_puskeswan }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->jam_kerja }}</td>
                        <td><img src="/data/data_puskeswan/{{ $item->gambar }}" width="200"></td>
                        <td>{{ $item->maps }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('data_puskeswan.edit',$item->id_puskeswan)}}" class="btn btn-warning">Edit<i class="fa fa-edit"></i></a>
                            <form action="{{ route('data_puskeswan.destroy',$item->id_puskeswan)}}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus
                                <i class="fa fa-trash-o"></i></button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div> <!-- end section -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection