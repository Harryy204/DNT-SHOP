@extends('admin.layouts.layout')
@section('title','Chỉnh sửa sản phẩm')
@section('main')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Chỉnh sửa: {{$product->product_name}}</h3>
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
                    <a href="#">
                        <div class="text-tiny">{{$product->product_code}}</div>
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
        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
            action="{{route('admin.product.update',['productID' => $product->productID])}}">
            @csrf
            @method('PUT')
            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10 @error('product_name') border-danger @enderror" type="text" placeholder="Nhập tên sản phẩm"
                        name="product_name" tabindex="0" value="{{old('product_name',$product->product_name)}}">
                    @error("product_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                </fieldset>

                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">Loại <span class="tf-color-1">*</span></div>
                        <div class="select mb-10">
                            <select class="@error('category_id') border-danger @enderror" name="category_id">
                                <option disabled selected>Chọn loại sản phẩm</option>
                                @foreach($categories as $category)
                                <option value="{{$category->categoryID}}" {{ old('category_id',$product->category_id) == $category->categoryID ? 'selected' : '' }}>
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
                                <option value="{{$brand->brandID}}" {{ old('brand_id',$product->brand_id) == $brand->brandID ? 'selected' : '' }}>
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
                        tabindex="0">{{old('description',$product->description)}}</textarea>
                </fieldset>
            </div>
            <div class="wg-box">
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Giá thường <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('price') border-danger @enderror" type="text" placeholder="Nhập giá thường"
                            name="price" tabindex="0" value="{{old('price',$product->price)}}">
                        @error("price") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Giá được giảm <span
                                class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('discount') border-danger @enderror" type="text" placeholder="Nhập giá được giảm"
                            name="discount" tabindex="0" value="{{old('discount',$product->discount)}}">
                        @error("discount") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                </div>

                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Mã sản phẩm
                        </div>
                        <input class="mb-10 disabled" type="text" disabled value="{{$product->product_code}}">
                        </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Nổi bật</div>
                        <div class="select mb-10">
                            <select class="" name="featured">
                                <option value="0" {{ old('featured',$product->featured) == 0 ? 'selected' : '' }}>Không</option>
                                <option value="1" {{ old('featured',$product->featured) == 1 ? 'selected' : '' }}>Có</option>
                            </select>
                        </div>
                        @error("featured") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
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
                    <div id="imagePreview" class="image-preview">
                        @foreach($product->images as $image)
                        <img src="{{$image->image_url}}" alt="" width="100px" style="margin: 5px;">
                        @endforeach
                    </div>
                </fieldset>

                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Lưu</button>
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
</script>
@endpush