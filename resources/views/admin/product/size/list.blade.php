@extends('admin.layouts.layout')

@section('title','Danh sách kích thước')

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
            <h3>Kích thước</h3>
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
                    <div class="text-tiny">Kích thức</div>
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
                    @if($sizes->isEmpty())
                    <p class="text-center">Không tìm thấy kích thước nào cho <strong>{{$search}}</strong></p>
                    @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên kích thước</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sizes as $size)
                            <tr>
                                <td>{{$size->sizeID}}</td>
                                <td class="">
                                    <p class="body-title-2">{{$size->size_name}}</p>
                                </td>
                                <td class="">
                                    <div class="list-icon-function">
                                        <a href="{{route('product.size.edit',['sizeID' => $size->sizeID])}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{route('product.size.destroy',['sizeID' => $size->sizeID])}}" method="POST">
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
                    {{ $sizes->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="">
                <form class="wg-box" action="{{route('product.size.store')}}" method="POST">
                    @csrf
                    <fieldset class="name">
                        <div class="body-title mb-10">Tên kích thước<span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10 @error('size_name') border-danger @enderror" type="text" placeholder="Tên kích thước" name="size_name"
                            tabindex="0" value="{{old('size_name')}}" aria-required="true">
                        @error("size_name") <span class="text-danger text-center fs-4">{{$message}}</span> @enderror
                    </fieldset>
                    <div class=" bot">
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
</script>
@endpush