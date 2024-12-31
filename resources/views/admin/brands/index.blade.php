@extends('admin.layouts.layout')
@section('title','Danh sách thương hiệu')
@push('styles')
<style>
    .wg-table.table-all-user.wg-auto>* {
        min-width: 115px;
    }

    @media (max-width: 1440px) {
        .wg-table.table-all-user.wg-auto>* {
            min-width: auto;
        }
    }

    @media (max-width: 767px) {
        .wg-table.table-all-user.wg-auto>* {
            min-width: 750px;
        }
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Danh sách thương hiệu</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="index.html">
                        <div class="text-tiny">Bảng điều khiển</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thương hiệu</div>
                </li>
            </ul>
        </div>
        <section class="tf-section-7">
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="search" placeholder="Tìm kiếm theo tên thương hiệu" class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="wg-table table-all-user wg-auto">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px;" class="text-center">#</th>
                                <th class="text-center">Tên thương hiệu</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center">Cập nhật</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $index => $brand)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <div class="pname">
                                        <div class="image">
                                            <img src="{{$brand->logo}}" alt="{{$brand->brand_name}}" class="image">
                                        </div>
                                        <div class="name">
                                            <a href="#" class="body-title-2">{{$brand->brand_name}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$brand->created_at}}</td>
                                <td>{{$brand->updated_at}}</td>
                                <td>
                                    <div class="list-icon-function justify-content-center">
                                        <a href="{{route('brands.edit',$brand->brandID)}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{route('brands.destroy',$brand->brandID)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                {{ $brands->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="">
                <form method="POST" enctype="multipart/form-data" action="{{route('brands.store')}}" class="wg-box">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Tên thương hiệu <span class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('brand_name') border-danger @enderror" type="text" placeholder="Nhập tên thương hiệu"
                            name="brand_name" tabindex="0" value="{{old('brand_name')}}">
                        @error("brand_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Logo thương hiệu <span class="tf-color-1">*</span></div>
                        <div class="upload-image mb-16 ">
                            <div id="galUpload" class="item up-load @error('logo') border-danger @enderror">
                                <label class="uploadfile " for="gFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="text-tiny">Thả logo thương hiệu vào đây hoặc chọn <span
                                            class="tf-color">nhấp để duyệt</span></span>
                                    <input type="file" id="gFile" name="logo" accept="image/*">
                                </label>
                            </div>
                        </div>
                        @error('logo') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                        <div id="imagePreview" class="image-preview"></div>
                    </fieldset>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
        </section>

    </div>
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
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Bạn muốn xoá?",
                text: "Bạn có chắc muốn xoá màu này chứ?",
                type: "warning",
                buttons: ["Không", "Có"],
                confirmButtonColor: '#dc3545',
            }).then(function(result) {
                if (result) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush