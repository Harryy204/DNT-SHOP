@extends('admin.layouts.layout')

@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa mã giảm giá</h3>
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
                    <div class="text-tiny">Chỉnh sửa</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-edit-discount form-style-1" action="{{ route('promotions.update', $promotion->promotionID) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="h6">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <fieldset class="mb-4">
                    <label for="code" class="body-title">Mã giảm giá <span class="text-red-500">*</span></label>
                    <input type="text" id="code" name="code" placeholder="Nhập mã giảm giá" class="form-input" value="{{ old('code', $promotion->code) }}" required>
                </fieldset>

                <fieldset class="mb-4">
                    <label for="discount_type" class="body-title">Loại chiết khấu <span class="text-red-500">*</span></label>
                    <select id="discount_type" name="discount_type" class="form-input" required>
                        <option value="percentage" {{ $promotion->discount_type == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                        <option value="fixed" {{ $promotion->discount_type == 'fixed' ? 'selected' : '' }}>Số tiền cố định</option>
                    </select>
                </fieldset>

                <fieldset class="mb-4">
                    <label for="discount_value" class="body-title">Giá trị chiết khấu <span class="text-red-500">*</span></label>
                    <input type="number" id="discount_value" name="discount_value" placeholder="Nhập giá trị chiết khấu" class="form-input" value="{{ old('discount_value', $promotion->discount_value) }}" required min="0">
                </fieldset>

                <fieldset class="mb-4">
                    <label for="start_date" class="body-title">Ngày bắt đầu <span class="text-red-500">*</span></label>
                    <input type="date" id="start_date" name="start_date" class="form-input" value="{{ old('start_date', $promotion->start_date) }}" required>
                </fieldset>

                <fieldset class="mb-4">
                    <label for="end_date" class="body-title">Ngày kết thúc <span class="text-red-500">*</span></label>
                    <input type="date" id="end_date" name="end_date" class="form-input" value="{{ old('end_date', $promotion->end_date) }}" required>
                </fieldset>

                <fieldset class="mb-4">
                    <label for="status" class="body-title">Trạng thái <span class="text-red-500">*</span></label>
                    <select id="status" name="status" class="form-input" required>
                        <option value="1" {{ $promotion->status ? 'selected' : '' }}>Kích hoạt</option>
                        <option value="0" {{ !$promotion->status ? 'selected' : '' }}>Không kích hoạt</option>
                    </select>
                </fieldset>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="tf-button w208">Cập nhật</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection