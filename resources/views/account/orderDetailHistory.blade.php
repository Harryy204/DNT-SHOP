@extends('account.layouts.app')
@section('title-account','Đơn hàng đã mua')
@push('styles')
<style>
    .pt-90 {
        padding-top: 90px !important;
    }

    .pr-6px {
        padding-right: 6px;
        text-transform: uppercase;
    }

    .my-account .page-title {
        font-size: 1.5rem;
        font-weight: 700;
        text-transform: uppercase;
        border-bottom: 1px solid;
        padding-bottom: 13px;
    }

    .my-account .wg-box {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        padding: 24px;
        flex-direction: column;
        gap: 24px;
        border-radius: 12px;
        background: var(--White);
        box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .status-pending {
        background-color: #F0AD4E !important;
        /* Cam nhạt */
        color: white;
    }

    .status-processing {
        background-color: #5BC0DE !important;
        /* Xanh dương nhạt */
        color: white;
    }

    .status-shipped {
        background-color: #337AB7 !important;
        /* Xanh đậm */
        color: white;
    }

    .status-delivered {
        background-color: #5CB85C !important;
        /* Xanh lá cây */
        color: white;
    }

    .status-cancelled {
        background-color: #D9534F !important;
        /* Đỏ */
        color: white;
    }

    .status-refunded {
        background-color: #777777 !important;
        /* Xám */
        color: white;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: #fff !important;

    }

    .table-transaction th,
    .table-transaction td {
        padding: 0.625rem 1.5rem .25rem !important;
        color: #000 !important;
    }

    .table> :not(caption)>tr>th {
        padding: 0.625rem 1.5rem .25rem !important;
        background-color: #6a6e51 !important;
    }

    .table-bordered>:not(caption)>*>* {
        border-width: inherit;
        line-height: 32px;
        font-size: 14px;
        border: 1px solid #e1e1e1;
        vertical-align: middle;
    }

    .table-striped .image {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        flex-shrink: 0;
        border-radius: 10px;
        overflow: hidden;
    }

    .product-name {
        display: flex;
        gap: 13px;

    }

    .body-title-2 {
        width: 100px;

    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
        border-width: 1px 1px;
        /* border-color: #6a6e51; */
    }
</style>
@endpush
@section('content-account')
<div class="wg-box mt-5 mb-5 border">
    <div class="row">
        <div class="col-6">
            <h5>Thông tin đơn hàng</h5>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-sm btn-danger" onclick="history.back()">Quay lại</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-transaction">
            <tbody>
                <tr>
                    <th>Mã đơn hàng</th>
                    <td>{{$order->order_code}}</td>
                    <th>Số điện thoại</th>
                    <td>{{$order->user->phone}}</td>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th>Ngày đặt</th>
                    <td>{{$order->created_at->format('d/m/Y H:i')}}</td>
                    <th>Ngày nhận</th>
                    <td>{{($order->order_status == 'delivered')? $order->updated_at->format('d/m/Y'):''}}</td>
                    <th>Ngày hủy bỏ</th>
                    <td>{{($order->order_status == 'cancelled')? $order->updated_at->format('d/m/Y'):''}}</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td colspan="5">
                        <span class="badge {{$order_status_class[$order->order_status]}}">{{order_status_vn($order->order_status)}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="wg-box wg-table table-all-user border">
    <div class="row">
        <div class="col-6">
            <h5>Sản phẩm</h5>
        </div>
        <div class="col-6 text-right">

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th class="text-center">Mã</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Loại</th>
                    <!-- <th class="text-center">Thương hiệu</th> -->
                    <th class="text-center">Màu</th>
                    <th class="text-center">Kích thước</th>
                    <th class="text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>
                        <div class="product-name">
                            <div class="image">
                                <img src="{{$orderDetail->product_variant->products->images[0]->image_url}}" alt=""
                                    class="image">
                            </div>
                            <div class="name">
                                <a href="#" target="_blank" class="body-title-2">
                                    {{$orderDetail->product_variant->products->product_name}}
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">{{$orderDetail->product_variant->products->product_code}}</td>
                    <td class="text-center">{{number_price($orderDetail->price)}}</td>
                    <td class="text-center">{{$orderDetail->quantity}}</td>
                    <td class="text-center">{{$orderDetail->product_variant->products->category->category_name}}</td>
                    <!-- <td class="text-center">Brand1</td> -->
                    <td class="text-center">{{$orderDetail->product_variant->colors->color_name}}</td>
                    <td class="text-center">{{$orderDetail->product_variant->size->size_name ?? 'Không có'}}</td>
                    <td class="text-center">
                        <a href="#" target="_blank">
                            <div class="list-icon-function view-icon">
                                <div class="item eye">
                                    <i class="fa fa-eye"></i>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="divider"></div>
<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
</div>

<div class="wg-box mt-5 border">
    <h5>Thông tin nhận hàng</h5>
    <div class="my-account__address-item col-md-6">
        <div class="my-account__address-item__detail">
            <p> <strong>Họ tên người nhận:</strong> {{$order->user->full_name}}</p>
            <br>
            <p> <strong>Địa chỉ nhận hàng:</strong> {{$order->user->address}}</p>
            <br>
            <p> <strong>Số điện thoại:</strong> {{$order->user->phone}}</p>
        </div>
    </div>
</div>

<div class="wg-box mt-5 border">
    <h5>Thanh toán</h5>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-transaction">
            <tbody>
                <tr>
                    <th>Tổng đơn</th>
                    @php
                    $total = $order->order_detail->map(function ($detail) {return $detail->price * $detail->quantity;})->sum()
                    @endphp
                    <td>{{number_price($total)}}</td>
                    <th>Phí ship</th>
                    <td>{{number_price($order->shipping_fee)}}</td>
                    <th>Giảm giá</th>
                    <td>{{(isset($order->promotion_id)) ? number_price(getPromoDiscount($order->promotion->discount_type,$order->promotion->discount_value,$total)): 0}}</td>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <td>{{number_price($order->total_amount)}}</td>
                    <th>Phương thức thanh toán</th>
                    <td>{{payment_method_vn($order->payment_method)}}</td>
                    <th>Trạng thái</th>
                    <td>
                        <span class="badge {{$payment_status_class[$order->payment_status]}}">{{payment_status_vn($order->payment_status)}}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="wg-box mt-5 border ">
    <div class="d-flex justify-content-end gap-2">
        
        @if( $order->payment_method == 'momo' && ($order->payment_status == 'pending' || $order->payment_status == 'failed') )
        <form action="{{ route('payment.momo') }}" method="get">
            @csrf
            <input type="hidden" value="update" name="payment_status">
            <button type="submit" class="btn btn-success">Thanh toán</button>
        </form>
        @endif
        <form action="{{route('account.order.cancel')}}" method="post">
            @csrf
            @method("PUT")
            <input type="hidden" name="orderID" value="{{$order->orderID}}">
            <button type="submit" class="btn btn-danger delete" {{($order->order_status == 'pending')? '': 'disabled'}}>Hủy đơn hàng</button>
        </form>
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
                title: "Bạn xác nhận hủy đơn hàng?",
                text: "Bạn có chắc chắn rằng bạn sẽ hủy đơn hàng này chứ?",
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