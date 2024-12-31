@extends('layouts.layout')
@section('main')
<style>
    .pc__img {
        position: relative;
    }
</style>

<main class="pt-90">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Giỏ hàng</h2>
        <div class="checkout-steps">
            <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Giỏ hàng</span>
                    <em>Quản lý danh sách sản phẩm của bạn</em>
                </span>
            </a>
            <a href="javascript:void(0);" class="checkout-steps__item @if(Route::currentRouteName() === 'cart.checkout') 'active' @endif">
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
                    <em>Kiểm tra đơn hàng hàng của bạn</em>
                </span>
            </a>
        </div>
        <div class="shopping-cart">
            @if ($items->count() > 0)
            <div class="cart-table__wrapper">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th></th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="shopping-cart__product-item">
                                    @if ($item->options && isset($item->options['image_url']))
                                    <img loading="lazy" src="{{ asset( $item->options['image_url']) }}" width="120" height="120" alt="{{ $item->name }}" class="pc__img">
                                    @else
                                    <img loading="lazy" src="{{ asset('images/logo/logo.png') }}" width="120" height="120" alt="Default Image" />
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="shopping-cart__product-item__detail">
                                    <h4>{{ $item->name }}</h4>
                                    {{-- {{ dd($item) }} --}}

                                    <ul class="shopping-cart__product-item__options">
                                        <li>Màu sắc: {{ $item->options['color_name'] ?? 'N/A' }}</li>
                                        <li>Kích thước: {{ $item->options['size_name'] ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <span class="shopping-cart__product-price">{{ number_price($item->price) }}</span>
                            </td>
                            <td>
                                <div class="qty-control position-relative">
                                    <form method="post"
                                        action="{{ route('cart.qty.decrease', ['rowId' => $item->rowId]) }}"
                                        class="qty-control__form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="quantity" value="{{ $item->qty - 1 }}">
                                        <div class="qty-control__reduce">-</div>
                                    </form>
                                    <input type="number" name="quantity" value="{{ $item->qty }}"
                                        min="1" class="qty-control__number text-center">
                                    <form method="post"
                                        action="{{ route('cart.qty.increase', ['rowId' => $item->rowId]) }}"
                                        class="qty-control__form">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="quantity" value="{{ $item->qty + 1 }}">
                                        <div class="qty-control__increase">+</div>
                                    </form>
                                </div>


                            </td>
                            <td>
                                <span class="shopping-cart__subtotal">{{ number_price(floatval(str_replace(',', '', $item->subtotal()))) }}</span>
                            </td>
                            <td>
                                <form method="POST"
                                    action="{{ route('cart.item.remove', ['rowId' => $item->rowId]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a href="javascript:void(0)" class="remove-cart">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                            <path
                                                d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                        </svg>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="cart-table-footer">
                    @if (!Session::has('coupon'))
                    <form action="{{ route('cart.coupon.apply') }}" method="POST"
                        class="position-relative bg-body">
                        @csrf
                        <input class="form-control" type="text" name="coupon_code" placeholder="Mã giảm giá"
                            value="">
                        <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4"
                            type="submit" value="Áp mã ">
                    </form>
                    @else
                    <form action="{{ route('cart.coupon.remove') }}" method="POST"
                        class="position-relative bg-body">
                        @csrf
                        @method('DELETE')
                        <input class="form-control" type="text" name="coupon_code" placeholder="Mã giảm giá"
                            value="@if (Session::has('coupon')) {{ Session::get('coupon')['code'] }} @endif">
                        <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4"
                            type="submit" value="Xoá mã đã áp" value="Áp mã ">
                    </form>
                    @endif
                    <a class="btn btn-success" target="_blank" href="{{ route('promotions.index_promotions') }}">Lấy mã giảm giá</a>
                    <form action="{{ route('cart.empty') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-light">Xoá toàn bộ giỏ hàng</button>
                    </form>
                </div>
                <div>
                    @if (Session::has('status'))
                    <p style="color: #288b3e; font-weight: bold;">{{ Session::get('status') }}</p>
                    @elseif(Session::has('error'))
                    <p style="color: #ff4a4a; font-weight: bold;">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <div class="shopping-cart__totals-wrapper">
                <div class="sticky-content">
                    <div class="shopping-cart__totals">
                        <h3>Tổng tiền giỏ hàng</h3>
                        @if (Session::has('coupon'))
                        <table class="cart-totals">
                            <tbody>
                                <tr>
                                    <th>Tổng tiền sản phẩm</th>
                                    <td>{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->subtotal()))) }}</td>

                                </tr>
                                <tr>
                                    <th>Mã giảm giá {{ Session::get('coupon')['code'] }}</th>
                                    <td>{{ number_price(floatval(Session::get('coupon')['discount'] ?? 0)) }}</td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền sau giảm giá</th>
                                    <td>{{ number_price(floatval(Session::get('coupon')['subtotal'] ?? 0)) }}</td>
                                </tr>
                                <tr>
                                    <th>Vận chuyển</th>
                                    <td>Miễn phí</td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td>{{ number_price(floatval(Session::get('coupon')['total'] ?? 0)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <table class="cart-totals">
                            <tbody>
                                <tr>
                                    <th>Tổng tiền sản phẩm</th>
                                    <td>{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->subtotal()))) }}</td>
                                </tr>
                                <tr>
                                    <th>Vận chuyển</th>
                                    <td>Miễn phí</td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td>{{ number_price(floatval(str_replace(',', '', Cart::instance('cart')->total()))) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif

                    </div>
                    <div class="mobile_fixed-btn_wrapper">
                        <div class="button-wrapper container">
                            <a href="{{ route('cart.checkout') }}" class="btn btn-primary btn-checkout">Tiến hành
                                thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-12 text-center pt-5 bp-5">
                    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-info">Mua sắm ngay</a>
                </div>
            </div>
            @endif
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    $(function() {
        $(".qty-control__increase").on("click", function() {
            $(this).closest('form').submit();
        });

        $(".qty-control__reduce").on("click", function() {
            $(this).closest('form').submit();
        });

        $(".remove-cart").on("click", function() {
            $(this).closest('form').submit();
        });

    });
</script>
@endpush