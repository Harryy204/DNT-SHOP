@extends('layouts.layout')
@section('title','Đăng nhập')
@push('styles')
<style>
    .btn-google {
        color: black;
        border: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .google-icon {
        margin-right: 8px;
        width: 20px;
        height: 20px;
    }

    .btn-google:hover {
        background-color: #f8f9fa;
    }
</style>
@endpush
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                    role="tab" aria-controls="tab-item-login" aria-selected="true">Đăng nhập</a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
            <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                <div class="login-form">
                    <form method="POST" action="/login" name="login-form" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control form-control_gray @error('email') is-invalid @enderror" required
                                name="email" value="{{old('email')}}" autocomplete="email">
                            <label for="email">Địa chỉ email <span class="text-red">*</span></label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control form-control_gray @error('email') is-invalid @enderror" name="password" required=""
                                autocomplete="current-password">
                            <i class="bi bi-eye-slash-fill toggle-password" onclick="togglePasswordVisibility()"></i>
                            <label for="customerPasswodInput">Mật khẩu <span class="text-red">*</span></label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ghi nhớ tài khoản!</label>
                        </div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng nhập</button>

                        <div class="pt-3 justify-content-end d-flex mx-2"><a href="{{route('password.request')}}" class="btn-text js-show-register">Quên mật khẩu?</a></div>


                        <div class="customer-option text-center">
                            <span class="text-secondary">Hoặc</span>
                        </div>

                        <a class="btn btn-google w-100 text-uppercase mt-3" href="{{route('google')}}">
                            <img src="/images/logo/logo-google.png" alt="Google Logo" class="google-icon">
                            Băng nhập bằng google
                        </a>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">Bạn chưa có tài khoản?</span>
                            <a href="{{route('register')}}" class="btn-text js-show-register"> Tạo tài khoản</a>
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
        const icon = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye-slash-fill');
            icon.classList.add('bi-eye-fill');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye-fill');
            icon.classList.add('bi-eye-slash-fill');
        }
    }
</script>
@endpush