@extends('admin.layouts.layout')
@section('title', 'Dashboard')
@push('styles')
<style>
    .dropdown-menu {
        min-width: 300px;
        /* Đảm bảo chiều rộng tối thiểu */
    }

    .dropdown-menu .form-control {
        min-width: 120px;
        /* Đảm bảo input không quá nhỏ */
    }

    .dropdown-menu button {
        margin-top: 10px;
        /* Thêm khoảng cách phía trên nút */
    }

    .filter {
        cursor: pointer;
        padding: 1rem !important;
        font-size: 14px;
    }

    #chartFilterRevenue li .active, 
    #chartFilterProducts li .active {
        background-color: rgba(35, 119, 252, 0.1);
        border-radius: 5px;
        font-weight: bold;
    }

    @media (max-width: 600px) {
        #chartFilterRevenue {
            max-width: 200px;
            /* Giới hạn chiều rộng */
            overflow-x: auto;
            /* Cho phép cuộn ngang */
            white-space: nowrap;
            /* Giữ các mục trên cùng một dòng */
        }
    }
</style>
@endpush
@section('main')
<div class="main-content-inner">

    <div class="main-content-wrap">
        <div class="tf-section mb-10">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half d-sm-block d-none">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng chờ xử lý</div>
                                    <h4>{{$ordersCount->pending_orders}} đơn</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đang xử lý</div>
                                    <h4>{{$ordersCount->processing_orders}} đơn</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half d-sm-block d-none">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đang giao</div>
                                    <h4>{{$ordersCount->shipping_orders}} đơn</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Đơn hàng đã giao thành công</div>
                                    <h4>{{$ordersCount->completed_orders}} đơn</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Doanh thu hôm nay</div>
                                    <h4>{{number_price($revenue->today_revenue)}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Doanh thu tháng này</div>
                                    <h4>{{number_price($revenue->month_revenue)}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Doanh thu 7 ngày qua</div>
                                    <h4>{{number_price($revenue->last_7_days_revenue)}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Doanh thu năm nay</div>
                                    <h4>{{number_price($revenue->year_revenue)}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tf-section-2 mb-30">
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Doanh thu</h5>
                    <ul class="d-flex gap5 fs-5" id="chartFilterRevenue">
                        <li>
                            <span class="filter" onclick="fetchChartDataRevenue('weekly',this)">7 Ngày</span>
                        </li>
                        <li>
                            <span class="filter" onclick="fetchChartDataRevenue('monthly',this)">30 Ngày</span>
                        </li>
                        <li>
                            <span class="filter active" onclick="fetchChartDataRevenue('yearly',this)">12 tháng</span>
                        </li>
                        <li>
                            <span class="filter active hidden" id="dateRevenue"></span>
                        </li>
                        <!-- Hiển thị icon -->
                        <li class="dropdown default">
                            <span class="icon fs-4 filter"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-calendar"></i>
                            </span>

                            <div class="dropdown-menu dropdown-menu-end p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <input class="form-control" type="date" name="start-date" id="start-dateRevenue">
                                    <strong>Đến</strong>
                                    <input class="form-control" type="date" name="end-date" id="end-dateRevenue">
                                </div>

                                <button type="button" id="submit-dates" onclick="fetchChartDataRevenue('date')" class="btn btn-primary w-100">Xác nhận</button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="line-chart-8" class="mt-2"></div>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Sản phẩm</h5>
                    <ul class="d-flex gap5 fs-5" id="chartFilterProducts">
                        <li>
                            <span class="filter" onclick="fetchChartDataProducts('weekly',this)">7 Ngày</span>
                        </li>
                        <li>
                            <span class="filter" onclick="fetchChartDataProducts('monthly',this)">30 Ngày</span>
                        </li>
                        <li>
                            <span class="filter active" onclick="fetchChartDataProducts('yearly',this)">12 Tháng</span>
                        </li>
                        <li>
                            <span class="filter active hidden" id="dateProducts"></span>
                        </li>
                        <!-- Hiển thị icon -->
                        <li class="dropdown default">
                            <span class="icon fs-4 filter"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-calendar"></i>
                            </span>

                            <div class="dropdown-menu dropdown-menu-end p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <input class="form-control" type="date" name="start-date" id="start-dateProducts">
                                    <strong>Đến</strong>
                                    <input class="form-control" type="date" name="end-date" id="end-dateProducts">
                                </div>

                                <button type="button" id="submit-dates" onclick="fetchChartDataProducts('date',this)" class="btn btn-primary w-100">Xác nhận</button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="line-chart-7" class="mt-2"></div>
            </div>
        </div>

        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Đơn hàng mới nhất</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{route('admin.order')}}">
                            <span class="view-all">Xem tất cả</span>
                        </a>
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
                                <th class="text-center" style="width: 110px;">Mã đơn hàng</th>
                                <th class="text-center">Người đặt đơn</th>
                                <!-- <th class="text-center" style="width: 110px;">Số điện thoại</th> -->
                                {{-- <th class="text-center">Địa chỉ nhận hàng</th> --}}
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
            </div>

        </div>
    </div>

</div>
@endsection
@push('scripts')
<script src="/assets/admin/js/chart.js"></script>
@endpush