@extends('admin.layouts.layout')

@section('title','Chỉnh sửa màu sắc')
@push('styles')
<style>
    input[type="color"] {
        height: 50px;
        cursor: pointer;
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Sửa màu sắc</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{route('admin.product')}}">
                        <div class="text-tiny">Sản phẩm</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{route('product.color')}}">
                        <div class="text-tiny">Màu sắc</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Chỉnh sửa</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{route('product.color.update',['colorID' => $color->colorID])}}" method="POST">
                @csrf
                @method('PUT')
                <fieldset class="name">
                    <div class="body-title">Tên màu sắc <span class="tf-color-1">*</span>
                    </div>
                    <input class="flex-grow @error('color_name') border-danger @enderror" type="text" placeholder="Tên màu sắc" name="color_name"
                        tabindex="0" value="{{old('color_name',$color->color_name)}}" aria-required="true">
                </fieldset>
                <fieldset>
                    <div></div>
                    @error("color_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Mã màu <span class="tf-color-1">*</span>
                    </div>
                    <input class="flex-grow @error('color_code') border-danger @enderror" type="color" name="color_code"
                        tabindex="0" value="{{old('color_code',$color->color_code)}}" id="color_code">
                    <input class="flex-grow @error('color_code') border-danger @enderror" type="text" id="color_code_text"
                        placeholder="Nhập mã màu"
                        name="color_code_text" value="{{ old('color_code',$color->color_code) }}" id="color_code_text">
                </fieldset>
                <fieldset>
                    <div></div>
                    @error("color_code") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>
                <div class=" bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const colorPicker = document.getElementById('color_code');
    const colorText = document.getElementById('color_code_text');

    colorPicker.addEventListener('input', function() {
        colorText.value = colorPicker.value;
    });

    colorText.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(colorText.value)) {
            colorPicker.value = colorText.value;
        }
    });
</script>
@endpush