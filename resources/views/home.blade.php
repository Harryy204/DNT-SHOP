@extends('layouts.layout')
@section('title','Trang chủ')
@push('styles')
<style>
  main {
    padding-top: 100px !important;
  }
</style>
@endpush
@section('main')
<main class="">
  @include('slide')

  <div class="container mw-1620 bg-white border-radius-10">
    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    <section class="category-carousel container">
      <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">Bạn Có Thể Thích</h2>

      <div class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "effect": "none",
              "loop": true,
              "navigation": {
                "nextEl": ".products-carousel__next-1",
                "prevEl": ".products-carousel__prev-1"
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 15
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 6,
                  "slidesPerGroup": 1,
                  "spaceBetween": 45,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 8,
                  "slidesPerGroup": 1,
                  "spaceBetween": 60,
                  "pagination": false
                }
              }
            }'>
          <div class="swiper-wrapper">
            @foreach($categories as $category)
            <div class="swiper-slide">
              <img loading="lazy" class="mb-3 rounded-circle border border-3 border-black" src="{{ $category->image }}" width="124"
                height="124" alt="" />
              <div class="text-center">
                <a href="{{ route('shop.index',['categories' => $category->categoryID]) }}" class="menu-link fw-medium">{{ $category->category_name }}</a>
              </div>
            </div>
            @endforeach
          </div><!-- /.swiper-wrapper -->
        </div><!-- /.swiper-container js-swiper-slider -->

        <div
          class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_md" />
          </svg>
        </div><!-- /.products-carousel__prev -->
        <div
          class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_md" />
          </svg>
        </div><!-- /.products-carousel__next -->
      </div><!-- /.position-relative -->
    </section>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    <section class="hot-deals container">
      <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Khuyến Mãi Hấp Dẫn</h2>
      <div class="row">
        <div
          class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
          <h2>Ưu đãi </h2>
          <h2 class="fw-bold">Đặc biệt của DNTSHOP</h2>

          <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
            data-date="21-11-2024" data-time="06:50">
            <div class="day countdown-unit">
              <span class="countdown-num d-block"></span>
              <span class="countdown-word text-uppercase text-secondary">Ngày</span>
            </div>

            <div class="hour countdown-unit">
              <span class="countdown-num d-block"></span>
              <span class="countdown-word text-uppercase text-secondary">Giờ</span>
            </div>

            <div class="min countdown-unit">
              <span class="countdown-num d-block"></span>
              <span class="countdown-word text-uppercase text-secondary">Phút</span>
            </div>

            <div class="sec countdown-unit">
              <span class="countdown-num d-block"></span>
              <span class="countdown-word text-uppercase text-secondary">Giây</span>
            </div>
          </div>

          <a href="{{ route('shop.index',['order' => 8]) }}" class="btn-link default-underline text-uppercase fw-medium mt-3">Xem tất cả</a>
        </div>
        <div class="col-md-6 col-lg-8 col-xl-80per">
          <div class="position-relative">
            <div class="swiper-container js-swiper-slider" data-settings='{
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "effect": "none",
                  "loop": false,
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 2,
                      "spaceBetween": 14
                    },
                    "768": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 3,
                      "spaceBetween": 24
                    },
                    "992": {
                      "slidesPerView": 3,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    }
                  }
                }'>
              <div class="swiper-wrapper">
                @foreach($discountProducts as $discountProduct)
                <div class="swiper-slide product-card product-card_style3">
                  <div class="pc__img-wrapper border">
                    <a href="{{ route('shop.detail',$discountProduct->productID) }}">
                      <img loading="lazy" src="{{ $discountProduct->images[0]->image_url }}" width="258" height="313"
                        alt="Cropped Faux leather Jacket" class="pc__img">
                      @isset($discountProduct->images[1]->image_url)
                      <img loading="lazy" src="{{ $discountProduct->images[1]->image_url }}" width="258" height="313"
                        alt="Cropped Faux leather Jacket" class="pc__img pc__img-second">
                      @endisset
                    </a>
                  </div>

                  <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="{{ route('shop.detail',$discountProduct->productID) }}">{{ $discountProduct->product_name }}</a></h6>
                    <div class="product-card__price d-flex gap-2">
                      @if ($discountProduct->discount > 0)
                      <span class="money price price-sale">{{ number_price($discountProduct->discount > 0 ? $discountProduct->price-$discountProduct->discount : $discountProduct->price) }}</span>
                      <span class="money price price-old">{{ number_price($discountProduct->price) }}</span>
                      @else
                      <span class="money price">{{ number_price($discountProduct->price) }}</span>
                      @endif
                    </div>

                    <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                      <!-- Thêm sản phẩm vào giỏ hàng -->
                      <form method="post" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $discountProduct->productID }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="name" value="{{ $discountProduct->product_name }}">
                        <input type="hidden" name="price" value="{{ $discountProduct->discount > 0 ? $discountProduct->price-$discountProduct->discount : $discountProduct->price }}">
                        <input type="hidden" name="size_id" value="{{ $discountProduct->sizes[0]->sizeID ?? null}}">
                        <input type="hidden" name="color_id" value="{{ $discountProduct->colors[0]->colorID}}">
                        <button type="submit" class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart"
                          data-aside="cartDrawer" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
                      </form>

                      @if (Cart::instance('wishlist')->content()->where('id', $discountProduct->productID)->count() > 0)
                      <form
                        action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $discountProduct->productID)->first()->rowId]) }}"
                        method="POST" id="frm-remove-item-{{ $discountProduct->productID }}">
                        @csrf
                        @method('DELETE')
                        <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist text-red" title="Đã thêm vào yêu thích">
                          <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_heart" />
                          </svg>
                        </button>
                      </form>
                      @else
                      <form action="{{ route('wishlist.add') }}" method="POST"
                        id="wishlist-form-{{ $discountProduct->productID }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $discountProduct->productID }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="name" value="{{ $discountProduct->product_name }}">
                        <input type="hidden" name="price"
                          value="{{ $discountProduct->discount > 0 ? $discountProduct->price-$discountProduct->discount : $discountProduct->price }}">
                        <input type="hidden" name="size_id" value="{{ $discountProduct->sizes[0]->sizeID ?? 'N/A'}}">
                        <input type="hidden" name="color_id" value="{{ $discountProduct->colors[0]->colorID ?? 'N/A'}}">
                        <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist " title="Thêm vào yêu thích">
                          <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_heart" />
                          </svg>
                        </button>
                      </form>
                      @endif
                    </div>
                  </div>
                </div>
                @endforeach
              </div><!-- /.swiper-wrapper -->
            </div><!-- /.swiper-container js-swiper-slider -->
          </div><!-- /.position-relative -->
        </div>
      </div>
    </section>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    <section class="category-banner container">
      <div class="row">
        @foreach($twoCategories as $category)
        <div class="col-md-6">
          <div class="category-banner__item border-radius-10 mb-5">
            <img loading="lazy" class=" border" src="{{ $category->image }}" width="690" height="665"
              alt="" style="border-radius: 15px !important;"/>
            <!-- <div class="category-banner__item-mark">
              Starting at $19
            </div> -->
            <div class="category-banner__item-content border">
              <h3 class="mb-0">{{ $category->category_name }}</h3>
              <a href="{{ route('shop.index',['categories' => $category->categoryID]) }}" class="btn-link default-underline text-uppercase fw-medium">Mua Sắm Ngay</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

    <section class="products-grid container">
      <h2 class="section-title text-center mb-2 pb-xl-3 mb-xl-4">Sản phẩm nổi bật</h2>
      <div class="row">
        @foreach($featuredProducts as $product)
        <div class="col-6 col-md-4 col-lg-3">
          <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
            <div class="pc__img-wrapper border">
              <a href="{{ route('shop.detail',$product->productID) }}">
                <img loading="lazy" src="{{ $product->images[0]->image_url}}" width="330" height="400"
                  alt="Cropped Faux leather Jacket" class="pc__img">
              </a>
              @if($product->created_at->diffInDays(Carbon\Carbon::now()) < 7)
                <div class="product-label text-uppercase bg-white top-0 left-0 mt-2 mx-2">Mới!
            </div>
            @endif
            @if($product->discount > 0)
            <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2">{{discountPercent($product->price,$product->discount)}}</div>
            @endif
          </div>

          <div class="pc__info position-relative">
            <h6 class="pc__title"><a href="{{ route('shop.detail',$product->productID) }}">{{ $product->product_name }}</a></h6>
            <div class="product-card__price d-flex align-items-center gap-2">
              @if ($product->discount > 0)
              <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
              <span class="money price price-old">{{ number_price($product->price) }}</span>
              @else
              <span class="money price">{{ number_price($product->price) }}</span>
              @endif
            </div>

            <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
              <form method="post" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $product->productID }}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="name" value="{{ $product->product_name }}">
                <input type="hidden" name="price" value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
                <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? null}}">
                <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID}}">
                <button type="submit" class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart"
                  data-aside="cartDrawer" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
              </form>

              @if (Cart::instance('wishlist')->content()->where('id', $product->productID)->count() > 0)
              <form
                action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->productID)->first()->rowId]) }}"
                method="POST" id="frm-remove-item-{{ $product->productID }}">
                @csrf
                @method('DELETE')
                <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist text-red" title="Đã thêm vào yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </form>
              @else
              <form action="{{ route('wishlist.add') }}" method="POST"
                id="wishlist-form-{{ $product->productID }}">
                @csrf
                <input type="hidden" name="id" value="{{ $product->productID }}">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="name" value="{{ $product->product_name }}">
                <input type="hidden" name="price"
                  value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
                <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? 'N/A'}}">
                <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID ?? 'N/A'}}">
                <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist " title="Thêm vào yêu thích">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </form>
              @endif
            </div>
          </div>
        </div>

      </div>
      @endforeach
      <div class="text-center">
        <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="{{ route('shop.index',['order' => 1]) }}">Xem thêm</a>
      </div>

  </div>
  <div class="mb-1 mb-xl-5"></div>
  <section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Sản phẩm mới</h2>

    <div class="row">
      @foreach($newProducts as $product)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
          <div class="pc__img-wrapper border">
            <a href="{{ route('shop.detail',$product->productID) }}">
              <img loading="lazy" src="{{ $product->images[0]->image_url}}" width="330" height="400"
                alt="Cropped Faux leather Jacket" class="pc__img">
            </a>
            @if($product->created_at->diffInDays(Carbon\Carbon::now()) < 7)
              <div class="product-label text-uppercase bg-white top-0 left-0 mt-2 mx-2">Mới!
          </div>
          @endif
          @if($product->discount > 0)
          <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2">{{discountPercent($product->price,$product->discount)}}</div>
          @endif
        </div>

        <div class="pc__info position-relative">
          <h6 class="pc__title"><a href="{{ route('shop.detail',$product->productID) }}">{{ $product->product_name }}</a></h6>
          <div class="product-card__price d-flex align-items-center gap-2">
            @if ($product->discount > 0)
            <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
            <span class="money price price-old">{{ number_price($product->price) }}</span>
            @else
            <span class="money price">{{ number_price($product->price) }}</span>
            @endif
            {{-- <span class="money price text-secondary">{{ ($product->discount > 0) ? number_price($product->price - $product->discount) :number_price($product->price) }}</span> --}}
          </div>

          <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
            <form method="post" action="{{ route('cart.add') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $product->productID }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="name" value="{{ $product->product_name }}">
              <input type="hidden" name="price" value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
              <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? null}}">
              <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID}}">
              <button type="submit" class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart"
                data-aside="cartDrawer" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
            </form>

            @if (Cart::instance('wishlist')->content()->where('id', $product->productID)->count() > 0)
            <form
              action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->productID)->first()->rowId]) }}"
              method="POST" id="frm-remove-item-{{ $product->productID }}">
              @csrf
              @method('DELETE')
              <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist text-red" title="Đã thêm vào yêu thích">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </form>
            @else
            <form action="{{ route('wishlist.add') }}" method="POST"
              id="wishlist-form-{{ $product->productID }}">
              @csrf
              <input type="hidden" name="id" value="{{ $product->productID }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="name" value="{{ $product->product_name }}">
              <input type="hidden" name="price"
                value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
              <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? 'N/A'}}">
              <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID ?? 'N/A'}}">
              <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist " title="Thêm vào yêu thích">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="text-center">
      <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="{{ route('shop.index',['order' => 7]) }}">Xem thêm</a>
    </div>
    </div>
  </section>
  <div class="mb-1 mb-xl-5"></div>
  <section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">GỢI Ý HÔM NAY</h2>

    <div class="row">
      @foreach($randomProducts as $product)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
          <div class="pc__img-wrapper border">
            <a href="{{ route('shop.detail',$product->productID) }}">
              <img loading="lazy" src="{{ $product->images[0]->image_url}}" width="330" height="400"
                alt="Cropped Faux leather Jacket" class="pc__img">
            </a>
            @if($product->created_at->diffInDays(Carbon\Carbon::now()) < 7)
              <div class="product-label text-uppercase bg-white top-0 left-0 mt-2 mx-2">Mới!
          </div>
          @endif
          @if($product->discount > 0)
          <div class="product-label bg-red text-white right-0 top-0 left-auto mt-2 mx-2">{{discountPercent($product->price,$product->discount)}}</div>
          @endif
        </div>

        <div class="pc__info position-relative">
          <h6 class="pc__title"><a href="{{ route('shop.detail',$product->productID) }}">{{ $product->product_name }}</a></h6>
          <div class="product-card__price d-flex align-items-center gap-2">
            @if ($product->discount > 0)
            <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
            <span class="money price price-old">{{ number_price($product->price) }}</span>
            @else
            <span class="money price">{{ number_price($product->price) }}</span>
            @endif
            {{-- <span class="money price text-secondary">{{ ($product->discount > 0) ? number_price($product->price - $product->discount) :number_price($product->price) }}</span> --}}
          </div>

          <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
            <form method="post" action="{{ route('cart.add') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $product->productID }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="name" value="{{ $product->product_name }}">
              <input type="hidden" name="price" value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
              <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? null}}">
              <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID}}">
              <button type="submit" class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart"
                data-aside="cartDrawer" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng</button>
            </form>

            @if (Cart::instance('wishlist')->content()->where('id', $product->productID)->count() > 0)
            <form
              action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->productID)->first()->rowId]) }}"
              method="POST" id="frm-remove-item-{{ $product->productID }}">
              @csrf
              @method('DELETE')
              <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist text-red" title="Đã thêm vào yêu thích">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </form>
            @else
            <form action="{{ route('wishlist.add') }}" method="POST"
              id="wishlist-form-{{ $product->productID }}">
              @csrf
              <input type="hidden" name="id" value="{{ $product->productID }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="name" value="{{ $product->product_name }}">
              <input type="hidden" name="price"
                value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
              <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? 'N/A'}}">
              <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID ?? 'N/A'}}">
              <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist " title="Thêm vào yêu thích">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
    </div>
  </section>
</main>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.custom-swiper-slider', {
      autoplay: {
        delay: 5000,
      },
      loop: true,
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
    console.log("Swiper initialized");
  });
</script>
@endpush