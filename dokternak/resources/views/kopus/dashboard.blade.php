@extends('kopus/layouts.template')

@section('content')

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
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
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
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          <div class="row">
            {{-- Selamat datang --}}
            @foreach($kopus as $item)
            @if ($item->id == Auth::user()->id)
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  {{-- <h5 class="card-title">Halo !</h5> --}}
                  <p>
                    Selamat Datang <b>Koordinator {{ $item->nama_puskeswan }}</b>!
                  </p>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-bank"></i>
                  </h1>
                  <a href="/dbkopus/tabel_puskeswan"><h6 class="text-white">{{ $item->nama_puskeswan }}</h6></a>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-card-details"></i>
                  </h1>
                  <a href="/dbkopus/tabel_dokpus"><h6 class="text-white">Jumlah Petugas : {{ $petugas_pus }} Orang</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-collage"></i>
                  </h1>
                  <a href="/dbkopus/tabel_dokter"><h6 class="text-white">Total Petugas Pada Website : {{ $count_petugas }}  Orang</h6></a>
                </div>
              </div>
            </div>
            {{-- <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                  </h1>
                  <h6 class="text-white">Tables</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-arrow-all"></i>
                  </h1>
                  <h6 class="text-white">Full Width</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                  </h1>
                  <h6 class="text-white">Forms</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-relative-scale"></i>
                  </h1>
                  <h6 class="text-white">Buttons</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-pencil"></i>
                  </h1>
                  <h6 class="text-white">Elements</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-calendar-check"></i>
                  </h1>
                  <h6 class="text-white">Calendar</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-alert"></i>
                  </h1>
                  <h6 class="text-white">Errors</h6>
                </div>
              </div>
            </div>
            <!-- Column --> --}}
          </div>
          
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

@endsection