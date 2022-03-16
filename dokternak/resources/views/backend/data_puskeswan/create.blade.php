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
            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Data Artikel
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
                  <form class="needs-validation" id="puskeswan_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($puskeswan) ? route('data_puskeswan.update',$puskeswan->id_puskeswan) : 
                            route('data_puskeswan.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($puskeswan) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id_puskeswan" value="{{ isset($puskeswan) ? $puskeswan->id_puskeswan : '' }}"> <br/>
                      <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Nama Puskeswan</label>
                        <input class="form-control" id="nama_puskeswan" name="nama_puskeswan" minlength="5" type="text" placeholder="Masukkan nama puskeswan"
                        value="{{ isset($puskeswan) ? $puskeswan->nama_puskeswan : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div> <!-- /.form-row -->
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" minlength="5" type="text" placeholder="Masukkan alamat"
                        value="{{ isset($puskeswan) ? $puskeswan->alamat : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Jam Kerja</label>
                        <input class="form-control" id="jam_kerja" name="jam_kerja" minlength="5" type="text" placeholder="Masukkan jam kerja"
                        value="{{ isset($puskeswan) ? $puskeswan->jam_kerja : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                    <input type="hidden" name="nama_gambar" value="{{ isset($puskeswan) ? $puskeswan->gambar : '' }}">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Gambar</label>
                          <td><img src="/data/data_puskeswan/{{ isset($puskeswan) ? $puskeswan->gambar : '' }}"></td>
                          <input type="file" name="gambar" id="gambar" value="{{ isset($puskeswan) ? $puskeswan->gambar : '' }}" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}" >
                        @if ( $errors->has('gambar'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('gambar') }}</p>
                        </span>
                    @endif
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Maps</label>
                        <input class="form-control" id="maps" name="maps" minlength="5" type="text" placeholder="Masukkan maps"
                        value="{{ isset($puskeswan) ? $puskeswan->maps : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                   
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('data_puskeswan.index') }}"><button class="btn btn-default"
                        type="button">Cancel</button></a>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection