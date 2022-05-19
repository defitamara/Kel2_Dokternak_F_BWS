@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Staf IT</h2>
        <p class="text-muted">Tambahkan data staf IT baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_staf"> Data Staf IT / </a></b>
                <b>Form</b>
            </div>
            
            <div class="card-body">
              <form class="needs-validation" id="staf_form" method="POST" enctype="multipart/form-data"
              action="{{ route('data_staf.store') }}">
                  {!! csrf_field() !!}
                  {!! isset($data_staf) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id_staf" value="{{ isset($data_staf) ? $data_staf->id_staf : '' }}"> <br/>

                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Nama Lengkap</label>
                    <input class="form-control" id="nama" name="nama" minlength="5" type="text" placeholder="Masukkan nama"
                    value="{{ isset($data_staf) ? $data_staf->nama_staf : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Foto</label>
                    <input type="hidden" name="nama_gambar" value="{{ isset($data_staf) ? $data_staf->foto : '' }}">
                    <td><img src="/data/data_staf/{{ isset($data_staf) ? $data_staf->foto : '' }}" width="200"></td>
                    <input type="file" name="foto" id="foto" class="form-control {{ $errors->has('foto') ? 'is-invalid' : ''}}" value="{{ isset($dtpenyuluh) ? $dtpenyuluh->foto : '' }}">
                        @if ( $errors->has('foto'))
                        <span class="text-danger small">
                            <p>{{ $errors->first('foto') }}</p>
                        </span>
                    @endif
                  </div>
                </div>
                      
                      <div class="form-row">
                        <div class="col-md-4 mb-2">
                          <label for="exampleInputJabatan">Jabatan</label>
                          <input type="jabatan" class="form-control" id="exampleInputJabatan" name="jabatan" minlength="5" type="text" placeholder="Masukkan jabatan (Contoh: Staf TI Dinas, dll) " 
                          value="{{ isset($data_staf) ? $data_staf->jabatan : '' }}"  
                          required>
                          <div class="invalid-feedback"> Please use a valid jabatan </div>
                        </div>
                      </div> 

                      <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                    <div class="form-row">
                      <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki" >
                      <label for="laki" class="tab-label">Laki-Laki</label> <br>
                      <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" >
                      <label for="perempuan" class="tab-label">Perempuan</label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap penyuluh" required>{{ isset($data_staf) ? $data_staf->alamat : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid alamat </div>
                  </div>
                </div>
            
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisTelpon">Telpon</label>
                    <input type="telpon" class="form-control" id="exampleInputTelpon" name="telpon" minlength="5" placeholder="Masukkan Telpon (Contoh: 62xxxxxxxxxxx)" aria-describedby="Masukkan telpon" 
                    value="{{ isset($data_staf) ? $data_staf->telpon : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid telpon </div>
                  </div>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('data_staf.index') }}"><button class="btn btn-secondary"
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