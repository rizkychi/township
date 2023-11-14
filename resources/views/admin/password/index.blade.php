@extends('_template.master-admin')

@section('page_title', 'Change Password')

@section('title', 'Change Password')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Change Password</h3>
            <p class="text-sm mb-0">
              Ganti password akun Jogmatis.
            </p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.password.update') }}" method="post" autocomplete="off" class="needs-validation" novalidate>
          @csrf
          @if (isset($data))
          {{ method_field('PUT') }}
          @endif
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="old_password">Password Lama</label>
                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Password Lama" required>
                <div class="invalid-feedback">
                  Masukkan password lama.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="new_password">Password Baru</label>
                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Password Baru" required>
                <div class="invalid-feedback">
                  Masukkan password baru.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="confirm_password">Konfirmasi Password Baru</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Konfirmasi Password Baru" required>
                <div class="invalid-feedback">
                  Password tidak sesuai.
                </div>
              </div>
            </div>
          </div>
  
          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Change</button>
              <a href="{{ route('admin.home') }}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>
  
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          if ($('#confirm_password').val() != $('#new_password').val()) {
            event.preventDefault();
            event.stopPropagation();
            $('#confirm_password').addClass('is-invalid');
            $('#confirm_password').css('border-color', '#fb6340')
          } else {
            $('#confirm_password').addClass('is-valid').removeClass('is-invalid');
            $('#confirm_password').css('border-color', '#2dce89')
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>