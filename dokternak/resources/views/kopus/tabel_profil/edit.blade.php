@extends('kopus/layouts.template')
  
@section('content')
{{-- <main role="main" class="main-content"> --}}
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Edit Profil Koor. Puskeswan</h2>
        <p class="text-muted">Staf memiliki akses untuk mengelola data satu Puskeswan</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbkopus">Dashboard / </a></b>
                <b><a href="/dbkopus/tabel_profil"> Akun Profil / </a></b>
                <b>{{ $dtkopus->nama_kp }}</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="dokter_form" method="POST"  enctype="multipart/form-data"
                        action="{{ route('tabel_profil.update',$dtkopus->id_kp) }}">
                            {!! csrf_field() !!}
                            {!! isset($dtkopus) ? method_field('PUT') : '' !!}
                  <input type="hidden" name="id_kp" value="{{ isset($dtkopus) ? $dtkopus->id_kp : '' }}"> <br/>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama koordinator puskeswan"
                    value="{{ isset($dtkopus) ? $dtkopus->nama_kp : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Jabatan</label>
                    <input class="form-control" id="jabatan" name="jabatan" minlength="5" type="text" placeholder="Masukkan jabatan (Contoh: Koor. Puskeswan A, dll)"
                    value="{{ isset($dtkopus) ? $dtkopus->jabatan : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                    <div class="form-row">
                      <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" {{ ($dtkopus->jenis_kelamin=="Laki-Laki")? "checked" : "" }}>
                      <label for="laki" class="tab-label">Laki-Laki</label> <br>
                      <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ ($dtkopus->jenis_kelamin=="Perempuan")? "checked" : "" }}>
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
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap petugas" required>{{ isset($dtkopus) ? $dtkopus->alamat : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid alamat </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Foto (Rasio 1:1)</label>
                    <input type="hidden" name="nama_gambar" value="{{ isset($dtkopus) ? $dtkopus->foto : '' }}">
                    <td><img src="/data/data_kopus/{{ isset($dtkopus) ? $dtkopus->foto : '' }}" width="200"></td>
                    <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" value="{{ isset($dtstaf) ? $dtstaf->foto : '' }}">
                        @if ( $errors->has('foto'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('foto') }}</p>
                        </span>
                    @endif
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('tabel_profil.index') }}"><button class="btn btn-secondary"
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