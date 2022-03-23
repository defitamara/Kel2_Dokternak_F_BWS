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
            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Data Informasi
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
                  <form class="needs-validation" id="informasi_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($informasi) ? route('data_informasi.update',$informasi->id_info) : 
                            route('data_informasi.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($informasi) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id_info" value="{{ isset($informasi) ? $informasi->id_info : '' }}"> <br/>
                      
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Judul</label>
                          <input class="form-control" id="judul" name="judul" minlength="5" type="text" placeholder="Masukkan judul informasi"
                          value="{{ isset($informasi) ? $informasi->judul : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div> <!-- /.form-row -->
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Isi</label>
                        <input class="form-control" id="isi" name="isi" minlength="5" type="text" placeholder="tulis isi informasi"
                        value="{{ isset($informasi) ? $informasi->isi : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                    {{-- <input type="hidden" name="nama_icon" value="{{ isset($tutorial) ? $tutorial->icon : '' }}">
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Icon</label>
                        <td><img src="/data/data_tutorial/{{ isset($tutorial) ? $tutorial->icon : '' }}"></td>
                        <input type="file" name="icon" id="icon" class="form-control {{ $errors->has('icon') ? 'is-invalid' : ''}}">
                            @if ( $errors->has('icon'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('icon') }}</p>
                            </span>
                        @endif
                    </div>
                  </div> --}}
                   
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('data_informasi.index') }}"><button class="btn btn-default"
                        type="button">Cancel</button></a>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection