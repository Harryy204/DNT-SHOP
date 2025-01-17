@extends('admin.layouts.layout')
@section('title', 'Thêm thẻ')
@section('main')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Thông tin thẻ</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Bảng điều khiển</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Thẻ bài viết</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Thêm thẻ</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{route('tag.store')}}" method="POST">
                @csrf
                    <fieldset class="name">
                        <div class="body-title">Tên Thẻ <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Tên tags" name="name"
                            tabindex="0" value="" aria-required="true" required="">
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection