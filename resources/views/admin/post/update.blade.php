@extends('admin.layouts.layout')
@section('title', 'Cập nhật bài viết')
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Cập Nhật Bài Viết</h3>
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
                    <a href="{{ route('post.edit', $post->postID) }}">
                        <div class="text-tiny">Bài Viết</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Cập Nhật Bài Viết</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <!-- Thay đổi phương thức từ POST thành PUT -->
            <form class="form-new-product form-style-1" action="{{ route('post.update', $post->postID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Sử dụng PUT để cập nhật -->

                <fieldset class="name">
                    <div class="body-title">Tiêu đề <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Tiêu đề" name="title" tabindex="0" value="{{ old('title', $post->title) }}">
                </fieldset>

                <fieldset class="category">
                    <div class="body-title">Thẻ <span class="tf-color-1">*</span></div>
                    <div class="row">
                        @foreach ($tags as $tag)
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input type="checkbox" name="tag_id[]" value="{{ $tag->tagID }}" aria-label="Checkbox for {{ $tag->tag_name }}"
                                    {{ in_array($tag->tagID, $post->tags->pluck('tagID')->toArray()) ? 'checked' : '' }}>
                                </div>
                                <input type="text" class="form-control" value="{{ $tag->tag_name }}" aria-label="Text input with checkbox" readonly>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Nội dung <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="content" id="content" placeholder="Nội dung" tabindex="0" aria-required="true" required="">{{ old('content', $post->content) }}</textarea>
                </fieldset>
                @error('content')
                <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <fieldset>
                    <div class="body-title">Tải hình ảnh <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="">
                            <img src="{{ $post->image }}" class="effect8" alt="">
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
                <span class="alert alert-danger text-center">{{ $message }}</span>
                @enderror

                <div class="bot">
                    <button class="tf-button w208" type="submit">Cập Nhật</button>
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
</script>
@endpush
