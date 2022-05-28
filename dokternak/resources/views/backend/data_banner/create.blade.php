@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data Banner</h2>
        <p class="text-muted">Tambahkan data banner baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_banner"> Data Banner / </a></b>
                <b>Form</b>
            </div>
            
            <div class="card-body">
              <form class="needs-validation" id="banner_form" method="POST" enctype="multipart/form-data"
                        action="{{ isset($banner) ? route('data_banner.update',$banner->id_banner) : 
                        route('data_banner.store') }}">
                            {!! csrf_field() !!}
                            {!! isset($banner) ? method_field('PUT') : '' !!}
                  <input type="hidden" name="id_banner" value="{{ isset($banner) ? $banner->id_banner : '' }}"> <br/>
                  
            <input type="hidden" name="nama_gambar" value="{{ isset($banner) ? $banner->gambar : '' }}">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom3">Gambar</label>
                  <td><img src="/data/data_banner/{{ isset($banner) ? $banner->gambar : '' }}"></td>
                  <input type="file" name="gambar" id="gambar" value="{{ isset($banner) ? $banner->gambar : '' }}" class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}" >
                @if ( $errors->has('gambar'))
                <span class="text-danger small">
                    <p>{{ $errors->first('gambar') }}</p>
                </span>
            @endif
                </div>
              </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom3">Status</label>
                <input class="form-control" id="status" name="status" minlength="5" type="text" placeholder="Masukkan status"
                value="{{ isset($banner) ? $banner->status : '' }}"  
                    required>
                <div class="valid-feedback"> Looks good! </div>
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