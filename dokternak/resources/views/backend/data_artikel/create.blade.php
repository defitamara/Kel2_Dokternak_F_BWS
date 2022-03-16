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
                    <form class="needs-validation" id="artikel_form" method="POST" enctype="multipart/form-data"
                              action="{{ isset($artikel) ? route('data_artikel.update',$artikel->id_artikel) : 
                              route('data_artikel.store') }}">
                                  {!! csrf_field() !!}
                                  {!! isset($artikel) ? method_field('PUT') : '' !!}
                        <input type="hidden" name="id_artikel" value="{{ isset($artikel) ? $artikel->id_artikel : '' }}"> <br/>
                        
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Kategori</label>
                          <input list="id_ktg" class="form-control {{ $errors->has('id_ktg') ? 'is-invalid' : ''}}" placeholder='Masukkan Jenis Hewan' value="{{ isset($artikel) ? $artikel->id_ktg : '' }}" name="id_ktg" >
                            @if ( $errors->has('id_ktg'))
                                <span class="text-danger small">
                                    <p>{{ $errors->first('id_ktg') }}</p>
                                </span>
                            @endif
                            <datalist id="id_ktg" name="id_ktg">
                            <div class="form-select" id="default-select">
                                <select name="s_kategori" class="form-control" id="exampleFormControlSelect1">              
                                  @foreach ($kategori as $data_kategori)
                                    <option value="{{ $data_kategori->id_ktg }}" >{{ $data_kategori->kategori_artikel }}</option>
                                  @endforeach     
                                  </select><br>
                            </div>
                      </div>
                      <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Nama Penulis</label>
                          <input class="form-control" id="nama_penulis" name="nama_penulis" minlength="5" type="text" placeholder="Masukkan nama penulis"
                          value="{{ isset($artikel) ? $artikel->nama_penulis : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Judul</label>
                          <input class="form-control" id="judul" name="judul" minlength="5" type="text" placeholder="Masukkan judul"
                          value="{{ isset($artikel) ? $artikel->judul : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Isi</label>
                          <input class="form-control" id="isi" name="isi" minlength="5" type="text" placeholder="tulis isi artikel"
                          value="{{ isset($artikel) ? $artikel->isi : '' }}"  
                              required>
                          <div class="valid-feedback"> Looks good! </div>
                        </div>
                      </div>
                      <input type="hidden" name="nama_gambar" value="{{ isset($artikel) ? $artikel->gambar : '' }}">
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationCustom3">Gambar</label>
                          <td><img src="/data/data_artikel/{{ isset($artikel) ? $artikel->gambar : '' }}"></td>
                          <input type="file" name="gambar" id="gambar" value="{{ isset($artikel) ? $artikel->gambar : '' }}" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}" >
                        @if ( $errors->has('gambar'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('gambar') }}</p>
                        </span>
                    @endif
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationCustom3">Sumber</label>
                        <input class="form-control" id="sumber" name="sumber" minlength="5" type="text" placeholder="Masukkan sumber"
                        value="{{ isset($artikel) ? $artikel->sumber : '' }}"  
                            required>
                        <div class="valid-feedback"> Looks good! </div>
                      </div>
                    </div>
                     
                      <button class="btn btn-primary" type="submit">Save</button>
                      <a href="{{ route('data_artikel.index') }}"><button class="btn btn-default"
                          type="button">Cancel</button></a>
                      
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection