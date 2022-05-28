@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Data User Petugas</h2>
        <p class="text-muted">Tambahkan data user petugas baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_user_petugas"> Data Akun User Petugas / </a></b>
                <b>Form</b>
            </div>
            
            <div class="card-body">
              <form class="needs-validation" id="admin_form" method="POST" enctype="multipart/form-data"
                            action="{{ route('data_user_petugas.store') }}">
                                {!! csrf_field() !!}
                                
                      <input type="hidden" name="id" value="{{ '' }}"> <br/>

                <div class="form-row">
                  <div class="col-md-8 mb-3">
                    <label>Nama Petugas </label>
                    <select name="nama" class="form-select" id="default-select">
                        <option disabled selected> Pilih </option>
                        @foreach ($data_petugas as $item)
                        <option value="{{ $item->nama }}" selected>{{ $item->nama}}</option>
                        @endforeach
                    </select>
                    <small id="emailHelp1" class="form-text text-muted">Nama petugas yang muncul adalah petugas yang belum mempunyai akun</small>
                    </div> 
                </div>

                <div class="form-row">
                  <div class="col-md-8 mb-3">
                    <label for="exampleInputEmail2">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" name="email" minlength="5" placeholder="Masukkan email" aria-describedby="Masukkan email" 
                    value="{{ isset($dpetugas) ? $dpetugas->email : '' }}"  
                    required>
                    <div class="invalid-feedback"> Please use a valid email </div>
                  </div>
                </div> <!-- /.form-row -->


                <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationCustomPassword">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="pass" name="password" minlength="5" placeholder="Masukkan password" aria-describedby="inputGroupPrepend" 
                    value="{{ isset($dpetugas) ? $dpetugas->password : '' }}"  
                    required>
                    <span class="btn btn-light" onclick="change()" id="mybutton"><i class="fas fa-eye"></i></span>
                    <div class="invalid-feedback"> Please choose a password. </div>
                  </div>
                </div>
                </div>
            
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ route('data_user_petugas.index') }}"><button class="btn btn-secondary"
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