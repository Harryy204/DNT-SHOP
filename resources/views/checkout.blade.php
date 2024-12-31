@extends('layouts.layout')
@push('styles')
<style>
  /* Tùy chỉnh logo */
  .logo-momo {
    width: 50px;
    height: auto;
    border-radius: 5px;
    /* Bo góc logo */
  }

  /* Tùy chỉnh input radio */
  .form-check-input1 {
    width: 20px;
    height: 20px;
    accent-color: #ff4081;
    cursor: pointer;
  }

  .payment {
    width: 50%;
    border: #ccc solid 1px;
  }

  /* Nhãn khi được chọn */
  .form-check-input1:checked+.form-check-label {
    font-weight: bold;
    color: #ff4081;
    /* Màu sắc nổi bật khi chọn */
  }

  label.active {
    border: #ff4081 1px solid;
  }
</style>
@endpush
@section('main')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="shop-checkout container">
    <h2 class="page-title">Vận chuyển và Thanh toán</h2>
    <div class="checkout-steps">
      <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">01</span>
        <span class="checkout-steps__item-title">
          <span>Giỏ hàng</span>
          <em>Quản lý danh sách sản phẩm của bạn</em>
        </span>
      </a>
      <a href="javascript:void(0);" class="checkout-steps__item active">
        <span class="checkout-steps__item-number">02</span>
        <span class="checkout-steps__item-title">
          <span>Vận chuyển và Thanh toán</span>
          <em>Thanh toán danh sách sản phẩm của bạn</em>
        </span>
      </a>
      <a href="javascript:void(0);" class="checkout-steps__item">
        <span class="checkout-steps__item-number">03</span>
        <span class="checkout-steps__item-title">
          <span>Xác nhận</span>
          <em>Kiểm tra đơn hàng của bạn</em>
        </span>
      </a>
    </div>
    <form name="checkout-form" action="{{ route('cart.place.an.order') }}" method="POST">
      @csrf
      <div class="checkout-form">
        <div class="billing-info__wrapper">
          <div class="row">
            <div class="col-6">
              <h4>THÔNG TIN GIAO HÀNG</h4>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->full_name) }}">
                <label for="name">Họ và Tên *</label>
                @error('name')
                <span style="color: #ff4a4a; font-weight: bold;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating my-3">
                <input type="tel" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                <label for="phone">Số Điện Thoại *</label>
                @error('phone')
                <span style="color: #ff4a4a; font-weight: bold;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-floating my-3">
                <input type="text" class="form-control" name="landmark" value="{{ old('landmark', $user->address) }}">
                <label for="landmark">Địa chỉ nhận hàng *</label>
                @error('landmark')
                <span style="color: #ff4a4a; font-weight: bold;">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <!-- Phương thức thanh toán -->
            <div class="row my-3">
              <div class="col-6">
                <h4>Phương thức thanh toán</h4>
              </div>
            </div>
            <div class="checkout__payment-methods w-100">
              <div class="d-flex gap-2">
                <label class="payment d-flex gap-1 justify-content-between align-items-center py-2 px-3 shadow-sm active" for="checkout_payment_method_1">
                  <div class="">
                    <img src="https://thanhlapcongtyonline.com/hoanghung/31/images/giao-hang-tan-noi-6.jpg" alt="MoMo Logo" class="logo-momo">
                    <span class="form-check-label">Thanh toán khi nhận hàng</span>
                  </div>
                  <input class="form-check-input1 me-2" type="radio" checked name="checkout_payment_method" value="cash" id="checkout_payment_method_1">
                </label>
                <label class="payment d-flex gap-1 justify-content-between align-items-center py-2 px-3 shadow-sm" for="checkout_payment_method_2">
                  <div class="">
                    <img src="https://test-payment.momo.vn/v2/gateway/images/logo-momo.png" alt="MoMo Logo" class="logo-momo">
                    <span class="form-check-label">MoMo</span>
                  </div>
                  <input class="form-check-input1 me-2" type="radio" name="checkout_payment_method" value="momo" id="checkout_payment_method_2">
                </label>
              </div>

              <div class="policy-text mt-4">
                Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng của bạn,
                hỗ trợ trải nghiệm của bạn trên trang web này và cho các mục đích khác được mô tả
                trong <a href="{{route('privacy-policy')}}" target="_blank">chính sách bảo mật của chúng tôi</a>.
              </div>
            </div>
          </div>
        </div>
        <div class="checkout__totals-wrapper">
          <div class="sticky-content">
            <div class="checkout__totals">
              <h3>Đơn Hàng Của Bạn</h3>
              <table class="checkout-cart-items">
                <thead>
                  <tr>
                    <th>SẢN PHẨM</th>
                    <th style="float: right">TỔNG CỘNG</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (Cart::instance('cart')->content() as $item)
                  <tr>
                    <td>{{ $item->name }} x {{ $item->qty }}</td>
                    <td style="float: right">{{ number_price(floatval(str_replace(',', '', $item->subtotal()))) }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @if (Session::has('coupon'))
              <table class="checkout-totals">
                <tbody>
                  <tr>
                    <th>Tổng tiền sản phẩm</th>
                    <td style="float: right;">{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->subtotal()))) }}</td>
                  </tr>
                  <tr>
                    <th>Mã giảm giá {{ Session::get('coupon')['code'] }}</th>
                    <td style="float: right;">{{ number_price(Session::get('coupon')['discount'] ?? 0) }}</td>
                  </tr>
                  <tr>
                    <th>Tổng tiền sau giảm giá</th>
                    <td style="float: right;">{{ number_price(Session::get('coupon')['subtotal'] ?? 0) }}</td>
                  </tr>
                  <tr>
                    <th>Vận chuyển</th>
                    <td style="float: right;">Miễn phí</td>
                  </tr>
                  <tr>
                    <th>Tổng tiền</th>
                    <td style="float: right;">{{ number_price(Session::get('coupon')['total'] ?? 0) }}</td>
                  </tr>
                </tbody>
              </table>
              @else
              <table class="checkout-totals">
                <tbody>
                  <tr>
                    <th>TỔNG CỘNG</th>
                    <td style="float: right;">{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->subtotal()))) }}</td>
                  </tr>
                  <tr>
                    <th>VẬN CHUYỂN</th>
                    <td style="float: right;">Miễn phí vận chuyển</td>
                  </tr>
                  <tr>
                    <th>TỔNG TIỀN</th>
                    {{-- <td style="float: right;">${{ number_format(floatval(Cart::instance('cart')->total())) }}</td> --}}
                    <td style="float: right;">{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->total()))) }}</td>
                  </tr>
                </tbody>
              </table>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">ĐẶT HÀNG</button>
          </div>
        </div>
      </div>
    </form>

  </section>
</main>
@endsection

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Lấy tất cả các input radio
    const radioInputs = document.querySelectorAll('input[name="checkout_payment_method"]');

    // Lặp qua từng radio và thêm sự kiện
    radioInputs.forEach(input => {
      input.addEventListener('change', function() {
        // Xóa class 'active' khỏi tất cả các label
        document.querySelectorAll('.payment').forEach(label => {
          label.classList.remove('active');
        });

        // Thêm class 'active' vào label của radio được chọn
        const selectedLabel = input.closest('.payment');
        if (selectedLabel) {
          selectedLabel.classList.add('active');
        }
      });
    });
  });
</script>
@endpush