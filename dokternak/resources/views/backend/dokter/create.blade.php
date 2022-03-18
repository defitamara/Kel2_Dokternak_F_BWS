@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Dokter / Petugas</h2>
        <p class="text-muted">Dokter Hewan, Paramedis, dan Petugas Inseminator Buatan</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/dtdokter"> Data Dokter / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="dokter_form" method="POST"  enctype="multipart/form-data"
                        action="{{ isset($dtdokter) ? route('dtdokter.update',$dtdokter->id_dokter) : 
                        route('dtdokter.store') }}">
                            {!! csrf_field() !!}
                            {!! isset($dtdokter) ? method_field('PUT') : '' !!}
                  <input type="hidden" name="id_dokter" value="{{ isset($dtdokter) ? $dtdokter->id_dokter : '' }}"> <br/>
                  <input type="hidden" name="sertifikasi" value="{{ isset($dtdokter) ? $dtdokter->sertifikasi : 'kosong' }}"> <br/>
                  <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama"
                    value="{{ isset($dtdokter) ? $dtdokter->nama_dokter : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputEmail2">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" name="email" minlength="5" placeholder="Masukkan email" aria-describedby="Masukkan email" 
                    value="{{ isset($dtdokter) ? $dtdokter->email : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid email </div>
                    <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                    <input type="jenis_kelamin" class="form-control" id="exampleInputJenisKelamin" name="jenis_kelamin" minlength="5" placeholder="Masukkan Jenis Kelamin" aria-describedby="Masukkan jenis_kelamin" 
                    value="{{ isset($dtdokter) ? $dtdokter->jenis_kelamin : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid jenis kelamin </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap petugas" required>{{ isset($dtdokter) ? $dtdokter->alamat : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid alamat </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputTempat">Tempat / Wilayah Kerja</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" minlength="5" placeholder="Contoh: Bondowoso (Jika lebih dari 1, batasi dengan koma)" aria-describedby="Masukkan tempat" 
                    value="{{ isset($dtdokter) ? $dtdokter->tempat : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid tempat </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisTelpon">Telpon</label>
                    <input type="telpon" class="form-control" id="exampleInputTelpon" name="telpon" minlength="5" placeholder="Masukkan Telpon (Contoh: 62xxxxxxxxxxx)" aria-describedby="Masukkan telpon" 
                    value="{{ isset($dtdokter) ? $dtdokter->telpon : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid telpon </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Foto</label>
                    <input type="hidden" name="nama_gambar" value="{{ isset($dtdokter) ? $dtdokter->foto : '' }}">
                    <td><img src="/data/data_dokter/{{ isset($dtdokter) ? $dtdokter->foto : '' }}" width="200"></td>
                    <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" value="{{ isset($dtdokter) ? $dtdokter->foto : '' }}">
                        @if ( $errors->has('foto'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('foto') }}</p>
                        </span>
                    @endif
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom3">ID Jabatan</label>
                    <input list="id_jabatan" class="form-control {{ $errors->has('id_jabatan') ? 'is-invalid' : ''}}" placeholder='Masukkan jabatan' value="{{ isset($dtdokter) ? $dtdokter->id_jabatan : '' }}" name="id_jabatan" >
                      @if ( $errors->has('id_jabatan'))
                          <span class="text-danger small">
                              <p>{{ $errors->first('id_jabatan') }}</p>
                          </span>
                      @endif
                      <datalist id="id_jabatan" name="id_jabatan">
                      <div class="form-select" id="default-select">
                          <select name="s_jabatan" class="form-control" id="exampleFormControlSelect1">              
                            @foreach ($jabatan as $data_jabatan)
                              <option value="{{ $data_jabatan->id_jabatan }}" >{{ $data_jabatan->jabatan }}</option>
                            @endforeach     
                            </select><br>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="exampleInputJadwalKerja">Jadwal Kerja</label>
                    <textarea type="text" class="form-control" id="jadwal_kerja" name="jadwal_kerja" placeholder="Tuliskan jadwal kerja (Contoh: Senin pukul 07.00-19.00, Selasa .. dst)" required>{{ isset($dtdokter) ? $dtdokter->jadwal_kerja : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid jadwal kerja </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('dtdokter.index') }}"><button class="btn btn-secondary"
                    type="button">Cancel</button></a>
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
      </div> <!-- /.col -->
    </div> <!-- end section -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Link Js CkEditor -->
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>

@endsection