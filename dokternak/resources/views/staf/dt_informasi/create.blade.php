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
        <h2 class="page-title">Form Data Informasi</h2>
        <p class="text-muted">Informasi baru yang anda tulis akan langsung tampil pada website. Disarankan maksimal ada 5 informasi</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbstaf">Dashboard / </a></b>
                <b><a href="/dbstaf/dt_informasi"> Data Informasi / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body"> 
              <form class="needs-validation" id="informasi_form" method="POST" enctype="multipart/form-data"
                action="{{ isset($informasi) ? route('dt_informasi.update',$informasi->id_info) : 
                route('dt_informasi.store') }}">
                {!! csrf_field() !!}
                {!! isset($informasi) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id_info" value="{{ isset($informasi) ? $informasi->id_info : '' }}"> <br/>
                
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Judul Artikel</label>
                    <input class="form-control" id="judul" name="judul" minlength="5" type="text" placeholder="Masukkan judul informasi (Min: 3 kata dan diakhiri tanda tanya ?)"
                    value="{{ isset($informasi) ? $informasi->judul : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Tulis Isi Informasi</label>
                    <textarea class="form-control" id="isi" name="isi" placeholder="Tulis isi maksimal 200 kata">{!! isset($informasi) ? $informasi->isi : '' !!}</textarea>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <a href="{{ route('dt_informasi.index') }}"><button class="btn btn-secondary"
                          type="button">Cancel</button></a>
                </div>    
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
      </div> <!-- /.col -->
    </div> <!-- end section -->
  </div> <!-- .container-fluid -->
</div> <!-- .page wrapper -->
{{-- </main> <!-- main --> --}}

@endsection