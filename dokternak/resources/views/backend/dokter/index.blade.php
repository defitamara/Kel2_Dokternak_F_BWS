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
    <title>Data Dokter</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('backend/assets/images/favicon.png') }}"/>
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('backend/assets/extra-libs/multicheck/multicheck.css') }}"/>
    <link
      href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
      rel="stylesheet"/>
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" /> 
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
    <!-- Main wrapper - tabel daftar dokter/petugas -->
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
              <h4 class="page-title">Data Dokter</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Data Dokter
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
                  <a href="{{ route('dtdokter.create') }}" class="card-title">
                    <button type="button" class="btn btn-primary">
                      Tambah Data +
                    </button>
                  </a>
                  <a href="/cetak_pdf/dtdokter" class="card-title" target="_blank">
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

                  <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Email</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Tempat</th>
                          <th>Telpon</th>
                          <th>Foto</th>
                          <th>Jabatan</th>
                          <th>Jadwal Kerja</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach ($dtdokter as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->nama_dokter }}</td>
                          <td>{{ $item->id_dokter }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->jenis_kelamin }}</td>
                          {{-- <td>{{ $item->alamat }}</td> --}}
                          <td>{{ \Illuminate\Support\Str::limit($item->alamat , 50) }} <a href="/dashboard/dtdokter/{{ $item->id_dokter }}/detail/" class="more-btn">  <strong> Read more » </strong></a></td>
                          <td>{{ $item->tempat }}</td>
                          <td>{{ $item->telpon }}</td>
                          <td><img src="/data/data_dokter/{{ $item->foto }}" width="100"></td>
                          <td>{{ $item->jabatan }}</td>
                          {{-- <td>{{ $item->jadwal_kerja }}</td> --}}
                          <td>{{ \Illuminate\Support\Str::limit($item->jadwal_kerja , 50) }} <a href="/dashboard/dtdokter/{{ $item->id_dokter }}/detail/" class="more-btn">  <strong> Read more » </strong></a></td>
                          {{-- <td>{{ $item->username }}</td>
                          <td>{{ $item->password }}</td> --}}
                          <td>
                            <div class="btn-group">
                              <a href="{{ route('dtdokter.edit',$item->id_dokter)}}" class="btn btn-cyan btn-sm text-white">Edit
                                <span class="fas fa-edit"></span></a>
                              <form action="{{ route('dtdokter.destroy',$item->id_dokter)}}" method="POST">
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
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Email</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Tempat</th>
                          <th>Telpon</th>
                          <th>Foto</th>
                          <th>Jabatan</th>
                          <th>Jadwal Kerja</th>
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
    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
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