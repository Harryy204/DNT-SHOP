@extends('layouts.layout')
@section('main')
<style>
    .filled-heart {
        color: red
    }

    .pc__img {
        position: relative;
    }
</style>
<main class="pt-90">
    <!-- <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Danh mục yêu thích</h2>
            <div class="shopping-cart">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                    <div class="cart-table__wrapper">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Hành động</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <div class="shopping-cart__product-item">
                                                @if ($item->options && isset($item->options['image_url']))
                                                    <img loading="lazy" src="{{ asset($item->options['image_url']) }}"
                                                        width="120" height="120" alt="{{ $item->name }}"
                                                        class="pc__img">
                                                @else
                                                    {{-- <img loading="lazy" src="{{ asset('images/logo/logo.png') }}" width="120" height="120" alt="Default Image" /> --}}
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            <div class="shopping-cart__product-item__detail">
                                                <h4>{{ $item->name }}</h4>
                                                {{-- <ul class="shopping-cart__product-item__options">
                                                      <li>Color: Yellow</li>
                                                      <li>Size: L</li>
                                                    </ul> --}}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="shopping-cart__product-price">{{ number_price($item->price) }}</span>
                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                    <form
                                                        action="{{ route('wishlist.move.to.cart', ['rowId' => $item->rowId]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-warning">Thêm vào giỏ
                                                            hàng</button>
                                                    </form>
                                                </div>

                                                <div class="col-6">
                                                    <form
                                                        action="{{ route('wishlist.item.remove', ['rowId' => $item->rowId]) }}"
                                                        method="POST" id="remove-item-{{ $item->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:void(0)" class="remove-cart"
                                                            onclick="document.getElementById('remove-item-{{ $item->id }}').submit();">
                                                            <svg width="10" height="10" viewBox="0 0 10 10"
                                                                fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                                <path
                                                                    d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="cart-table-footer">
                            <form action="{{ route('wishlist.empty') }}" method="POST"
                                id="remove-item-{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light">Xoá tất cả sản phẩm yêu thích</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <p>Không có sản phẩm nào trong danh mục yêu thích</p>
                            <a href="{{route ('shop.index') }}" class="btn btn-info">Thêm sản phẩm yêu thích</a>
                        </div>
                    </div>
                @endif
            </div>
        </section> -->

    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Sản phẩm yêu thích</h2>
        @if (Cart::instance('wishlist')->content()->count() > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content my-account__wishlist">
                    <div class="products-grid row row-cols-3 row-cols-lg-4" id="products-grid">
                        @foreach ($products as $product)
                        <div class="product-card-wrapper">
                            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <div class="swiper-container background-img js-swiper-slider"
                                        data-settings='{"resizeObserver": true}'>
                                        <div class="swiper-wrapper">
                                            @foreach($product->images as $image)
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ $image->image_url }}" width="330" height="400"
                                                    alt="Cropped Faux leather Jacket" class="pc__img">
                                            </div>
                                            @endforeach
                                        </div>
                                        <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_prev_sm" />
                                            </svg></span>
                                        <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_next_sm" />
                                            </svg></span>
                                    </div>
                                    <form
                                        action="{{ route('wishlist.item.remove', ['rowId' => $item->rowId]) }}"
                                        method="POST" id="remove-item-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-remove-from-wishlist" type="submit">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_close" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category">{{ $product->category->category_name }}</p>
                                    <h6 class="pc__title"><a href="{{ route('shop.detail',$product->productID) }}">{{ $product->product_name }}</a></h6>
                                    <div class="product-card__price d-flex gap-2">
                                        @if ($product->discount > 0)
                                        <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
                                        <span class="money price price-old">{{ number_price($product->price) }}</span>
                                        <div class="text-red">({{discountPercent($product->price,$product->discount)}})</div>
                                        @else
                                        <span class="money price">{{ number_price($product->price) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-table-footer d-flex">
            <form action="{{ route('wishlist.empty') }}" method="POST" id="remove-item-{{ $item->id }}" class="ms-auto">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light">Xoá tất cả sản phẩm yêu thích</button>
            </form>
        </div>

        @else
        <div class="row">
            <div class="col-md-12">
                <p>Không có sản phẩm nào trong danh mục yêu thích</p>
                <a href="{{route ('shop.index') }}" class="btn btn-info">Thêm sản phẩm yêu thích</a>
            </div>
        </div>
        @endif
    </section>
</main>
@endsection