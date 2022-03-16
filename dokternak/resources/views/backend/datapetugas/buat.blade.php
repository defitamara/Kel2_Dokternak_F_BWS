@extends('backend/layouts.template')
  
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        <div class="col-12">
          <header class="panel-heading">
            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Admin
        </header>
          @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <h2 class="page-title">Form validation</h2>
          <p class="text-muted">Provide valuable, actionable feedback to your users with HTML5 form validation</p>
              <div class="card shadow">
                <div class="card-header">
                  <strong class="card-title">Advanced Validation</strong>
                </div>
                <div class="card-body">
                  <form class="needs-validation" id="admin_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($datapetugas) ? route('datapetugas.update',$datapetugas->id_dokter) : 
                            route('datapetugas.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($datapetugas) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id" value="{{ isset($datapetugas) ? $datapetugas->id_dokter : '' }}"> <br/>
                      {{-- <input type="hidden" name="id_role" value="{{ $role->id_role }}"> <br/> --}}
                      
                      <div class="single-element-widget mt-10">
                        <h5 class="mb-15">Nama Dokter</h5>
                        <div class="form-select">
                        <select name="nama_dokter" class="form-select" id="default-select">
                            <option disabled selected> Pilih </option>
                            @foreach ($petugas as $item)
                            <option value="{{ $item->nama_dokter }}" selected>{{ $item->nama_dokter}}</option>
                            @endforeach
                        </select>
                        </div> 
                    </div>
                                        
                     <!-- /.form-row -->
                    <div class="form-row">
                    </div>
                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" minlength="5" placeholder="Masukkan email" aria-describedby="Masukkan email" 
                        value="{{ isset($datapetugas) ? $datapetugas->email : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please use a valid email </div>
                        <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                    </div> <!-- /.form-row -->


                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustomPassword">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="validationCustomPassword" name="password" minlength="5" placeholder="Masukkan password" aria-describedby="inputGroupPrepend" 
                        value="{{ isset($datapetugas) ? $datapetugas->password : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please choose a password. </div>
                      </div>
                    </div>
                    </div>
                   
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('datapetugas.index') }}"><button class="btn btn-default"
                        type="button">Cancel</button></a>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection