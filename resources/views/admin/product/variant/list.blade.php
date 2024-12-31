@extends('admin.layouts.layout')
@section('title','Danh sách biến thể sản phẩm')
@push('styles')
<style>
    .color-box {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid #000;
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h5>Biến thể: {{$product->product_name}}</h5>
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
                    <a href="#">
                        <div class="text-tiny">Sản phẩm</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Danh sách</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-end gap10 flex-wrap">
                <a class="tf-button style-1 w208" href="{{route('product.variant.add',['productID' => $productID])}}"><i
                        class="icon-plus"></i>Thêm sản phẩm</a>
            </div>
            <div class="table-responsive">
                @if($variants->isEmpty())
                <p class="text-center">Không tồn tại biến thể</p>
                @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Kích cỡ</th>
                            <th class="text-center">Màu sắc</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($variants as $variant)
                        <tr>
                            <td>{{$variant->variantID}}</td>
                            <td class="text-center">{{$variant->size->size_name ?? 'Không có'}}</td>
                            <td>
                                <div class="justify-content-center flex gap10">
                                    <div class="color-box" style="background-color: {{$variant->colors->color_code}};"></div>
                                    <p>{{$variant->colors->color_name}}</p>
                                </div>
                            </td>
                            <td class="text-center">{{$variant->quantity}}</td>
                            <td>
                                <div class="list-icon-function gap10 justify-content-center">
                                    <a href="{{route('product.variant.edit',['productID' => $productID,'variantID' => $variant->variantID])}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{route('product.variant.destroy',['productID' => $productID,'variantID' => $variant->variantID])}}" method="POST">
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
        </div>
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