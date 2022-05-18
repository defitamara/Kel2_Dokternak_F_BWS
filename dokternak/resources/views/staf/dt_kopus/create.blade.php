@extends('staf/layouts.template')
  
@section('content')
{{-- <main role="main" class="main-content"> --}}
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Koordinator Puskeswan</h2>
        <p class="text-muted">Tambah data Koordinator Puskeswan baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbstaf">Dashboard / </a></b>
                <b><a href="/dbstaf/dt_kopus"> Data Koordinator Puskeswan / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="kopus_form" method="POST" enctype="multipart/form-data"
              action="{{ isset($dtkopus) ? route('dt_kopus.update',$dtkopus->id_kp) : 
              route('dt_kopus.store') }}">
                  {!! csrf_field() !!}
                  {!! isset($dtkopus) ? method_field('PUT') : '' !!}
                  <input type="hidden" name="id_kp" value="{{ isset($dtkopus) ? $dtkopus->id_kp : '' }}"> <br/>
                  <input type="hidden" name="id" value="{{ isset($dtkopus) ? $dtkopus->id : '' }}"> <br/>

                  <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="validationCustom3">Nama Lengkap</label>
                      <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama"
                      value="{{ isset($dtkopus) ? $dtkopus->nama_kp : '' }}"  
                          required>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                  </div> <!-- /.form-row -->
                  <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="exampleInputJabatan">Jabatan</label>
                      <input type="text" class="form-control" id="jabatan" name="jabatan" minlength="5" placeholder="Tulis jabatan (Ex: Koordinator Puskeswan)" aria-describedby="Masukkan jabatan" 
                      value="{{ isset($dtkopus) ? $dtkopus->jabatan : '' }}"  
                      required>
                      <div class="valid-feedback"> Looks good! </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="exampleInputJK">Jenis Kelamin</label>
                      <div class="form-row">
                        <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" >
                        <label for="laki" class="tab-label">Laki-Laki</label> <br>
                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" >
                        <label for="perempuan" class="tab-label">Perempuan</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="exampleInputJenisTelpon">Telpon</label>
                      <input type="telpon" class="form-control" id="exampleInputTelpon" name="telpon" minlength="5" placeholder="Masukkan Telpon (Contoh: 62xxxxxxxxxxx)" aria-describedby="Masukkan telpon" 
                      value="{{ isset($dtkopus) ? $dtkopus->telpon : '' }}"  
                      required>
                      <div class="invalid-feedback"> Please use a valid telpon </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-2">
                      <label for="exampleInputAlamat">Alamat</label>
                      <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap koordinator Puskeswan" required>{{ isset($dtkopus) ? $dtkopus->alamat : '' }}</textarea>
                      <div class="invalid-feedback"> Please use a valid alamat </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="validationCustom3">Foto</label>
                      <input type="hidden" name="nama_gambar" value="{{ isset($dtkopus) ? $dtkopus->foto : '' }}">
                      <td><img src="/data/data_kopus/{{ isset($dtkopus) ? $dtkopus->foto : '' }}" width="200"></td>
                      <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" value="{{ isset($dtkopus) ? $dtkopus->foto : '' }}">
                          @if ( $errors->has('foto'))
                          <span class="text-danger small">
                              <p>{{ $errors->first('foto') }}</p>
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom3">ID Puskeswan Tempat Dinas</label>
                      <input list="id_puskeswan" class="form-control {{ $errors->has('id_puskeswan') ? 'is-invalid' : ''}}" placeholder='Masukkan puskeswan' value="{{ isset($dtkopus) ? $dtkopus->id_puskeswan : '' }}" name="id_puskeswan" >
                        @if ( $errors->has('id_puskeswan'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('id_puskeswan') }}</p>
                            </span>
                        @endif
                        <datalist id="id_puskeswan" name="id_puskeswan">
                        <div class="form-select" id="default-select">
                            <select name="s_puskeswan" class="form-control" id="exampleFormControlSelect1">              
                              @foreach ($puskeswan as $data_puskeswan)
                                <option value="{{ $data_puskeswan->id_puskeswan }}" >{{ $data_puskeswan->nama_puskeswan }}</option>
                              @endforeach     
                              </select><br>
                        </div>
                    </div>
                  </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('dt_kopus.index') }}"><button class="btn btn-secondary"
                    type="button">Cancel</button></a>
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
      </div> <!-- /.col -->
    </div> <!-- end section -->
  </div> <!-- .container-fluid -->
</div> <!-- .page wrapper -->
{{-- </main> <!-- main --> --}}

<!-- Link Js CkEditor -->
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>

@endsection