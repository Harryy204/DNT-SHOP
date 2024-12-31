@extends('layouts.layout')
@section('title','Quên mật khẩu')
@push('styles')
@endpush
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="login-register container">
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                    role="tab" aria-controls="tab-item-login" aria-selected="true">Quên mật khẩu</a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
            <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                <div class="login-form">
                    <form method="POST" action="{{route('password.email')}}" name="login-form" class="needs-validation" >
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="mb-2 form-control form-control_gray @error('email') is-invalid @enderror 
                            @if (session('status')) is-valid @endif"
                                name="email" value="{{old('email')}}" autocomplete="email">
                            <label for="email">Địa chỉ email <span class="text-red">*</span></label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @if (session('status'))
                            <span class="valid-feedback" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit">Gửi </button>

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