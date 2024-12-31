@extends('admin.layouts.layout')
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
            <h3>Đánh giá sản phẩm</h3>
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
                    <div class="text-tiny">Đánh giá sản phẩm</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm..." class="" name="name" tabindex="2" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                {{-- <a class="tf-button style-1 w208" href="{{route('#')}}"><i class="icon-plus"></i>Thêm mới</a> --}}
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Người dùng</th>
                                <th>Sản phẩm</th>
                                <th>Số sao</th>
                                <th>Nội dung</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rates as $rate)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $rate->user ? $rate->user->full_name : 'Sản phẩm không tồn tại' }}</td>
                                <td>{{ $rate->product ? $rate->product->product_name : 'Sản phẩm không tồn tại' }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rate->rating)
                                            <span class="fa fa-star checked"></span>
                                        @else
                                            <span class="fa fa-star"></span>
                                        @endif
                                    @endfor
                                </td>
                                <td>{{$rate->review}}</td>
                                <td>
                                    <div class="list-icon-function">
                                        {{-- <a href="{{route('tag.edit',$tag->tagID)}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a> --}}
                                        <form action="{{ route('product.rate.destroy', $rate->ratingID) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete" style="border: none; background: none; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>   
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
    <script>
        window.onload = function() {
            alert("{{ Session::get('success') }}");
        };
    </script>
@endif

@push('scripts')
<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Bạn muốn xoá?",
                text: "Bạn có chắc muốn xoá banner này?",
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