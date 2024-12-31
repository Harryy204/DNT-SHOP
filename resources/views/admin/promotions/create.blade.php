@extends('admin.layouts.layout')

@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <!-- Header và breadcrumbs -->
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm mới mã giảm giá</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('promotions.index') }}">
                        <div class="text-tiny">Mã giảm giá</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thêm mới</div>
                </li>
            </ul>
        </div>

        <!-- Form tạo mới mã giảm giá -->
        <div class="wg-box">
            <form class="form-new-discount form-style-1" action="{{ route('promotions.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="h6">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <fieldset class="mb-4">
                    <label for="code" class="body-title">Mã giảm giá <span class="text-red-500">*</span></label>
                    <input type="text" id="code" name="code" placeholder="Nhập mã giảm giá" class="form-input" required value="{{ old('code') }}">
                </fieldset>

                <fieldset class="mb-4">
                    <label for="discount_type" class="body-title">Loại chiết khấu <span class="text-red-500">*</span></label>
                    <select id="discount_type" name="discount_type" class="form-input" required>
                        <option value="percentage" {{ old('discount_type') === 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                        <option value="fixed" {{ old('discount_type') === 'fixed' ? 'selected' : '' }}>Số tiền cố định</option>
                    </select>
                </fieldset>

                <fieldset class="mb-4">
                    <label for="discount_value" class="body-title">Giá trị chiết khấu <span class="text-red-500">*</span></label>
                    <input type="number" id="discount_value" name="discount_value" placeholder="Nhập giá trị chiết khấu" class="form-input" required min="0" value="{{ old('discount_value') }}">
                </fieldset>

                <fieldset class="mb-4">
                    <label for="start_date" class="body-title">Ngày bắt đầu <span class="text-red-500">*</span></label>
                    <input type="date" id="start_date" name="start_date" class="form-input" required value="{{ old('start_date') }}">
                </fieldset>

                <fieldset class="mb-4">
                    <label for="end_date" class="body-title">Ngày kết thúc <span class="text-red-500">*</span></label>
                    <input type="date" id="end_date" name="end_date" class="form-input" required value="{{ old('end_date') }}">
                </fieldset>

                <fieldset class="mb-4">
                    <label for="status" class="body-title">Trạng thái <span class="text-red-500">*</span></label>
                    <select id="status" name="status" class="form-input" required>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Kích hoạt</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                    </select>
                </fieldset>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="tf-button w208">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@if (Session::has('success'))
<script>
    window.onload = function() {
        alert("{{ Session::get('success') }}");
    };
</script>
@endif