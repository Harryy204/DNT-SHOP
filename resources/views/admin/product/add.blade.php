@extends('admin.layouts.layout')
@section('title','Thêm sản phẩm mới')
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm mới sản phẩm</h3>
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
                    <div class="text-tiny">Thêm sản phẩm</div>
                </li>
            </ul>
        </div>
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
            action="{{route('admin.product.store')}}">
            @csrf
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10 @error('product_name') border-danger @enderror" type="text" placeholder="Nhập tên sản phẩm"
                        name="product_name" tabindex="0" value="{{old('product_name')}}">
                    @error("product_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>

                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Loại <span class="tf-color-1">*</span></div>
                        <div class="select mb-10">
                            <select class="@error('category_id') border-danger @enderror" name="category_id">
                                <option disabled selected>Chọn loại sản phẩm</option>
                                @foreach($categories as $category)
                                <option value="{{$category->categoryID}}" {{ old('category_id') == $category->categoryID ? 'selected' : '' }}>
                                    ID: {{ $category->categoryID }} - {{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("category_id") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="brand">
                        <div class="body-title mb-10">Thương hiệu <span class="tf-color-1">*</span>
                        </div>
                        <div class="select mb-10">
                            <select class="@error('brand_id') border-danger @enderror" name="brand_id">
                                <option disabled selected>chọn thương hiệu</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->brandID}}" {{ old('brand_id') == $brand->brandID ? 'selected' : '' }}>
                                    ID: {{ $brand->brandID }} - {{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("brand_id") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                </div>

                <fieldset class="description">
                    <div class="body-title mb-10">Mô tả chi tiết
                    </div>
                    <textarea class="mb-10" name="description" id="content" placeholder="Description"
                        tabindex="0">{{old('description')}}</textarea>
                </fieldset>
            </div>
            <div class="wg-box">
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Giá thường <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('price') border-danger @enderror" type="number" placeholder="Nhập giá thường"
                            name="price" tabindex="0" value="{{old('price')}}">
                        @error("price") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Giá được giảm <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('discount') border-danger @enderror" type="number" placeholder="Nhập giá được giảm"
                            name="discount" tabindex="0" value="{{old('discount',0)}}">
                        @error("discount") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                </div>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Mã sản phẩm
                        </div>
                        <input class="mb-10 disabled" type="text" placeholder="Tạo tự động"
                            tabindex="0" value="" disabled>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Nổi bật</div>
                        <div class="select mb-10">
                            <select class="" name="featured">
                                <option value="0" {{ old('featured') == 0 ? 'selected' : '' }}>Không</option>
                                <option value="1" {{ old('featured') == 1 ? 'selected' : '' }}>Có</option>
                            </select>
                        </div>
                        @error("featured") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                </div>

                <div id="variantContainer"></div>
                <div class="justify-end flex" style="cursor: pointer;">
                    <a href="#" class="" id="addVariant" style="font-size: 1.2rem;"> <i class="icon-plus"></i>Thêm biến thể</a>
                </div>



                <fieldset>
                    <div class="body-title mb-10">Tải lên hình ảnh <span class="tf-color-1">*</span></div>
                    <div class="upload-image mb-16 ">
                        <div id="galUpload" class="item up-load @error('images') border-danger @enderror">
                            <label class="uploadfile " for="gFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">Thả hình ảnh của bạn vào đây hoặc chọn <span
                                        class="tf-color">nhấp để duyệt</span></span>
                                <input type="file" id="gFile" name="images[]" accept="image/*"
                                    multiple="">
                                <em lass="text-tiny">Hình ảnh đầu tiên sẽ là thumbnail</em>
                            </label>
                        </div>
                    </div>
                    @error('images') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    @error('images.*') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    <div id="imagePreview" class="image-preview"></div>
                </fieldset>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
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

    document.getElementById('addVariant').addEventListener('click', function() {
        const variantContainer = document.getElementById('variantContainer');

        const variantDiv = document.createElement('div');
        variantDiv.classList.add('cols', 'gap22', 'mb-24');

        variantDiv.innerHTML = `
        <fieldset class="name">
                        <div class="body-title mb-10">Kích cỡ <span class="tf-color-1">*</span>
                        </div>
                        <div class="select mb-10">
                            <select class="" name="variants[size_id][]">
                                <option value="" selected> -- Chọn kích cỡ -- </option>
                                @foreach($sizes as $size)
                                <option value="{{$size->sizeID}}">{{$size->size_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Màu sắc
                        </div>
                        <select class="" name="variants[color_id][]" required>
                            <option value="" disabled selected> -- Chọn màu sắc -- </option>
                            @foreach($colors as $color)
                            <option value="{{$color->colorID}}">{{$color->color_name}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" min="1" value="1" name="variants[quantity][]" required aria-required="true">
                    </fieldset>
    `;

        variantContainer.appendChild(variantDiv);
        variantContainer.style.display = 'block';
    });
</script>
@endpush