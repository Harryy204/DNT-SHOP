@extends('layouts.layout')
@section('title','Góp Ý Và Phản Hồi')
@push('styles')
@endpush
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
        <div class="mw-930">
            <h2 class="page-title">Góp Ý Và Phản Hồi</h2>
        </div>
    </section>

    <hr class="mt-2 text-secondary " />
    <div class="mb-4 pb-4"></div>

    <section class="container">
        
        <div class="row">
            <div class="col-md-6 ">
                <div class="justify-content-center d-flex">
                    <ul class="sub-menu__list list-unstyled">
                        <li class="sub-menu__item"><a href="about-2.html" class="menu-link menu-link_us-s">Số điện thoại: +84 987-654-321</a></li>
                        <li class="sub-menu__item"><a href="blog_list1.html" class="menu-link menu-link_us-s">Email: contact@dntshop.com</a></li>
                        <li class="sub-menu__item"><a href="contact-2.html" class="menu-link menu-link_us-s">Địa chỉ: 116 Nguyễn Huy Tưởng, Hoà An, Liên Chiểu, Đà Nẵng 550000, Việt Nam</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.2613286541173!2d108.16720347459972!3d16.051923239902077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142191686b4d0a7%3A0x77c8a107ad9ffd37!2zMTE2IE5ndXnhu4VuIEh1eSBUxrDhu59uZywgSG_DoCBBbiwgTGnDqm4gQ2hp4buDdSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1730815456203!5m2!1svi!2s" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <div class="mb-4 pb-4"></div>

    <section class="contact-us container">
        <div class="mw-930">
            <div class="contact-us__form">
                <form action="{{ route('contact.store') }}" name="contact-us-form" class="needs-validation" novalidate="" method="POST">
                    @csrf
                    <h3 class="mb-5">Gửi góp ý và phản hồi của bạn tại đây</h3>
                    
                    @if (Session::has('status'))
                        <p style="color: #288b3e; font-weight: bold;">{{ Session::get('status') }}</p>
                    @elseif(Session::has('error'))
                        <p style="color: #ff4a4a; font-weight: bold;">{{ Session::get('error') }}</p>
                    @endif

                    <div class="form-floating my-4">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên của bạn">
                        <label for="contact_us_name">Tên *</label>
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại của bạn">
                        <label for="contact_us_phone">Số điện thoại *</label>
                        @error('phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-floating my-4">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập địa chỉ email của bạn">
                        <label for="contact_us_email">Email *</label>
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="my-4">
                        <textarea class="form-control form-control_gray" name="comment" placeholder="Nhập nội dung" cols="30" rows="8">{{ old('comment') }}</textarea>
                        @error('comment')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="my-4">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection