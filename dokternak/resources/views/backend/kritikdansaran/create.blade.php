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
        <div class="col-12">
          <header class="panel-heading">
            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Data Tutorial
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
                  <form class="needs-validation" id="kritikdansaran_form" method="POST" 
                            action="{{ isset($ks) ? route('data_ks.update',$ks->id_ks) : 
                            route('data_ks.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($ks) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id_ks" value="{{ isset($ks) ? $ks->id_ks : '' }}"> <br/>
                      <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Nama</label>
                          <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama"
                          value="{{ isset($ks) ? $ks->nama : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div> <!-- /.form-row -->
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Email</label>
                          <input class="form-control" id="email_hp" name="email_hp" minlength="5" type="text" placeholder="Masukkan email"
                          value="{{ isset($ks) ? $ks->email_hp : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div> <!-- /.form-row -->
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Pekerjaan</label>
                          <input class="form-control" id="pekerjaan" name="pekerjaan" minlength="5" type="text" placeholder="Masukkan pekerjaan"
                          value="{{ isset($ks) ? $ks->pekerjaan: '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div> <!-- /.form-row -->
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Komentar</label>
                        <input class="form-control" id="komentar" name="komentar" minlength="5" type="text" placeholder="tulis komentar"
                        value="{{ isset($ks) ? $ks->komentar : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('data_tutorial.index') }}"><button class="btn btn-default"
                        type="button">Cancel</button></a>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection