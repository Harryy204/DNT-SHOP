@extends('layouts.layout')
@push('styles')
<style>
  .form-floating {
    position: relative;
  }

  .form-floating i {
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #999;
  }

  .form-floating i:hover {
    color: #333;
  }
</style>
@endpush
@section('main')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="login-register container">
    <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore active" id="register-tab" data-bs-toggle="tab"
          href="#tab-item-register" role="tab" aria-controls="tab-item-register" aria-selected="true">Đăng ký thành viên</a>
      </li>
    </ul>
    <div class="tab-content pt-2" id="login_register_tab_content">
      <div class="tab-pane fade show active" id="tab-item-register" role="tabpanel" aria-labelledby="register-tab">
        <div class="register-form">
          <form method="POST" action="/register" name="register-form" class="needs-validation" novalidate="">
            @csrf
            <div class="form-floating mb-3">
              <input class="form-control form-control_gray @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required="" autocomplete="full_name"
                autofocus="">
              <label for="name">Họ và tên</label>
              @error('full_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="pb-3"></div>
            <div class="form-floating mb-3">
              <input id="email" type="email" class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required=""
                autocomplete="email">
              <label for="email">Địa chỉ email *</label>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
              <input id="password" type="password" class="form-control form-control_gray @error('password') is-invalid @enderror" name="password" required="" autocomplete="new-password">
              <i class="bi bi-eye-slash-fill toggle-password" onclick="togglePasswordVisibility()"></i>
              <label for="password">Mật khẩu <span></span>*</label>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
              <input id="password-confirm" type="password" class="form-control form-control_gray"
                name="password_confirmation" required="" autocomplete="new-password">
              <label for="password">Nhập lại mật khẩu *</label>
            </div>

            <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng kí</button>

            <div class="d-flex align-items-center mt-3 pb-2">
              <p class="m-0">Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn trên trang web này, quản lý quyền truy cập vào tài khoản của bạn, và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.</p>
            </div>

            <div class="customer-option mt-4 text-center">
              <span class="text-secondary">Bạn đã có tài khoản?</span>
              <a href="{{route('login')}}" class="btn-text js-show-register">Đăng nhập vào tài khoản của bạn</a>
            </div>
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