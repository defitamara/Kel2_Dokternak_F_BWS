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
        <h2 class="page-title">Form Data Akun Petugas</h2>
        <p class="text-muted">Tambah data akun petugas baru melalui form dibawah ini!</p>
          <div class="card shadow">
            <div class="card-header">
                <b><a href="/dbstaf">Dashboard / </a></b>
                <b><a href="/dbstaf/dt_user_petugas"> Data Akun Petugas / </a></b>
                <b>Form</b>
            </div>
            <div class="card-body">
              <form class="needs-validation" id="admin_form" method="POST" enctype="multipart/form-data"
                            action="{{ isset($datapetugas) ? route('dt_user_petugas.update',$datapetugas->id_dokter) : 
                            route('dt_user_petugas.store') }}">
                                {!! csrf_field() !!}
                                {!! isset($datapetugas) ? method_field('PUT') : '' !!}
                      <input type="hidden" name="id" value="{{ isset($datapetugas) ? $datapetugas->id_dokter : '' }}"> <br/>
                      {{-- <input type="hidden" name="id_role" value="{{ $role->id_role }}"> <br/> --}}
                    
                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label>Nama Petugas</label>
                        <select name="nama_dokter" class="form-select" id="default-select">
                            <option disabled selected> Pilih </option>
                            @foreach ($petugas as $item)
                            <option value="{{ $item->nama_dokter }}" selected>{{ $item->nama_dokter}}</option>
                            @endforeach
                        </select>
                        <small id="emailHelp1" class="form-text text-muted">Nama petugas yang muncul adalah petugas yang belum mempunyai akun</small>
                        </div> 
                    </div>

                    <div class="form-row">
                      <div class="col-md-8 mb-3">
                        <label for="exampleInputEmail2">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" minlength="5" placeholder="Masukkan email" aria-describedby="Masukkan email" 
                        value="{{ isset($datapetugas) ? $datapetugas->email : '' }}"  
                        required>
                        <div class="invalid-feedback"> Please use a valid email </div>
                        <small id="emailHelp1" class="form-text text-muted">Usahakan menggunakan email yang sama dengan di data petugas. Jika email berbeda, email petugas akan mengikuti email ini</small>
                      </div>
                    </div> <!-- /.form-row -->


                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustomPassword">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="pass" name="password" minlength="5" placeholder="Masukkan password" aria-describedby="inputGroupPrepend" 
                        value="{{ isset($datapetugas) ? $datapetugas->password : '' }}"  
                        required>
                        <span class="btn btn-light" onclick="change()" id="mybutton"><i class="fas fa-eye"></i></span>
                        <div class="invalid-feedback"> Please choose a password. </div>
                      </div>
                    </div>
                    </div>
                
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('dt_user_petugas.index') }}"><button class="btn btn-secondary"
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

<script>
  function change()
         {
            var x = document.getElementById('pass').type;

            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML = '<i class="far fa-eye-slash"></i>';
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye"></i>';
            }
         }
</script>

@endsection