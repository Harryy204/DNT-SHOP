@extends('account.layouts.app')
@section('title-account','Đơn hàng đã mua')
@push('styles')
<style>
  .table> :not(caption)>tr>th {
    padding: 0.625rem 0.625rem .625rem !important;
    font-weight: bold;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    height: 55px;
  }

  .table.filter> :not(caption)>tr>th {
    background-color: #ffffff !important;
    color: #000;
    border: 0;
    cursor: pointer;
  }

  .table.filter> :not(caption)>tr {
    border: 0.2px #ccc solid;
  }

  .table.filter> :not(caption)>tr>.active {
    border-bottom: #6a6e51 4px solid;
  }

  .table.filter> :not(caption)>tr>.active a {
    color: #6a6e51;
  }

  .table.order-show> :not(caption)>tr>th {
    background-color: #6a6e51 !important;
    color: #fff;
  }



  .table tbody tr {
    transition: 0.5s;
  }

  .table>tr>td {
    padding: 0.625rem 0.625em 0.625rem !important;
  }

  .table-bordered> :not(caption)>tr>th,
  .table-bordered> :not(caption)>tr>td {
    border: 1px solid #ccc;
  }

  .table> :not(caption)>tr>td {
    padding: .8rem 1rem !important;
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
</style>
@endpush

@section('content-account')

<div class="wg-table table-all-user" style="padding-top: 2.5rem">
  <table class="table table-striped table-bordered filter">
    <tr>
      <th class="{{ ($type == 1) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 1]) }}">Tất cả</a></th>
      <th class="{{ ($type == 2) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 2]) }}">Chờ thanh toán</a></th>
      <th class="{{ ($type == 3) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 3]) }}">Vận chuyển</a></th>
      <th class="{{ ($type == 4) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 4]) }}">Hoàn thành</a></th>
      <th class="{{ ($type == 5) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 5]) }}">Đã hủy</a></th>
      <th class="{{ ($type == 6) ? 'active': ''}}"><a href="{{ route('account.order',[ 'type' => 6]) }}">Hoàn tiền</a></th>
    </tr>
  </table>
  <div class="table-responsive">
    @if($orders->isEmpty())
    <div class="page-content my-account__dashboard text-center">
      <p style="width: 100%;">Bạn chưa có mua đơn hàng nào.</p>
    </div>
    @else
    <table class="table table-striped table-bordered order-show">
      <thead>
        <tr>
          <th class="text-center" style="width: 80px">Mã ĐH</th>
          <th class="text-center">Họ tên</th>
          <th class="text-center">Số điện thoại</th>
          <th class="text-center">Tổng tiền</th>
          <th class="text-center">Sản phẩm</th>
          <th class="text-center">Trạng thái thanh toán</th>
          <th class="text-center">Trạng thái đơn</th>
          
          <th>Chi tiết</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td class="text-center">{{$order->order_code}}</td>
          <td class="text-center">{{$order->user->full_name}}</td>
          <td class="text-center">{{$order->user->phone}}</td>
          <td class="text-center">{{ number_price($order->total_amount) }}</td>
          <td class="text-center">{{$order->order_detail->count()}}</td>
          <td class="text-center">
            <span class="badge {{$payment_status_class[$order->payment_status]}}">{{payment_status_vn($order->payment_status)}}</span>
          </td>
          <td class="text-center">
            <span class="badge {{$order_status_class[$order->order_status]}}">{{order_status_vn($order->order_status)}}</span>
          </td>
          <td class="text-center">
            <a href="{{route('account.order.detail',['order_code' => strtolower($order->order_code)])}}">
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
    @endif

  </div>
</div>
<div class="divider"></div>
<div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
  {{ $orders->links('pagination::bootstrap-5') }}
</div>
@endsection