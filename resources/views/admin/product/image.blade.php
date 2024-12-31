@extends('admin.layouts.layout')
@section('title','Danh sách sản phẩm')

@push('styles')
<style>
    input[type="file"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        background-color: #f9f9f9;
        cursor: pointer;
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Sản phẩm: {{$product->product_name}}</h3>
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
                    <div class="text-tiny">Hình ảnh</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-end gap10 flex-wrap">
                <div class="flex">
                    <div id="imagePreview"></div>
                    <form action="{{route('product.image.store',['productID' => $product->productID])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap10 justify-center @error('images') border-danger @enderror mb-10">
                            <input type="file" name="images[]" id="gFile" accept="image/*" multiple>
                            <button type="submit" class="tf-button">Thêm</button>
                        </div>
                        @error('images') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                        @error('images.*') <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                @if($images->isEmpty())
                <p class="text-center">Sản phẩm không tồn tại</p>
                @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50px;" class="text-center">STT</th>
                            <th class="text-center" style="width: 350px;">Hình ảnh</th>
                            <th class="text-center">Thay đổi</th>
                            <th style="width: 150px;" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $index => $image)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">
                                <img src="{{ $image->image_url}}" alt="Hình ảnh sản phẩm" width="100" height="100" class="@if($index == 0 )border border-danger @endif">
                                @if($index == 0)
                                <p>Thumbnail</p>
                                @endif
                            </td>
                            <td>
                                <form class="text-center" action="{{route('product.image.update',['productID' => $product->productID, 'imageID' => $image->imageID])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex gap10 justify-center">
                                        <input type="file" name="image" id="gFile_{{$image->imageID}}" accept=".png, .jpg, .jpeg, .webp, .svg" max="2048" required aria-required="true">
                                        <button type="submit" class="tf-button">Lưu</button>
                                    </div>
                                    <div id="imagePreview_{{$image->imageID}}"></div>
                                </form>
                            </td>
                            <td>
                                <div class="list-icon-function gap10 justify-content-center">
                                    <form action="{{route('product.image.destroy',['productID' => $product->productID, 'imageID' => $image->imageID])}}" method="POST"
                                        @if($index==0 )hidden @endif>
                                        @csrf
                                        @method('DELETE')
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2 fs-3" \></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    document.querySelectorAll('input[type="file"][id^="gFile_"]').forEach(input => {
        input.addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById(`imagePreview_${this.id.split('_')[1]}`);
            previewContainer.innerHTML = '';

            Array.from(files).forEach(file => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '80px';
                        img.style.margin = '5px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    });

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