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
        <h2 class="page-title">Form Data Puskeswan</h2>
        <p class="text-muted">Tambah data Puskeswan baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbstaf">Dashboard / </a></b>
                <b><a href="/dbstaf/dt_dokpus"> Data Petugas Puskeswan / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="dokpus_form" method="POST" enctype="multipart/form-data"
              action="{{ isset($dtdokpus) ? route('dt_dokpus.update',$dtdokpus->id_dp) : 
              route('dt_dokpus.store') }}">
                  {!! csrf_field() !!}
                  {!! isset($dtdokpus) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id_dp" value="{{ isset($dtdokpus) ? $dtdokpus->id_dp : '' }}"> <br/>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom3">ID Puskeswan</label>
                    <input list="id_puskeswan" class="form-control {{ $errors->has('id_puskeswan') ? 'is-invalid' : ''}}" placeholder='Masukkan id puskeswan (hanya angka)' value="{{ isset($dtdokpus) ? $dtdokpus->id_puskeswan : '' }}" name="id_puskeswan" >
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
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom3">ID Petugas</label>
                      <input list="id_dokter" class="form-control {{ $errors->has('id_dokter') ? 'is-invalid' : ''}}" placeholder='Masukkan id petugas (hanya angka)' value="{{ isset($dtdokpus) ? $dtdokpus->id_dokter : '' }}" name="id_dokter" >
                      @if ( $errors->has('id_dokter'))
                          <span class="text-danger small">
                              <p>{{ $errors->first('id_dokter') }}</p>
                          </span>
                      @endif
                      <datalist id="id_dokter" name="id_dokter">
                      <div class="form-select" id="default-select">
                        <select name="s_dokter" class="form-control" id="exampleFormControlSelect1">              
                          @foreach ($dokter as $data_dokter)
                            <option value="{{ $data_dokter->id_dokter }}" >{{ $data_dokter->nama_dokter }}</option>
                          @endforeach     
                        </select><br>
                      </div>
                  </div>
                </div>
                {{-- <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom3">Nama Petugas</label>
                      <select name="id_dokter" class="form-select" id="default-select" aria-label="Default select example">
                        <option disabled selected> </option>
                      @foreach ($dokter as $item)
                      <option value="{{ isset($dtdokpus)? 'selected' : ''}}" selected>{{ $item->nama_dokter}} </option>
                      @if ($item->count())
                        <option value="{{ $item->id_dokter }}" {{ (isset($dtdokpus) == $dtdokpus->id_dokter) ? 'selected' : '' }}>{{ $dtdokpus->nama_dokter }}</option>
                      @endif
                      @endforeach
                      </select>
                  </div>
                </div> --}}
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('dt_dokpus.index') }}"><button class="btn btn-secondary"
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