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
        <h2 class="page-title">Form Edit Profil Staf</h2>
        <p class="text-muted">Staf memiliki akses untuk mengelola sebagian data pada website Dokternak</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbstaf">Dashboard / </a></b>
                <b><a href="/dbstaf/dt_profil"> Akun Profil / </a></b>
                <b>{{ $dtstaf->nama_staf }}</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="dokter_form" method="POST"  enctype="multipart/form-data"
                        action="{{ route('dt_profil.update',$dtstaf->id_staf) }}">
                            {!! csrf_field() !!}
                            {!! isset($dtstaf) ? method_field('PUT') : '' !!}
                  <input type="hidden" name="id_staf" value="{{ isset($dtstaf) ? $dtstaf->id_staf : '' }}"> <br/>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama staf"
                    value="{{ isset($dtstaf) ? $dtstaf->nama_staf : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Jabatan</label>
                    <input class="form-control" id="jabatan" name="jabatan" minlength="5" type="text" placeholder="Masukkan jabatan (Contoh: Staf TI Dinas, dll)"
                    value="{{ isset($dtstaf) ? $dtstaf->jabatan : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                    <div class="form-row">
                      <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" {{ ($dtstaf->jenis_kelamin=="Laki-Laki")? "checked" : "" }}>
                      <label for="laki" class="tab-label">Laki-Laki</label> <br>
                      <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ ($dtstaf->jenis_kelamin=="Perempuan")? "checked" : "" }}>
                      <label for="perempuan" class="tab-label">Perempuan</label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisTelpon">Telpon</label>
                    <input type="telpon" class="form-control" id="exampleInputTelpon" name="telpon" minlength="5" placeholder="Masukkan Telpon (Contoh: 62xxxxxxxxxxx)" aria-describedby="Masukkan telpon" 
                    value="{{ isset($dtstaf) ? $dtstaf->telpon : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid telpon </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap petugas" required>{{ isset($dtstaf) ? $dtstaf->alamat : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid alamat </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Foto (Rasio 1:1)</label>
                    <input type="hidden" name="nama_gambar" value="{{ isset($dtstaf) ? $dtstaf->foto : '' }}">
                    <td><img src="/data/data_staf/{{ isset($dtstaf) ? $dtstaf->foto : '' }}" width="200"></td>
                    <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" value="{{ isset($dtstaf) ? $dtstaf->foto : '' }}">
                        @if ( $errors->has('foto'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('foto') }}</p>
                        </span>
                    @endif
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('dt_profil.index') }}"><button class="btn btn-secondary"
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