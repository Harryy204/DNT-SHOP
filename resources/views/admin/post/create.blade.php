@extends('admin.layouts.layout')
@section('title', 'Thêm bài viết')
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thêm Bài Viết</h3>
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
                    <a href="{{ route('post.create') }}">
                        <div class="text-tiny">Bài Viết</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Thêm Bài Viết</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('post.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Tiêu đề <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Tiêu đề" name="title" tabindex="0" value="">
                </fieldset>
                @error('title')
                <div class="alert alert-danger text-center" role="alert">
                    <h6 class="alert-heading d-inline">{{ $message }}</h6>
                </div>
                @enderror
                <fieldset class="category">
                    <div class="body-title">Thẻ <span class="tf-color-1">*</span></div>
                    <div class="row">
                        @foreach ($tags as $tag)
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" name="tag_id[]" value="{{ $tag->tagID }}"
                                        aria-label="Checkbox for {{ $tag->tag_name }}">
                                </div>
                                <input type="text" class="form-control" value="{{ $tag->tag_name }}"
                                    aria-label="Text input with checkbox" readonly>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </fieldset>
                @error('tag_id')
                <div class="alert alert-danger text-center" role="alert">
                    <h6 class="alert-heading d-inline">{{ $message }}</h6>
                </div>
                @enderror
                <fieldset class="description">
                    <div class="body-title mb-10">Nội dung <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="content" id="content" placeholder="Nội dung" tabindex="0"
                        aria-required="true" required=""></textarea>
                </fieldset>
                @error('content')
                <div class="alert alert-danger text-center" role="alert">
                    <h6 class="alert-heading d-inline">{{ $message }}</h6>
                </div>
                @enderror
                <fieldset>
                    <div class="body-title">Tải hình ảnh <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display: none;">
                            <img src="sample.jpg" class="effect8" alt="">
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Bấm vào đây để <span class="tf-color">tải ảnh lên</span></span>
                                <input type="file" id="myFile" name="image">
                            </label>
                        </div>
                    </div>
                </fieldset>
                @error('image')
                <div class="alert alert-danger text-center" role="alert">
                    <h6 class="alert-heading d-inline">{{ $message }}</h6>
                </div>
                @enderror
                <div class="bot">
                    <button class="tf-button w208" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $("#myFile").on("change", function(e) {
            const photoInp = $("#myFile");
            const [file] = this.files;

            if (file) {
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });
    });
    function validateCheckboxes() {
        const checkboxes = document.querySelectorAll('input[name="tag_id[]"]:checked');
        if (checkboxes.length === 0) {
            notyf.error('Vui lòng chọn ít nhất một thẻ.');
            return false; // Ngăn không cho gửi biểu mẫu
        }
        }
</script>
@endpush