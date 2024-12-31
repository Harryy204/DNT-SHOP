@extends('admin.layouts.layout')

@section('title','Thêm kích thước mới')
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm màu sắc</h3>
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
                    <a href="{{route('product.size')}}">
                        <div class="text-tiny">Kích thước</div>
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
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{route('product.size.store')}}" method="POST">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Tên kích thước<span class="tf-color-1">*</span>
                    </div>
                    <input class="flex-grow @error('size_name') border-danger @enderror" type="text" placeholder="Tên kích thước" name="size_name"
                        tabindex="0" value="{{old('size_name')}}" aria-required="true">
                </fieldset>
                <fieldset>
                    <div></div>
                    @error("size_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
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