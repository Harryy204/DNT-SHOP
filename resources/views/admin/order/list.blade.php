@extends('admin.layouts.layout')
@section('title','Danh sách đơn hàng')
@section('main')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Danh sách đơn hàng</h3>
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
                    <div class="text-tiny">Danh sách đơn hàng</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{route('admin.order')}}" method="get">
                        <fieldset class="name">
                            <input type="text" placeholder="Tìm kiếm theo mã đơn hàng" class="" name="search"
                                tabindex="2" value="{{$search}}" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="wg-filter gap10">
                    <form class="form-new-product" method="get" action="{{ route('admin.order')}}">
                        <fieldset class="select flex-grow">
                            <select name="filter" id="" class="" onchange="this.form.submit()">
                                <option disabled selected>Lọc trạng thái đơn hàng</option>
                                <option value="pending" {{ ($filter=='pending') ? 'selected' : ''}}>Đang chuẩn bị hàng</option>
                                <option value="processing" {{ ($filter=='processing') ? 'selected' : ''}}>Đã xuất kho</option>
                                <option value="shipped" {{ ($filter=='shipped') ? 'selected' : ''}}>Đơn hàng đang giao</option>
                                <option value="delivered" {{ ($filter=='delivered') ? 'selected' : ''}}>Đơn hàng đã giao thành công</option>
                                <option value="cancelled" {{ ($filter=='cancelled') ? 'selected' : ''}}>Đơn hàng đã hủy</option>
                                <option value="refunded" {{ ($filter=='refunded') ? 'selected' : ''}}>Đơn hàng đã hoàn tiền</option>
                            </select>
                        </fieldset>
                    </form>
                    @if(request()->has('filter'))
                    <a href="{{route('admin.order')}}">
                        <button type="button" class="btn-close fs-4" aria-label="Close"></button>
                    </a>
                    @endif


                </div>
            </div>

            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if($orders->isEmpty())
                    <p class="text-center">Không tìm thấy đơn hàng nào</p>
                    @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">Mã đơn hàng</th>
                                <th class="text-center">Người đặt đơn</th>
                                <th class="text-center">Tổng tiền</th>

                                <th class="text-center">Trạng thái thanh toán</th>
                                <th class="text-center" style="width: 250px;">Trạng thái đơn hàng</th>
                                <th class="text-center">Sản phẩm</th>
                                <th class="text-center">Tác vụ <p>Chi tiết/Xuất</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{$order->order_code}}</td>
                                <td class="text-center">{{$order->user->full_name ?? 'Khách hàng đã bị xóa'}}</td>
                                <td class="text-center">{{number_price($order->total_amount)}}</td>

                                <td class="text-center">
                                    @php
                                    $payment_status_vn = [
                                    'pending' => 'btn-warning',
                                    'completed' => 'btn-success',
                                    'failed' => 'btn-danger',
                                    'refunded' => 'btn-primary',
                                    'paid on delivery' => 'btn-success'
                                    ];
                                    @endphp
                                    <span class="{{$payment_status_vn[$order->payment_status]}} p-2 btn">{{payment_status_vn($order->payment_status)}}</span>
                                </td>
                                <td class="{{($order->order_status == 'cancelled')?'text-center':''}}">
                                    @if($order->order_status == 'cancelled')
                                    <span class="text-danger">{{order_status_vn($order->order_status)}}</span>
                                    @else
                                    <form class="select" action="{{route('admin.order.status',['id' => $order->orderID]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="order_status" onchange="this.form.submit()" style="border: none; text-overflow: ellipsis;" title="{{ order_status_vn($order->order_status) }}">
                                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Đã xuất kho</option>
                                            <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Đang giao hàng</option>
                                            <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Nhận hàng thành công</option>
                                            <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                            <option value="refunded" {{ $order->order_status == 'refunded' ? 'selected' : '' }}>Đã hoàn tiền</option>
                                        </select>
                                    </form>
                                    @endif
                                </td>
                                <td class="text-center">{{$order->order_detail->count()}}</td>
                                <td class="text-center">
                                    <div class="flex gap10 justify-center">
                                        <a href="{{route('admin.order.detail',['code'=> strtolower($order->order_code)])}}" title="Chi tiết đơn hàng">
                                            <div class="list-icon-function justify-content-center">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{route('invoice.download',$order->orderID)}}" title="Xuất hóa đơn">
                                            <div class="list-icon-function justify-content-center">
                                                <div class="item eye">
                                                    <i class="icon-check-square"></i>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-end flex-wrap gap10 wgp-pagination">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection