@extends('account.layouts.app')
@section('title','Thông tin tài khoản')

@push('styles')
<style>
    /* Avatar preview styles */
    .avatar-preview {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endpush

@section('content-account')
<div class="page-content my-account__edit">
    @if(Auth::user()->email_verified_at == null)
    <div class="my-account__edit-form">
        <form action="{{ route('verification.resend') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h5 class="text-uppercase">Xác thực địa chỉ email</h5>
                                <p class="text-muted">
                                    Chúng tôi sẽ gửi liên kết xác minh đến địa chỉ email của bạn. Vui lòng kiểm tra email và nhấp vào liên kết để xác minh tài khoản.
                                </p>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Gửi lại email xác minh
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    @endif
    <div class="my-account__edit-form">
        <form action="{{ route('account.store') }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="my-3">
                        <h5 class="text-uppercase mb-0">Thông tin tài khoản</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Họ và tên" name="full_name"
                                    value="{{ old('full_name',Auth::user()->full_name) }}" required="">
                                <label for="name">Họ và tên</label>
                                @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Số điện thoại" name="phone"
                                    value=" {{ old('phone',Auth::user()->phone) }}" required="">
                                <label for="mobile">Số điện thoại</label>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Địa chỉ email" name="email"
                                    value=" {{ old('email',Auth::user()->email) }}" required="">
                                <label for="account_email">Địa chỉ email</label>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ giao hàng" name="address"
                                    value=" {{ old('address',Auth::user()->address) }}" required="">
                                <label for="account_email">Địa chỉ giao hàng</label>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="form-floating mb-3 d-flex justify-content-center">
                        <div class="avatar-preview" id="avatarPreview">
                            @if(Auth::user()->avatar)
                            <img src="{{Auth::user()->avatar}}" alt="Avatar" title="ảnh đại diện của {{Auth::user()->full_name}}">
                            @else
                            <img src="/images/avatar_default/avatar.png" alt="Ảnh đại diện" title="Ảnh đại diện mặc định">
                            @endif
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="avatar" class="form-control @error('avatar') is-invalid @enderror" type="file" id="formFileMultiple" accept="image/*" onchange="loadAvatar(event)">
                        @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Lưu thông tin </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="my-account__edit-form">
        <form name="account_edit_form" action="{{ route('account.change') }}" method="POST" class="needs-validation" novalidate="">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="mt-1">
                        <h5 class="text-uppercase mb-0">Thay đổi mật khẩu</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password"
                            name="old_password" placeholder="Mật khẩu cũ" required="">
                        <label for="old_password">Mật khẩu cũ</label>
                        @error('old_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password"
                            placeholder="Mật khẩu mới" required="">
                        <label for="account_new_password">Mật khẩu mới</label>
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            id="new_password_confirmation" name="new_password_confirmation"
                            placeholder="Nhập lại mật khẩu mới" required="">
                        <label for="new_password_confirmation">Nhập lại mật khẩu mới</label>
                        @error('new_password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 ">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadAvatar(event) {
        const avatarPreview = document.getElementById('avatarPreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                avatarPreview.innerHTML = `<img src="${e.target.result}" alt="Avatar" title="Ảnh đại diện mới">`;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush