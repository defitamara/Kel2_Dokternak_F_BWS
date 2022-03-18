@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Artikel</h2>
        <p class="text-muted">Artikel baru yang anda simpan akan langsung tampil pada website</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_artikel"> Data Artikel / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body"> 
              <form class="needs-validation" id="artikel_form" method="POST" enctype="multipart/form-data"
                action="{{ isset($artikel) ? route('data_artikel.update',$artikel->id_artikel) : 
                route('data_artikel.store') }}">
                {!! csrf_field() !!}
                {!! isset($artikel) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id_artikel" value="{{ isset($artikel) ? $artikel->id_artikel : '' }}"> <br/>
                <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">
                
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Judul Artikel</label>
                    <input class="form-control" id="judul" name="judul" minlength="5" type="text" placeholder="Masukkan judul artikel"
                    value="{{ isset($artikel) ? $artikel->judul : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Kategori</label>
                    <input list="id_ktg" class="form-control {{ $errors->has('id_ktg') ? 'is-invalid' : ''}}" placeholder='Pilih kategori/jenis hewan' value="{{ isset($artikel) ? $artikel->id_ktg : '' }}" name="id_ktg" >
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
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Nama Penulis</label>
                    <input class="form-control" id="nama_penulis" name="nama_penulis" minlength="5" type="text" placeholder="Masukkan nama penulis"
                    value="{{ isset($artikel) ? $artikel->nama_penulis : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <input type="hidden" name="nama_gambar" value="{{ isset($artikel) ? $artikel->gambar : '' }}">
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Gambar / Sampul</label>
                    <td><img src="/data/data_artikel/{{ isset($artikel) ? $artikel->gambar : '' }}" width="200"></td>
                    <input type="file" name="gambar" id="gambar" value="{{ isset($artikel) ? $artikel->gambar : '' }}" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}" >
                    @if ( $errors->has('gambar'))
                      <span class="text-danger small">
                        <p>{{ $errors->first('gambar') }}</p>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Tulis Isi Artikel</label>
                    {{-- <input class="form-control" id="isi" name="isi" minlength="5" type="text" placeholder="tulis isi artikel"
                    value="{!! isset($artikel) ? $artikel->isi : '' !!}"  
                        required> --}}
                    <textarea class="ckeditor" id="isi" name="isi">{!! isset($artikel) ? $artikel->isi : '' !!}</textarea>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationCustom3">Sumber</label>
                    <input class="form-control" id="sumber" name="sumber" minlength="5" type="text" placeholder="Masukkan sumber (Contoh: https://www.xxx.com, jurnal, dll)"
                    value="{{ isset($artikel) ? $artikel->sumber : '' }}"  
                        required>
                    <div class="valid-feedback"> Looks good! </div>
                  </div>
                </div>
                <div class="form-row">
                  <button class="btn btn-primary" type="submit">Save</button>
                  <a href="{{ route('data_artikel.index') }}"><button class="btn btn-secondary"
                          type="button">Cancel</button></a>
                </div>    
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