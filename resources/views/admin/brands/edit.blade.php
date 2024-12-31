@extends('admin.layouts.layout')
@section('title','Chỉnh sửa thương hiệu')
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa thương hiệu</h3>
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
                    <a href="{{route('brands.index')}}">
                        <div class="text-tiny">Thương hiệu</div>
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
            <form class="form-new-product form-style-1" action="{{route('brands.update',$brand->brandID)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <fieldset class="name">
                    <div class="body-title mb-10">Tên thương hiệu <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('brand_name') border-danger @enderror" type="text" placeholder="Nhập tên thương hiệu"
                        name="brand_name" tabindex="0" value="{{old('brand_name',$brand->brand_name)}}">
                </fieldset>
                <fieldset>
                    <div></div>
                    @error("brand_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>
                <fieldset>
                    <div class="body-title">Logo thương hiệu <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview">
                            <img src="{{$brand->logo}}" class="effect8" alt="">
                        </div>
                        <div class="item up-load @error('logo') border-danger @enderror">
                            <label class="uploadfile " for="logo">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">Thả logo thương hiệu vào đây hoặc chọn <span
                                        class="tf-color">nhấp để duyệt</span></span>
                                <input type="file" id="logo" name="logo" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div></div>
                    @error('logo') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $("#logo").on("change", function(e) {
            const photoInp = $("#avatar");
            const [file] = this.files;

            if (file) {
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });
    });
</script>
@endpush