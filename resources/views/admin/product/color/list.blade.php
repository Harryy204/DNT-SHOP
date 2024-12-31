@extends('admin.layouts.layout')

@section('title','Danh sách màu sắc')
@push('styles')
<style>
    .color-box {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid #000;
    }

    input[type="color"] {
        height: 50px;
        cursor: pointer;
    }

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
            <h3>Màu sản phẩm</h3>
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
                    <div class="text-tiny">Màu sắc</div>
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
                    @if($colors->isEmpty())
                    <p class="text-center">Không tìm thấy màu nào cho <strong>{{$search}}</strong></p>
                    @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 100px;">#</th>
                                <th>Tên màu</th>
                                <th>Mã màu</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $color)
                            <tr>
                                <td>{{$color->colorID}}</td>
                                <td>
                                    <p class="body-title-2">{{$color->color_name}}</p>
                                </td>
                                <td class="">
                                    <div class="d-flex gap10">
                                        <div class="color-box" style="background-color: {{$color->color_code}};"></div>
                                        <p class="">{{$color->color_code}}</p>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="list-icon-function">
                                        <a href="{{route('product.color.edit',['colorID' => $color->colorID])}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{route('product.color.destroy',['colorID' => $color->colorID])}}" method="POST">
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
                    @endif
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                    {{ $colors->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="">
                <form class="wg-box" action="{{route('product.color.store')}}" method="POST">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Tên màu sắc <span class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('color_name') border-danger @enderror mb-5" type="text" placeholder="Tên màu sắc" name="color_name"
                            tabindex="0" value="{{old('color_name')}}" aria-required="true">
                        @error("color_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Mã màu <span class="tf-color-1">*</span>
                        </div>
                        <div class="d-flex mb-10 gap10">
                            <input class="@error('color_code') border-danger @enderror" type="color" name="color_code"
                                tabindex="0" value="{{old('color_code','#000')}}" id="color_code">
                            <input class="@error('color_code') border-danger @enderror" type="text" id="color_code_text"
                                placeholder="Nhập mã màu"
                                name="color_code_text" value="{{ old('color_code','#000') }}" id="color_code_text">
                        </div>

                    </fieldset>
                    <fieldset>
                        <div></div>
                        @error("color_code") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <div class=" bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script>
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

    const colorPicker = document.getElementById('color_code');
    const colorText = document.getElementById('color_code_text');

    colorPicker.addEventListener('input', function() {
        colorText.value = colorPicker.value;
    });

    colorText.addEventListener('input', function() {
        if (/^#[0-9A-F]{6}$/i.test(colorText.value)) {
            colorPicker.value = colorText.value;
        }
    });
</script>
@endpush