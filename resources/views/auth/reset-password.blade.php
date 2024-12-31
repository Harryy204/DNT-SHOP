@extends('layouts.layout')
@section('title','Đặt lại mật khẩu')
@section('main')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="login-register container">
    <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore active" id="reset-password-tab" data-bs-toggle="tab"
          href="#tab-item-reset-password" role="tab" aria-controls="tab-item-reset-password" aria-selected="true">Đặt lại mật khẩu</a>
      </li>
    </ul>
    <div class="tab-content pt-2" id="login_register_tab_content">
      <div class="tab-pane fade show active" id="tab-item-reset-password" role="tabpanel" aria-labelledby="reset-password-tab">
        <div class="register-form">
          <form method="POST" action="{{ route('password.store') }}" name="register-form" class="needs-validation">
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">
            <input type="hidden" name="email" value="{{ $request->email }}">

            <div class="form-floating mb-3">
              <input id="email" type="text" class="form-control form-control_gray" value="{{ $request->email }}" disabled>
              <label for="email">Địa chỉ email <span class="text-red">*</span></label>
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
              <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror"" name="password" required="" autocomplete="new-password">
              <i class="bi bi-eye-slash-fill toggle-password" onclick="togglePasswordVisibility()"></i>
              <label for="password">Mật khẩu <span class="text-red">*</span></label>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
              <input id="password-confirm" type="password" class="form-control form-control_gray" name="password_confirmation" required="" autocomplete="new-password">
              <label for="password-confirm">Nhập lại mật khẩu <span class="text-red">*</span></label>
            </div>

            <button class="btn btn-primary w-100 text-uppercase" type="submit">Đặt lại mật khẩu</button>
          </form>

        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('scripts')
<script>
  function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');
    const icon = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      passwordConfirm.type = 'text';
      icon.classList.remove('bi-eye-slash-fill');
      icon.classList.add('bi-eye-fill');
    } else {
      passwordInput.type = 'password';
      passwordConfirm.type = 'password';
      icon.classList.remove('bi-eye-fill');
      icon.classList.add('bi-eye-slash-fill');
    }
  }
</script>
@endpush