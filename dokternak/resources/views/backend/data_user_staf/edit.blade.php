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
                <b><a href="/dashboard/data_user_staf"> Data Akun Staf IT / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="admin_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($data) ? route('data_user_staf.update',$data->id) : 
                            route('data_user_staf.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($data) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}"> <br/>
                 
                  <div class="form-row">
                    <div class="col-md-8 mb-3">
                      <label for="exampleInputEmail2">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail2" name="email" minlength="5" placeholder="Masukkan email" aria-describedby="Masukkan email" 
                      value="{{ isset($data) ? $data->email : '' }}"  
                      required>
                      <div class="invalid-feedback"> Please use a valid email </div>
                    </div>
                  </div> <!-- /.form-row -->
                  <div class="form-row">
                  <div class="col-md-8 mb-3">
                    <label for="validationCustomPassword">Password Ter-enkripsi</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="pass" name="password" minlength="5" placeholder="Masukkan password" aria-describedby="inputGroupPrepend" 
                      value="{{ isset($data) ? $data->password : '' }}"  
                      required disabled>
                      <span class="btn btn-light" onclick="change()" id="mybutton"><i class="fas fa-eye"></i></span>
                      <div class="invalid-feedback"> Please choose a password. </div>
                    </div>
                  </div>
                  </div>
              
              <div class="form-row">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('data_user_staf.ubahpw',$data->id) }}"><button class="btn btn-secondary"
                  type="button">Ubah Password</button></a>
                <a href="{{ route('data_user_staf.index') }}"><button class="btn btn-secondary"
                    type="button">Cancel</button></a>
              </div><br><br>

              <div class="form-row">
                {{-- Catatan --}}
                <label for="note"><b>Catatan :</b></label><br>
                <label for="1">- Anda <b>tidak bisa melihat password versi asli</b> untuk alasan keamanan akun staf</label><br>
                <label for="2">- Jika staf melupakan passwordnya, anda dapat menekan tombol <b>ubah password</b> untuk <b>membuat password baru</b></label>
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