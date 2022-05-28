@extends('backend/layouts.template')
  
@section('content')
<main role="main" class="main-content">

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">Form Ubah Password Akun Petugas</h2>
        <p class="text-muted">Masukkan password baru melalui form dibawah ini. Setelah disimpan, password akan dikonversi ke bentuk crypto untuk keamanan</p>
        <p class="text-muted">Saran: Simpan password baru yang anda tulis agar mudah diingat</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dashboard">Dashboard / </a></b>
                <b><a href="/dashboard/data_user_petugas"> Data Akun Petugas / </a></b>
                <b>{{ $data->name }}</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="admin_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($data) ? route('data_user_petugas.ubahpassword',$data->id) : 
                            route('data_user_petugas.store') }}">
                                {!! csrf_field() !!}
                      <input type="hidden" name="id" value="{{ isset($data) ? $data->id : '' }}"> <br/>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustomPassword">Password Baru</label>
                    <div class="input-group">
                      <input id="pass1" type="password" placeholder="Masukkan Password Baru" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <span class="btn btn-light" onclick="change()" id="mybutton1"><i class="fas fa-eye"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustomPassword">Konfirmasi Password Baru</label>
                    <div class="input-group">
                      <input id="pass2" placeholder="Masukkan Ulang Password Baru" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      <span class="btn btn-light" onclick="change2()" id="mybutton2"><i class="fas fa-eye"></i></span>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('data_user_petugas.index') }}"><button class="btn btn-secondary"
                    type="button">Cancel</button></a>
              </form>
            </div> 
          </div> <!-- /.card -->
      </div> <!-- /.col -->
    </div> <!-- end section -->
  </div> <!-- .container-fluid -->
</div> <!-- .page wrapper -->
{{-- </main> <!-- main --> --}}

<!-- Link Js CkEditor -->
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>

<script>
  function change()
         {
            var x = document.getElementById('pass1').type;

            if (x == 'password')
            {
               document.getElementById('pass1').type = 'text';
               document.getElementById('mybutton1').innerHTML = '<i class="far fa-eye-slash"></i>';
            }
            else
            {
               document.getElementById('pass1').type = 'password';
               document.getElementById('mybutton1').innerHTML = '<i class="fas fa-eye"></i>';
            }
         }
</script>

<script>
  function change2()
         {
            var x = document.getElementById('pass2').type;

            if (x == 'password')
            {
               document.getElementById('pass2').type = 'text';
               document.getElementById('mybutton2').innerHTML = '<i class="far fa-eye-slash"></i>';
            }
            else
            {
               document.getElementById('pass2').type = 'password';
               document.getElementById('mybutton2').innerHTML = '<i class="fas fa-eye"></i>';
            }
         }
</script>

@endsection