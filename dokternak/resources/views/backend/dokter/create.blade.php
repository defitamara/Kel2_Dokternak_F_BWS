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
            {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Dokter
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
                      <div class="col-md-6 mb-2">
                        <label for="exampleInputAlamat">Alamat</label>
                        <input type="alamat" class="form-control" id="exampleInputAlamat" name="alamat" minlength="5" placeholder="Masukkan Alamat" aria-describedby="Masukkan alamat" 
                        value="{{ isset($dtdokter) ? $dtdokter->alamat : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please use a valid alamat </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-2">
                        <label for="exampleInputTempat">Tempat</label>
                        <input type="tempat" class="form-control" id="exampleInputTempat" name="tempat" minlength="5" placeholder="Masukkan Tempat" aria-describedby="Masukkan tempat" 
                        value="{{ isset($dtdokter) ? $dtdokter->tempat : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please use a valid tempat </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-2">
                        <label for="exampleInputJenisTelpon">Telpon</label>
                        <input type="telpon" class="form-control" id="exampleInputTelpon" name="telpon" minlength="5" placeholder="Masukkan Telpon" aria-describedby="Masukkan telpon" 
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
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom3">Jabatan</label>
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
                    <div class="col-md-6 mb-3">
                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputJadwalKerja">Jadwal Kerja</label>
                        <input type="jadwal_kerja" class="form-control" id="exampleInputJadwalKerja" name="jadwal_kerja" minlength="5" placeholder="Masukkan Jadwal Kerja" aria-describedby="Masukkan jadwal kerja" 
                        value="{{ isset($dtdokter) ? $dtdokter->jadwal_kerja : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please use a valid jadwal kerja </div>
                      </div>
                    </div>
                    {{-- <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="validationCustomUsername">Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationCustomUsername" name="username" minlength="5" placeholder="Masukkan username" aria-describedby="inputGroupPrepend" 
                        value="{{ isset($dtdokter) ? $dtdokter->username : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please choose a username. </div>
                      </div>
                    </div>
                    </div>
                     <!-- /.form-row -->
                    <div class="form-row">
                    <div class="col-md-4 mb-2">
                      <label for="validationCustomPassword">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="validationCustomPassword" name="password" minlength="5" placeholder="Masukkan password" aria-describedby="inputGroupPrepend" 
                        value="{{ isset($dtdokter) ? $dtdokter->password : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please choose a password. </div>
                      </div>
                    </div>
                    </div> --}}
                   
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ route('dtdokter.index') }}"><button class="btn btn-default"
                        type="button">Cancel</button></a>
                  </form>
                </div> <!-- /.card-body -->
              </div> <!-- /.card -->
            </div> <!-- /.col -->
          </div> <!-- end section -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection