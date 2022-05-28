@extends('staf/layouts.template')

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
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-library-books"></i>
                  </h1>
                  <a href="/dbstaf/dt_artikel"><h6 class="text-white">{{ $count_artikel }} Data Artikel</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-card-details"></i>
                  </h1>
                  <a href="/dbstaf/dt_dokter"><h6 class="text-white">{{ $count_petugas }} Data Petugas</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-card-details"></i>
                  </h1>
                  <a href="/dbstaf/dt_staf"><h6 class="text-white">{{ $count_staf }} Data Staf IT</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-card-details"></i>
                  </h1>
                  <a href="/dbstaf/dt_kopus"><h6 class="text-white">{{ $count_kopus }} Data Koor. Puskeswan</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-card-details"></i>
                  </h1>
                  <a href="/dbstaf/dt_penyuluh"><h6 class="text-white">{{ $count_py }} Data Penyuluh</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-bank"></i>
                  </h1>
                  <a href="/dbstaf/dt_puskeswan"><h6 class="text-white">{{ $count_pus }} Data Puskeswan</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-key"></i>
                  </h1>
                  <a href="/dbstaf/dt_user_petugas"><h6 class="text-white">{{ $c_userpetugas }} Akun Petugas</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-key"></i>
                  </h1>
                  <a href="/dbstaf/dt_user_staf"><h6 class="text-white">{{ $c_userstaf }} Akun Staf</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-key"></i>
                  </h1>
                  <a href="/dbstaf/dt_user_kopus"><h6 class="text-white">{{ $c_userkopus }} Akun Koor. Puskeswan</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-information"></i>
                  </h1>
                  <a href="/dbstaf/dt_informasi"><h6 class="text-white">{{ $c_informasi }} Data Informasi</h6></a>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

@endsection