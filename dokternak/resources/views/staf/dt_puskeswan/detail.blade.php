@extends('staf/layouts.template')
  
@section('content')

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="robots" content="noindex,nofollow" />
    <title>Detail Puskeswan</title>
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
              <h4 class="page-title">Detail Puskeswan</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dbstaf">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dbstaf/dt_puskeswan">Data Puskeswan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Detail Puskeswan
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
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="card">
            @foreach ($puskeswan as $item)
              <div class="card-body">
                <div class="card-title">
                  <b><a href="/dbstaf">Dashboard / </a>
                  <a href="/dbstaf/dt_puskeswan">Data Puskeswan / </a>
                  {{ $item->nama_puskeswan }}</b>
                </div>
                <div class="d-flex flex-row comment-row mt-0">
                  <div class="comment-text w-100">
                    <form class="needs-validation" id="dokter_form" action="">
                      <div class="form-row">
                        <div class="col-md-4 mb-2">
                        <img src="/data/data_puskeswan/{{ $item->gambar }}" width="250">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-2">
                          <label for="validationCustom3">Nama Puskeswan</label>
                          <input class="form-control" value="{{ $item->nama_puskeswan }}" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-2">
                          <label for="validationCustom3">No Telpon/WA Koordinator</label>
                          <input class="form-control" value="{{ $item->nomer }}" disabled>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-2">
                          <label for="validationCustom3">Alamat</label>
                          <textarea class="form-control" style="resize:none;width:1000px;height:100px;" disabled>{{ $item->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-2">
                          <label for="validationCustom3">Wilayah Kerja</label>
                          <textarea class="form-control" style="resize:none;width:1000px;height:100px;" disabled>{{ $item->wilker }}</textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-2">
                          <label for="validationCustom3">Jam Kerja</label>
                          <textarea class="form-control" style="resize:none;width:1000px;height:100px;" disabled>{{ $item->jam_kerja }}</textarea>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-4 mb-2">
                          <label for="validationCustom3">Link Google Maps</label>
                          <a href="{{ $item->maps }}" target="_blank">
                            <input class="form-control" value="{{ $item->maps }}" disabled>
                          </a>
                        </div>
                      </div>
                      
                    </form>
                    
                    <div class="comment-footer float-end">
                      <a href="{{ route('dt_puskeswan.index') }}"><button
                        type="button"
                        class="btn btn-secondary btn-sm text-white">
                        Kembali
                      </button></a>
                      <a href="{{ route('dt_puskeswan.edit',$item->id_puskeswan) }}"><button
                        type="button"
                        class="btn btn-cyan btn-sm text-white">
                        Edit
                      </button></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>  <!-- End container fluid  -->
      </div>  <!-- End Page wrapper  -->
      <!-- ============================================================== -->

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

