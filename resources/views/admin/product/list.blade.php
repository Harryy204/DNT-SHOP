@extends('admin.layouts.layout')
@section('title','Danh sách sản phẩm')

@push('styles')
<style>
    input[type=checkbox] {
        position: relative;
        width: 40px;
        height: 20px;
        -webkit-appearance: none;
        background-color: #ccc;
        border-radius: 20px;
        cursor: pointer;
        transition: background-color 0.4s;
    }

    .name a,
    .name div {
        display: inline-block;
        max-width: 150px;
        /* Giới hạn chiều rộng của tiêu đề */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /* Thêm dấu ba chấm khi văn bản bị cắt */
    }

    input[type=checkbox]:before {
        content: "";
        position: absolute;
        width: 16px;
        height: 16px;
        top: 2px;
        left: 2px;
        background-color: white;
        border-radius: 50%;
        transition: transform 0.4s;
    }

    input[type=checkbox]:checked {
        background-color: var(--Main);
    }

    input[type=checkbox]:checked:before {
        transform: translateX(20px);
    }

    div#cke_1_contents {
        height: 432px;
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Danh sách sản phẩm</h3>
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
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm sản phẩm theo tên.." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{route('admin.product.add')}}"><i
                        class="icon-plus"></i>Thêm sản phẩm</a>
            </div>
            <div class="table-responsive">
                @if($products->isEmpty())
                <p class="text-center">Sản phẩm không tồn tại</p>
                @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Mã</th>
                            <th>Tên</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Giá giảm</th>
                            <th class="text-center">Loại</th>
                            <th class="text-center">Thương hiệu</th>
                            <th class="text-center">Nổi bật</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Biến thể</th>
                            <th class="text-center">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="text-center">{{$product->product_code}}</td>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{($product->images[0]->image_url) ? $product->images[0]->image_url: ''}}" alt="" class="image">
                                </div>
                                <div class="name">
                                    <a href="{{ route('shop.detail',['id' => $product->productID]) }}" class="body-title-2" title="{{$product->product_name}}">{{$product->product_name}}</a>
                                    <div class="text-tiny mt-3" title="{{$product->slug}}">{{$product->slug}}</div>
                                </div>
                            </td>
                            <td class="text-center">{{number_price($product->price)}}</td>
                            <td class="text-center">{{($product->discount == 0 )? 0: number_price($product->discount)}}</td>
                            <td class="text-center">{{$product->category->category_name}}</td>
                            <td class="text-center">{{$product->brand->brand_name}}</td>
                            <td class="text-center">
                                <form action="{{route('admin.product.update.featured')}}" method="post" id="featuredForm{{$product->productID}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="productID" value="{{$product->productID}}" >
                                    <input type="checkbox" name="featured" onchange="document.getElementById('featuredForm{{$product->productID}}').submit()"
                                    {{($product->featured)? 'checked':''}}>
                                </form>
                            </td>
                            <td class="text-center">{{$product->variants->sum('quantity')}}</td>
                            <td>
                                <div class="list-icon-function justify-content-center">
                                    <a href="{{route('product.variant',['productID' => $product->productID])}}" target="_blank">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="list-icon-function gap10 justify-content-center">
                                    <a href="{{route('product.image',['productID' => $product->productID])}}" target="_blank">
                                        <div class="item">
                                            <i class="icon-image"></i>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.product.edit',['productID' => $product->productID])}}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{route('admin.product.destroy',['productID' => $product->productID])}}" method="POST">
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
            {{ $products->links('pagination::bootstrap-5') }}
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