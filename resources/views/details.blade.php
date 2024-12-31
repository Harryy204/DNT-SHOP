@extends('layouts.layout')
@section('main')
<style>
  .filled-heart {
    color: red
  }
</style>
<main class="pt-90">
  <div class="mb-md-1 pb-md-3"></div>
  <section class="product-single container">
    <div class="row">
      <div class="col-lg-7">
        <div class="product-single__media" data-media-type="vertical-thumbnail">
          <div class="product-single__image">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                @foreach ($product->images as $image)
                <div class="swiper-slide product-single__image-item">
                  <img loading="lazy" class="h-auto" src="{{ asset($image->image_url) }}" width="674" height="674"
                    alt="{{ $product->product_name }}" />
                  <a data-fancybox="gallery" href="{{ asset($image->image_url) }}" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="Zoom">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_zoom" />
                    </svg>
                  </a>
                </div>
                @endforeach
              </div>
              <div class="swiper-button-prev">
                <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_prev_sm" />
                </svg>
              </div>
              <div class="swiper-button-next">
                <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_next_sm" />
                </svg>
              </div>
            </div>
          </div>

          <div class="product-single__thumbnail">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                @foreach ($product->images as $image)
                <div class="swiper-slide product-single__image-item">
                  <img loading="lazy" class="h-auto" src="{{ asset($image->image_url) }}" width="104" height="104"
                    alt="{{ $product->product_name }}" />
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Sản phẩm</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Chi tiết sản phẩm</a>
          </div>
        </div>
        <h1 class="product-single__name">{{$product->product_name}}</h1>
        <div class="product-single__rating">
          <div class="reviews-group d-flex">
            @for ($i = 1; $i <= 5; $i++) <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_star" fill="{{ $i <= $averageRating ? '#ffcc00' : '#ccc' }}" />
              </svg>
              @endfor
          </div>
          <span class="reviews-note text-lowercase text-secondary ms-1">{{ $reviewCount }} đánh giá</span>
        </div>

        <div class="product-single__price">
          @if ($product->discount > 0)
          <span class="current-price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
          <span class="current-price price-old">{{ number_price($product->price) }}</span>
          <span class="pc-label pc-label_sale text-red"
            style="background-color: rgba(255, 0, 0, 0.2);  border-radius: 40%; padding: 0.1rem 0.3rem; display: inline-block;">
            {{ discountPercent($product->price, $product->discount) }}
          </span>
          @else
          <span class="current-price">{{ number_price($product->price) }}</span>
          @endif
        </div>
        <div class="product-single__price">
          <div id="size" class="d-flex size-option">
            @foreach ($sizes->unique('sizeID') as $size)
            <div class="size-box btn btn-outline-primary" data-size="{{ $size->sizeID }}">
              {{ $size->size_name }}
            </div>
            @endforeach
          </div>
        </div>
        <div class="product-single__price">
          <div class="d-flex">
            @foreach ($product->colors->unique('color_code') as $color)
            <div class="color-box"
              style="border:1px solid;background-color: {{ $color->color_code }}; width: 30px; height: 30px; border-radius: 50%; margin-right: 5px; cursor: pointer;"
              data-color="{{ $color->colorID }}">
              <span class="checkmark" style="display: none;position: absolute; {{ ($color->color_code == '#FFFFFF')? 'color: black;' : 'color: white;' }}">✓</span>
            </div>
            @endforeach
          </div>
        </div>
        <div class="product-single__short-desc">
          <p>{!! Str::limit($product->description, 200, '...') !!}</p>
        </div>

        <span class="d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#sizeModal"
          style="cursor: pointer;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
            style="color: rgb(54, 106, 226)">
            <path
              d="M18.4702 22.75H14.4702C12.0502 22.75 10.7202 21.42 10.7202 19V5C10.7202 2.58 12.0502 1.25 14.4702 1.25H18.4702C20.8902 1.25 22.2202 2.58 22.2202 5V19C22.2202 21.42 20.8802 22.75 18.4702 22.75ZM14.4702 2.75C12.8902 2.75 12.2202 3.42 12.2202 5V19C12.2202 20.58 12.8902 21.25 14.4702 21.25H18.4702C20.0502 21.25 20.7202 20.58 20.7202 19V5C20.7202 3.42 20.0502 2.75 18.4702 2.75H14.4702Z"
              fill="currentColor"></path>
            <path
              d="M16.4702 6.75H11.4702C11.0602 6.75 10.7202 6.41 10.7202 6C10.7202 5.59 11.0602 5.25 11.4702 5.25H16.4702C16.8802 5.25 17.2202 5.59 17.2202 6C17.2202 6.41 16.8802 6.75 16.4702 6.75Z"
              fill="currentColor"></path>
            <path
              d="M15.4702 18.75H11.4702C11.0602 18.75 10.7202 18.41 10.7202 18C10.7202 17.59 11.0602 17.25 11.4702 17.25H15.4702C15.8802 17.25 16.2202 17.59 16.2202 18C16.2202 18.41 15.8802 18.75 15.4702 18.75Z"
              fill="currentColor"></path>
            <path
              d="M16.4699 14.75C16.4599 14.75 16.4599 14.75 16.4699 14.75L11.4599 14.7C11.0499 14.7 10.7099 14.36 10.7199 13.94C10.7199 13.53 11.0599 13.2 11.4699 13.2C11.4699 13.2 11.4699 13.2 11.4799 13.2L16.4799 13.25C16.8899 13.25 17.2299 13.59 17.2199 14.01C17.2099 14.42 16.8799 14.75 16.4699 14.75Z"
              fill="currentColor"></path>
            <path
              d="M14.4702 10.75H11.4702C11.0602 10.75 10.7202 10.41 10.7202 10C10.7202 9.59 11.0602 9.25 11.4702 9.25H14.4702C14.8802 9.25 15.2202 9.59 15.2202 10C15.2202 10.41 14.8802 10.75 14.4702 10.75Z"
              fill="currentColor"></path>
            <path
              d="M5.48978 22.72C4.57978 22.72 3.71979 22.16 3.12979 21.18L2.30979 19.82C2.00979 19.32 1.77979 18.5 1.77979 17.92V4.95C1.77979 2.91 3.43979 1.25 5.47979 1.25C7.51978 1.25 9.17979 2.91 9.17979 4.95V17.91C9.17979 18.49 8.94979 19.31 8.64979 19.81L7.82979 21.17C7.25979 22.16 6.39979 22.72 5.48978 22.72ZM5.48978 2.75C4.27978 2.75 3.28979 3.74 3.28979 4.95V17.91C3.28979 18.22 3.43979 18.77 3.59979 19.04L4.41979 20.4C4.72979 20.92 5.11978 21.21 5.48978 21.21C5.85979 21.21 6.24978 20.91 6.55978 20.4L7.37979 19.04C7.53979 18.77 7.68979 18.22 7.68979 17.91V4.95C7.68979 3.74 6.69979 2.75 5.48978 2.75Z"
              fill="currentColor"></path>
            <path
              d="M8.43979 7.75H2.52979C2.11979 7.75 1.77979 7.41 1.77979 7C1.77979 6.59 2.11979 6.25 2.52979 6.25H8.43979C8.84978 6.25 9.18979 6.59 9.18979 7C9.18979 7.41 8.84978 7.75 8.43979 7.75Z"
              fill="currentColor"></path>
          </svg>
          <span class="ms-2" style="color: rgb(54, 106, 226)">Bảng chọn kích thước</span>
        </span>

        <!-- Modal -->
        <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="sizeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sizeModalLabel">Bảng chọn kích thước</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Tab Điều Hướng -->
                <ul class="nav nav-tabs nav-fill" id="sizeTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-size-male" data-bs-toggle="tab" href="#size-male" role="tab"
                      aria-controls="size-male" aria-selected="true">Nam</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-size-female" data-bs-toggle="tab" href="#size-female" role="tab"
                      aria-controls="size-female" aria-selected="false">Nữ</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-size-accessories" data-bs-toggle="tab" href="#size-accessories"
                      role="tab" aria-controls="size-accessories" aria-selected="false">Phụ Kiện</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-size-kids" data-bs-toggle="tab" href="#size-kids" role="tab"
                      aria-controls="size-kids" aria-selected="false">Trẻ Em</a>
                  </li>
                </ul>

                <!-- Nội Dung Tab -->
                <div class="tab-content mt-3" id="sizeTabContent">
                  <!-- Size Nam -->
                  <div class="tab-pane fade show active" id="size-male" role="tabpanel" aria-labelledby="tab-size-male">
                    <img src="{{ asset('assets/client/images/shop/size_nam.png') }}" alt="Bảng chọn kích thước nam"
                      class="img-fluid">
                  </div>
                  <!-- Size Nữ -->
                  <div class="tab-pane fade" id="size-female" role="tabpanel" aria-labelledby="tab-size-female">
                    <img src="{{ asset('assets/client/images/shop/size_nu.png') }}" alt="Bảng chọn kích thước nữ"
                      class="img-fluid">
                  </div>
                  <!-- Size Phụ Kiện -->
                  <div class="tab-pane fade" id="size-accessories" role="tabpanel"
                    aria-labelledby="tab-size-accessories">
                    <img src="{{ asset('assets/client/images/shop/size_phu_kien.png') }}"
                      alt="Bảng chọn kích thước phụ kiện" class="img-fluid">
                  </div>
                  <!-- Size Trẻ Em -->
                  <div class="tab-pane fade" id="size-kids" role="tabpanel" aria-labelledby="tab-size-kids">
                    <img src="{{ asset('assets/client/images/shop/size_tre_em.png') }}"
                      alt="Bảng chọn kích thước trẻ em" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <form name="addtocart-form" method="post" action="{{ route('cart.add') }}">
          @csrf
          <div class="product-single__addtocart">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="1" min="1" class="qty-control__number text-center">
              <div class="qty-control__reduce">-</div>
              <div class="qty-control__increase">+</div>
            </div><!-- .qty-control -->
            <input type="hidden" name="id" value="{{ $product->productID }}">
            <input type="hidden" name="name" value="{{ $product->product_name }}">
            <input type="hidden" name="price" value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">

            <input type="hidden" name="color_id" value="{{ $color_id }}">
            <input type="hidden" name="size_id" value="{{ $size_id ?? null }}">

            <button type="submit" class="btn btn-primary btn-addtocart" data-aside="cartDrawer">Thêm vào giỏ
              hàng</button>
          </div>
        </form>

        <div class="product-single__addtolinks">
          @if (Cart::instance('wishlist')->content()->where('id', $product->productID)->count() > 0)
          <form
            action="{{ route('wishlist.item.remove',['rowId'=>Cart::instance('wishlist')->content()->where('id', $product->productID)->first()->rowId]) }}"
            method="POST" id="frm-remove-item">
            @csrf
            @method('DELETE')
            <a href="javascript:void(0);" class="menu-link menu-link_us-s add-to-wishlist filled-heart"
              onclick="document.getElementById('frm-remove-item').submit();"><svg width="16" height="16"
                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_heart" />
                <path
                  d="M10 18l-1.45-1.32C5.4 13.36 2 10.28 2 6.5 2 3.42 4.42 1 7.5 1c1.74 0 3.41.81 4.5 2.09C13.09 1.81 14.76 1 16.5 1 19.58 1 22 3.42 22 6.5c0 3.78-3.4 6.86-8.55 10.18L10 18z" />
              </svg><span>Xoá khỏi mục yêu thích</span></a>
          </form>
          @else
          <form action="{{ route('wishlist.add') }}" method="POST" id="wishlist-form">
            @csrf
            <input type="hidden" name="id" value="{{ $product->productID }}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="name" value="{{ $product->product_name }}">
            <input type="hidden" name="price"
              value="{{ $product->price == '' ? $product->discount : $product->price }}">
            <a href="javascript:void(0);" class="menu-link menu-link_us-s add-to-wishlist"
              onclick="document.getElementById('wishlist-form').submit();"><svg width="16" height="16"
                viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_heart" />
              </svg><span>Thêm vào mục yêu thích</span></a>
          </form>
          @endif
          <share-button class="share-button">
            <button class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
              <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_sharing" />
              </svg>
              <span>Chia sẻ</span>
            </button>
            <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
              <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
              <div id="Article-share-template__main"
                class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                <div class="field grow mr-4">
                  <label class="field__label sr-only" for="url">Link</label>
                  <input type="text" class="field__input w-full" id="url"
                    value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health"
                    placeholder="Link" onclick="this.select();" readonly="">
                </div>
                <button class="share-button__copy no-js-hidden">
                  <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13" fill="none"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 11 13">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                      fill="currentColor"></path>
                  </svg>
                  <span class="sr-only">Copy link</span>
                </button>
              </div>
            </details>
          </share-button>
          <script src="js/details-disclosure.html" defer="defer"></script>
          <script src="js/share.html" defer="defer"></script>
        </div>
        <div class="product-single__meta-info">
          <div class="meta-item">
            <label>Mã sản phẩm:</label>
            <span>{{$product->product_code}}</span>
          </div>
          <div class="meta-item">
            <label>Danh mục:</label>
            <span>{{$product->category->category_name}}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="product-single__details-tab">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore active" id="tab-description-tab" data-bs-toggle="tab"
            href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Mô tả</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
            role="tab" aria-controls="tab-reviews" aria-selected="false">Đánh giá ({{$reviewCount ?? '0'}})</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
          aria-labelledby="tab-description-tab">
          <div class="product-single__description">
            <p class="content">{!! $product->description !!}</p>
          </div>
        </div>

        <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews-tab">
          <h2 class="product-single__reviews-title">Đánh giá</h2>
          <div class="product-single__reviews-list">
            @if($ratings->isEmpty())
            <p>Chưa có đánh giá nào.</p>
            @else
            @foreach ($ratings as $review)
            <div class="product-single__reviews-item">
              <div class="customer-avatar">
                <img loading="lazy" src="{{ $review->user->avatar ?? asset('/images/avatar_default/avatar.png') }}"
                  alt="{{ $review->user->name }}" />
              </div>
              <div class="customer-review">
                <div class="customer-name">
                  <h6>{{ $review->user->full_name }}</h6>
                  <div class="reviews-group d-flex">
                    @for ($i = 1; $i <= 5; $i++) <svg class="review-star" viewBox="0 0 9 9"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" fill="{{ $i <= $review->rating ? '#ffcc00' : '#ccc' }}" />
                      </svg>
                      @endfor
                  </div>
                </div>
                <div class="review-date">{{ ucwords($review->created_at->locale('vi')->isoFormat('dddd, D MMMM YYYY'))
                  }}</div>
                <div class="review-text">
                  <p>{{ $review->review }}</p>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>

          <div class="product-single__review-form">
            <form action="{{ route('product.review', $product->productID) }}" method="POST">
                @csrf
                <h5>Đánh giá cho sản phẩm "{{ $product->product_name }}"</h5>
                
                <div class="select-star-rating">
                    <label>Số sao *</label>
                    <span class="star-rating">
                        @for ($i = 1; $i <= 5; $i++) 
                            <svg class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" data-rating="{{ $i }}"
                                onclick="setRating({{ $i }})">
                                <path
                                    d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                            </svg>
                        @endfor
                    </span>
                    <input type="hidden" id="form-input-rating" name="rating" value="" required />
                </div>
        
                <div class="mb-4">
                    <textarea id="form-input-review" class="form-control form-control_gray" name="review" placeholder="Cảm nhận về sản phẩm" cols="30" rows="8" required minlength="10"></textarea>
                </div>
        
                <div class="form-action">
                    <button type="submit" class="btn btn-primary">Đánh giá</button>
                </div>
            </form>
        </div>
        
        </div>
      </div>
    </div>
  </section>
  <section class="products-carousel container">
    <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Sản phẩm <strong>Liên quan</strong></h2>

    <div id="related_products" class="position-relative">
      <div class="swiper-container js-swiper-slider" data-settings='{
          "autoplay": false,
          "slidesPerView": 4,
          "slidesPerGroup": 4,
          "effect": "none",
          "loop": true,
          "pagination": {
            "el": "#related_products .products-pagination",
            "type": "bullets",
            "clickable": true
          },
          "navigation": {
            "nextEl": "#related_products .products-carousel__next",
            "prevEl": "#related_products .products-carousel__prev"
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "slidesPerGroup": 2,
              "spaceBetween": 14
            },
            "768": {
              "slidesPerView": 3,
              "slidesPerGroup": 3,
              "spaceBetween": 24
            },
            "992": {
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "spaceBetween": 30
            }
          }
        }'>
        <div class="swiper-wrapper">
          <div class="swiper-wrapper">
            @foreach ($relatedProducts as $relatedProduct)
            <div class="swiper-slide product-card p-1">
              <div class="pc__img-wrapper">
                <a href="{{ route('shop.detail', $relatedProduct->productID) }}">
                  <img loading="lazy"
                    src="{{ asset($relatedProduct->images->first()->image_url ?? 'assets/images/default.jpg') }}"
                    width="330" height="400" alt="{{ $relatedProduct->product_name }}" class="pc__img">
                </a>
              </div>
              <div class="pc__info position-relative">
                <p class="pc__category">{{ $relatedProduct->category->category_name }}</p>
                <h6 class="pc__title"><a href="{{ route('shop.detail', $relatedProduct->productID) }}">{{
                    $relatedProduct->product_name }}</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">{{ number_price($relatedProduct->price) }}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div><!-- /.swiper-wrapper -->
      </div><!-- /.swiper-container js-swiper-slider -->

      <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_prev_md" />
        </svg>
      </div><!-- /.products-carousel__prev -->
      <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_next_md" />
        </svg>
      </div><!-- /.products-carousel__next -->

      <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
      <!-- /.products-pagination -->
    </div><!-- /.position-relative -->

  </section><!-- /.products-carousel container -->
</main>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Xử lý cho kích thước
    const sizeBoxes = document.querySelectorAll('.size-box');
    const sizeInput = document.querySelector('input[name="size_id"]'); // Lấy input để lưu kích thước

    sizeBoxes.forEach(box => {
      box.addEventListener('click', function () {
        // Kiểm tra nếu ô này đã được chọn
        if (box.classList.contains('selected')) {
          // Nếu ô đang được chọn, thì bỏ chọn bằng cách loại bỏ lớp "selected"
          box.classList.remove('selected');
          sizeInput.value = ''; // Đặt giá trị input thành rỗng nếu bỏ chọn
        } else {
          // Nếu ô chưa được chọn, thì bỏ chọn các ô khác và thêm lớp "selected" vào ô này
          sizeBoxes.forEach(b => {
            b.classList.remove('selected');
          });
          box.classList.add('selected');
          
          // Cập nhật giá trị cho input
          sizeInput.value = box.getAttribute('data-size'); // Giả sử bạn có data-size trong HTML
        }
      });
    });

    // Xử lý cho màu sắc
    const colorBoxes = document.querySelectorAll('.color-box');
    const colorInput = document.querySelector('input[name="color_id"]'); // Lấy input để lưu màu sắc

    colorBoxes.forEach(box => {
      box.addEventListener('click', function () {
        // Kiểm tra nếu ô màu đã được chọn
        const checkmark = box.querySelector('.checkmark');
        
        if (checkmark.style.display === 'block') {
          // Nếu dấu tích đang hiển thị, loại bỏ nó
          checkmark.style.display = 'none';
          colorInput.value = ''; // Đặt giá trị input thành rỗng nếu bỏ chọn
        } else {
          // Nếu dấu tích không hiển thị, ẩn tất cả dấu tích trước
          colorBoxes.forEach(b => {
            b.querySelector('.checkmark').style.display = 'none';
          });

          // Hiển thị dấu tích cho ô đã chọn
          checkmark.style.display = 'block';
          // Cập nhật giá trị cho input
          colorInput.value = box.getAttribute('data-color'); // Giả sử bạn có data-color trong HTML
        }

        const selectedColorId = box.getAttribute('data-color');
        console.log('Màu đã chọn:', selectedColorId);
      });
    });
  });

  function setRating(rating) {
        document.getElementById('form-input-rating').value = rating;
        const stars = document.querySelectorAll('.star-rating__star-icon');
        stars.forEach(star => {
            star.setAttribute('fill', star.getAttribute('data-rating') <= rating ? '#ffcc00' : '#ccc');
        });
    }
</script>