@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Puskeswan</h2>
        <p class="text-muted">Tambah data Puskeswan baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_puskeswan"> Data Puskeswan / </a></b>
                <b>Form</b>
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
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputAlamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap puskeswan" required>{{ isset($puskeswan) ? $puskeswan->alamat : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid alamat </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="exampleInputJenisTelpon">No Telpon / WA Koordinator</label>
                    <input type="telpon" class="form-control" id="nomer" name="nomer" minlength="5" placeholder="Masukkan Telpon (Contoh: 62xxxxxxxxxxx)" aria-describedby="Masukkan telpon" 
                    value="{{ isset($puskeswan) ? $puskeswan->nomer : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid telpon </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputTempat">Wilayah Kerja</label>
                    <textarea type="text" class="form-control" id="wilker" name="wilker" placeholder="Tuliskan wilayah kerja puskeswan" required>{{ isset($puskeswan) ? $puskeswan->wilker : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid wilker </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-2">
                    <label for="exampleInputTempat">Jam Kerja</label>
                    <textarea type="text" class="form-control" id="jam_kerja" name="jam_kerja" placeholder="Tuliskan jam kerja puskeswan" required>{{ isset($puskeswan) ? $puskeswan->jam_kerja : '' }}</textarea>
                    <div class="invalid-feedback"> Please use a valid jam kerja </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-2">
                    <label for="validationCustom3">Gambar</label>
                    <input type="hidden" name="nama_gambar" value="{{ isset($puskeswan) ? $puskeswan->gambar : '' }}">
                    <td><img src="/data/data_puskeswan/{{ isset($puskeswan) ? $puskeswan->gambar : '' }}" width="200"></td>
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
                <a href="{{ route('data_puskeswan.index') }}"><button class="btn btn-secondary"
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