@extends('backend/layouts.template')
  
@section('content')

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="robots" content="noindex,nofollow" />
    <title>Data Artikel</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('Backend/assets/images/favicon.png') }}"/>
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('Backend/assets/extra-libs/multicheck/multicheck.css') }}"/>
    <link
      href="{{ asset('Backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
      rel="stylesheet"/>
    <link href="{{ asset('Backend/dist/css/style.min.css') }}" rel="stylesheet" /> 
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - tampilan loading -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - tabel daftar artikel -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full">
      
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Daftar Artikel</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Artikel
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="container-fluid"> 
          <div class="row justify-content-center">
            <div class="col-15">

                  <div class="card shadow">
                    <div class="card-body">

                      {{-- Button in header --}}
                      <a href="{{ route('data_artikel.create') }}" class="card-title">
                        <button type="button" class="btn btn-primary">
                          Tambah Data +
                        </button>
                      </a>
                      <a href="/cetak_pdf/data_artikel" class="card-title" target="_blank">
                        <button type="button" class="btn btn-secondary">
                          Cetak PDF
                        </button>
                      </a>
                      <br><br>

                      {{-- Alert --}}
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success" role="alert">
                          {{ $message }}
                      </div>
                      @endif

                      {{-- Tabel 1 - daftar artikel --}}
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Kategori</th>
                              <th>Tanggal</th>
                              <th>Nama Penulis</th>
                              <th>Isi</th>
                              <th>Gambar</th>
                              <th>Sumber</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php $no = 1; @endphp
                            @foreach ($artikel as $item)
                            <tr>
                              <td>{{ $no++ }}</td>
                              {{-- <td>{{ $item->id_artikel }}</td> --}}
                              <td>{{ $item->judul }}</td>
                              <td>{{ $item->kategori_artikel }}</td>
                              <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                              <td>{{ $item->nama_penulis }}</td>
                              <td>{!!\Illuminate\Support\Str::limit($item->isi , 50)!!} <a href="/dashboard/data_artikel/{{ $item->id_artikel }}/detail/" class="more-btn">  <strong> Read more » </strong></a></td>
                              <td><img src="/data/data_artikel/{{ $item->gambar }}" width="200"></td>
                              <td>{{ \Illuminate\Support\Str::limit($item->sumber , 20) }}</td>
                              <td>
                              <div class="btn-group">
                                  <a href="{{ route('data_artikel.edit',$item->id_artikel)}}" class="btn btn-cyan btn-sm text-white">Edit
                                    <span class="fas fa-edit"></span></a>
                                  <form action="{{ route('data_artikel.destroy',$item->id_artikel)}}" method="POST">
                                  @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm text-white" 
                                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus
                                      <span class="far fa-trash-alt"></span></button>
                                  </form>
                                  <form action="{{ route('batalkonfirmasi',$item->id_artikel)}}" method="POST">
                                    @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-sm text-white" 
                                        onclick="return confirm('Apakah Anda yakin ingin mengarsipkan data ini?')">Arsipkan
                                        <span class="far fa-file-archive"></span></button>
                                        {{-- <span class="far fa-eye-slash"></span> --}}
                                  </form>
                              </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Kategori</th>
                              <th>Tanggal</th>
                              <th>Nama Penulis</th>
                              <th>Isi</th>
                              <th>Gambar</th>
                              <th>Sumber</th>
                              <th>Aksi</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div> <!-- div responsive -->
                    </div>
                  </div>
            </div> <!-- end section -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

      </div> <!-- End Page wrapper  -->
    </div> <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - tabel konfirmasi -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full">
      
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Daftar Artikel yang Belum Dikonfirmasi</h4>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="container-fluid"> 
          <div class="row justify-content-center">
            <div class="col-15">

              <div class="card shadow">
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table id="zero_config_2" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Tanggal</th>
                          <th>Nama Penulis</th>
                          <th>Isi</th>
                          <th>Gambar</th>
                          <th>Sumber</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($artikel2 as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          {{-- <td>{{ $item->id_artikel }}</td> --}}
                          <td>{{ $item->judul }}</td>
                          <td>{{ $item->kategori_artikel }}</td>
                          <td>{{ $item->tanggal }}</td>
                          <td>{{ $item->nama_penulis }}</td>
                          <td>{!!\Illuminate\Support\Str::limit($item->isi , 50)!!} <a href="/dashboard/data_artikel/{{ $item->id_artikel }}/detail/" class="more-btn">  <strong> Read more » </strong></a></td>
                          <td><img src="/data/data_artikel/{{ $item->gambar }}" width="200"></td>
                          <td>{{ \Illuminate\Support\Str::limit($item->sumber , 20) }}</td>
                          <td>
                          <div class="btn-group">
                            <form action="{{ route('konfirmasi',$item->id_artikel)}}" method="POST">
                              @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-success btn-sm text-white" 
                                  onclick="return confirm('Apakah Anda yakin ingin menampilkan data artikel ini?')">Tampilkan
                                  <span class="fas fa-eye"></span></i></button>
                            </form>
                              <a href="{{ route('data_artikel.edit',$item->id_artikel)}}" class="btn btn-cyan btn-sm text-white">Edit<span class="fas fa-edit"></span></a>
                              <form action="{{ route('data_artikel.destroy',$item->id_artikel)}}" method="POST">
                              @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm text-white" 
                                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus
                                  <span class="far fa-trash-alt"></span></button>
                              </form>
                          </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Tanggal</th>
                          <th>Nama Penulis</th>
                          <th>Isi</th>
                          <th>Gambar</th>
                          <th>Sumber</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div> <!-- div responsive -->
                </div>
              </div>
            </div> <!-- end section -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </div> <!-- End Page wrapper  -->
    </div> <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('Backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('Backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('Backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('Backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('Backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('Backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('Backend/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('Backend/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('Backend/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
      $("#zero_config_2").DataTable();
    </script>
    {{-- Mengatur lamanya alert muncul --}}
    <script type="text/javascript">
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
    </script>

  </body>
</html>
@endsection