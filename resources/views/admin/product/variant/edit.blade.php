@extends('admin.layouts.layout')
@section('title','chỉnh sửa biến thể')
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa biến thể sản phẩm</h3>
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
                    <div class="text-tiny">Biến thể</div>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Chỉnh sửa</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->

        <div class="wg-box">
            <form class="form-add-product" method="POST" action="{{route('product.variant.update',['productID' => $productID,'variantID' => $variant->variantID])}}">
                @csrf
                @method('PUT')
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Kích cỡ <span class="tf-color-1">*</span></div>
                        <div class="select mb-10">
                            <select class="" name="size_id">
                                <option value="" selected>-- Chọn kích cỡ -- </option>
                                @foreach($sizes as $size)
                                <option value="{{$size->sizeID}}" {{ old('size_id',$variant->size->sizeID ?? '') == $size->sizeID ? 'selected' : '' }}>
                                    ID: {{$size->sizeID}} - {{$size->size_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("size_id") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Màu sắc <span class="tf-color-1">*</span></div>
                        <div class="select mb-10">
                            <select class="" name="color_id">
                                <option disabled selected>-- Chọn màu sắc -- </option>
                                @foreach($colors as $color)
                                <option value="{{$color->colorID}}" {{ old('color_id',$variant->colors->colorID) == $color->colorID ? 'selected' : '' }}>
                                    {{$color->color_name}} - {{$color->color_code}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("color_id") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" 
                            name="quantity" tabindex="0" value="{{old('quantity',$variant->quantity)}}">
                            @error("quantity") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    
                </div>
                <div class="gap10 mt-5">
                    <button class="tf-button w-25" type="submit">Lưu</button>
                </div>

            </form>
        </div>

        <!-- /form-add-product -->
    </div>
    <!-- /main-content-wrap -->
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('gFile').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';

        Array.from(files).forEach(file => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush