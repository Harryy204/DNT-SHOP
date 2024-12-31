@extends('layouts.layout')
@section('main')
<style>
    .filled-heart{
      color: red
    }
  </style>
<main class="pt-90">
    <section class="shop-main container d-flex pt-4 pt-xl-5">
        <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
            <div class="aside-header d-flex d-lg-none align-items-center">
                <h3 class="text-uppercase fs-6 mb-0">Lọc</h3>
                <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
            </div>

            <div class="pt-4 pt-lg-0"></div>

            <div class="accordion" id="categories-list">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-1">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true"
                            aria-controls="accordion-filter-1">
                            <strong>Danh mục sản phẩm</strong>
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
                        <div class="accordion-body px-0 pb-0 pt-3">
                            <ul class="list list-inline mb-0">
                                @foreach ($categories as $category)
                                <li
                                    class="list-item list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <label class="d-flex align-items-center mb-0 w-100">
                                        <input type="checkbox" class="chk-category me-2" name="categories[]"
                                            value="{{ $category->categoryID }}" @if (in_array($category->categoryID,
                                        explode(',', $f_categories))) checked="checked" @endif/>
                                        {{ $category->category_name }}
                                    </label>
                                    <span class="text-muted">{{$category->products->count()}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="accordion" id="color-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-1">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true"
                            aria-controls="accordion-filter-2">
                            Color
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-2" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-1" data-bs-parent="#color-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-color js-filter" style="color: #0a2472"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d7bb4f"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #282828"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #b1d6e8"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #9c7539"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d29b48"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #e6ae95"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d76b67"></a>
                                <a href="#" class="swatch-color swatch_active js-filter" style="color: #bababa"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #bfdcc4"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="accordion" id="size-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-size">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true"
                            aria-controls="accordion-filter-size">
                            <strong>Kích cỡ</strong>
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XS</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">S</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">M</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">L</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XL</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XXL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="accordion" id="brand-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-brand">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true"
                            aria-controls="accordion-filter-brand">
                            <strong>Thương hiệu</strong>
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
                        <div class="search-field multi-select accordion-body px-0 pb-0">
                            <ul class="list list-inline mb-0 brand-list">
                                @foreach ($brands as $brand)
                                <li
                                    class="list-item list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <label class="d-flex align-items-center mb-0 w-100">
                                        <input type="checkbox" name="brands[]" value="{{ $brand->brandID }}"
                                            class="chk-brand me-2" @if (in_array($brand->brandID, explode(',',
                                        $f_brands))) checked="checked" @endif />
                                        {{ $brand->brand_name }}
                                    </label>
                                    <span class="text-muted">{{ $brand->products->count() ?? 0 }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion" id="price-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header mb-2" id="accordion-heading-price">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true"
                            aria-controls="accordion-filter-price">
                            <strong>Giá</strong>
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-price" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
                        <input class="price-range-slider" type="text" name="price_range" value=""
                            data-slider-min="{{ $minPrice }}" data-slider-max="{{ $maxPrice }}" data-slider-step="50000"
                            data-slider-value="[{{ $minPrice }},{{ $maxPrice }}]" data-currency="VNĐ" />

                        <div class="price-range__info d-flex align-items-center mt-2">
                            <div class="me-auto">
                                <span class="text-secondary">Giá thấp nhất: </span>
                                <span class="price-range__min">{{ number_format($minPrice, 0, ',', '.') }} VNĐ</span>
                            </div>
                            <div>
                                <span class="text-secondary">Giá cao nhất: </span>
                                <span class="price-range__max">{{ number_format($maxPrice, 0, ',', '.') }} VNĐ</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="shop-list flex-grow-1">
            <div class="swiper-container js-swiper-slider slideshow slideshow_small slideshow_split" data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 1,
            "effect": "fade",
            "loop": true,
            "pagination": {
              "el": ".slideshow-pagination",
              "type": "bullets",
              "clickable": true
            }
          }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                            <div class="slide-split_text position-relative d-flex align-items-center"
                                style="background-color: #f5e6e0;">
                                <div class="slideshow-text container p-3 p-xl-5">
                                    <h2
                                        class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                        Vẻ đẹp <br /><strong>VƯỢT THỜI GIAN</strong></h2>
                                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Một vẻ đẹp không
                                        phai nhạt theo năm tháng,
                                        đem lại cảm giác thanh lịch và đẳng cấp, trường tồn qua mọi xu hướng.</h6>
                                </div>
                            </div>
                            <div class="slide-split_media position-relative">
                                <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                    <img loading="lazy" src="assets/client/images/shop/shop_banner2.jpg" width="630"
                                        height="450" alt="Vẻ đẹp vượt thời gian"
                                        class="slideshow-bg__img object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                            <div class="slide-split_text position-relative d-flex align-items-center"
                                style="background-color: #f5e6e0;">
                                <div class="slideshow-text container p-3 p-xl-5">
                                    <h2
                                        class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                        Tinh tế <br /><strong>Trong mọi khoảnh khắc</strong></h2>
                                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Sự hài hòa trong
                                        từng chi tiết,
                                        từng đường nét vẻ đẹp tỏa sáng trong sự giản đơn và thuần khiết.</h6>
                                </div>
                            </div>
                            <div class="slide-split_media position-relative">
                                <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                    <img loading="lazy" src="assets/client/images/shop/shop_banner3.jpg" width="630"
                                        height="450" alt="Tinh tế trong mọi khoảnh khắc"
                                        class="slideshow-bg__img object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container p-3 p-xl-5">
                    <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2">
                    </div>
                </div>
            </div>

            <div class="mb-3 pb-2 pb-xl-3"></div>

            <div class="d-flex justify-content-between mb-4 pb-md-2">
                <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Trang chủ</a>
                    <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Sản phẩm</a>
                </div>

                <div
                    class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
                    <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0"
                        aria-label="Sort Items" name="orderby" id="orderby">
                        <option value="-1" {{ $order==-1 ? 'selected' : '' }}>Lọc</option>
                        <option value="8" {{ $order==8 ? 'selected' : '' }}>Đang giảm giá</option>
                        <option value="1" {{ $order==1 ? 'selected' : '' }}>Nổi bật</option>
                        <option value="2" {{ $order==2 ? 'selected' : '' }}>A-Z</option>
                        <option value="3" {{ $order==3 ? 'selected' : '' }}>Z-A</option>
                        <option value="4" {{ $order==4 ? 'selected' : '' }}>Giá thấp tới cao</option>
                        <option value="5" {{ $order==5 ? 'selected' : '' }}>Giá cao tới thấp</option>
                        <option value="6" {{ $order==6 ? 'selected' : '' }}>Cũ nhất</option>
                        <option value="7" {{ $order==7 ? 'selected' : '' }}>Mới nhất</option>
                    </select>


                    {{-- <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

                    <div class="col-size align-items-center order-1 d-none d-lg-flex">
                        <span class="text-uppercase fw-medium me-2">View</span>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="2">2</button>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="3">3</button>
                        <button class="btn-link fw-medium js-cols-size" data-target="products-grid"
                            data-cols="4">4</button>
                    </div> --}}

                    <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
                        <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside"
                            data-aside="shopFilter">
                            <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_filter" />
                            </svg>
                            <span class="text-uppercase fw-medium d-inline-block align-middle">Lọc</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
                @foreach ($products as $product)
                <div class="product-card-wrapper">
                    <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                        <div class="pc__img-wrapper">
                            <div class="swiper-container background-img js-swiper-slider"
                                data-settings='{"resizeObserver": true}'>
                                <div class="swiper-wrapper">
                                    @foreach ($product->images as $image)
                                    <div class="swiper-slide">
                                        <a href="{{ route('shop.detail', ['id' => $product->productID]) }}">
                                            <img loading="lazy" src="{{ asset($image->image_url) }}" width="330"
                                                height="400" alt="{{ $product->product_name }}" class="pc__img">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <span class="pc__img-prev">
                                    <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_prev_sm" />
                                    </svg>
                                </span>
                                <span class="pc__img-next">
                                    <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_next_sm" />
                                    </svg>
                                </span>
                            </div>

                            <!-- Form thêm vào giỏ hàng -->
                            <form name="addtocart-form" method="post" action="{{ route('cart.add') }}"
                                class="position-absolute w-100">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->productID }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="name" value="{{ $product->product_name }}">
                                <input type="hidden" name="price" value="{{ $product->discount > 0 ? $product->price-$product->discount : $product->price }}">
                                <input type="hidden" name="size_id" value="{{ $product->sizes[0]->sizeID ?? null}}">
                                <input type="hidden" name="color_id" value="{{ $product->colors[0]->colorID}}">
                                
                                <button type="submit"
                                    class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart"
                                    data-aside="cartDrawer" title="Add To Cart">Thêm vào giỏ hàng</button>
                            </form>
                        </div>

                        <div class="pc__info position-relative">
                            <p class="pc__category">{{ $product->category->category_name ?? 'N/A' }}</p>
                            <h6 class="pc__title">
                                <a href="{{ route('shop.detail', ['id' => $product->productID]) }}">{{
                                    $product->product_name }}</a>
                            </h6>
                            <div class="product-card__price d-flex gap-2">
                                @if ($product->discount > 0)
                                <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
                                <span class="money price price-old">{{ number_price($product->price) }}</span>
                                @else
                                    <span class="money price">{{ number_price($product->price) }}</span>
                                @endif
                            </div>

                            <!-- Nút Yêu thích -->
                            <div class="product-single__addtolinks">
                                @if (Cart::instance('wishlist')->content()->where('id', $product->productID)->count() >
                                0)
                                <form
                                    action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->productID)->first()->rowId]) }}"
                                    method="POST" id="frm-remove-item-{{ $product->productID }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0);"
                                        class="menu-link menu-link_us-s add-to-wishlist filled-heart"
                                        onclick="document.getElementById('frm-remove-item-{{ $product->productID }}').submit();">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg><span>Xoá khỏi mục yêu thích</span>
                                    </a>
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
                                    <a href="javascript:void(0);" class="menu-link menu-link_us-s add-to-wishlist"
                                        onclick="document.getElementById('wishlist-form-{{ $product->productID }}').submit();">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg><span>Thêm vào mục yêu thích</span>
                                    </a>
                                </form>
                                @endif
                            </div>
                        </div>
                        <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                            @if($product->discount > 0)
                            <div class="pc-labels__right ms-auto">
                              <span class="pc-label pc-label_sale d-block text-white">{{discountPercent($product->price,$product->discount)}}</span>
                            </div>
                            @endif
                          </div>
                    </div>
                </div>
                @endforeach
            </div>


            <nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
                <a href="{{ $products->previousPageUrl() }}" class="btn-link d-inline-flex align-items-center" {{
                    $products->onFirstPage() ? 'disabled' : '' }}>
                    <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_prev_sm" />
                    </svg>
                    <span class="fw-medium">Trước</span>
                </a>
                <ul class="pagination mb-0">
                    @foreach ($products->links()->elements[0] as $page => $url)
                    <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                        <a class="btn-link px-1 mx-2 {{ $products->currentPage() == $page ? 'btn-link_active' : '' }}"
                            href="{{ $url }}">{{ $page }}</a>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ $products->nextPageUrl() }}" class="btn-link d-inline-flex align-items-center" {{
                    $products->hasMorePages() ? '' : 'disabled' }}>
                    <span class="fw-medium me-1">Sau</span>
                    <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_next_sm" />
                    </svg>
                </a>
            </nav>
        </div>
    </section>
</main>
<form id="frmfilter" method="get" action="{{route('shop.index')}}">
    <input type="hidden" name="order" id="order" value="{{$order}}" />
    <input type="hidden" name="brands" id="hdnBrands" />
    <input type="hidden" name="categories" id="hdnCategories" />
    <input type="hidden" name="min" id="hdnMinPrice" value="{{$minPrice}}" />
    <input type="hidden" name="max" id="hdnMaxPrice" value="{{$maxPrice}}" />
</form>
@endsection
@push('scripts')
<script>
    $(function() {
        // Xử lý sự kiện khi người dùng thay đổi giá trị trong dropdown
        $("#orderby").on("change", function() {
            $("#order").val($("#orderby option:selected").val());
            $("#frmfilter").submit();
        });

        // Xử lý sự kiện khi checkbox được chọn
        $("input[name='brands[]']").on("change", function() {
            var brands = [];
            $("input[name='brands[]']:checked").each(function() {
                brands.push($(this).val());
            });

            // Chuyển đổi mảng thành chuỗi ngăn cách bởi dấu phẩy
            $("#hdnBrands").val(brands.join(","));
            
            // Gửi biểu mẫu
            $("#frmfilter").submit();
        });

        // Xử lý sự kiện khi checkbox được chọn
        $("input[name='categories[]']").on("change", function() {
            var categories = [];
            $("input[name='categories[]']:checked").each(function() {
                categories.push($(this).val());
            });

            // Chuyển đổi mảng thành chuỗi ngăn cách bởi dấu phẩy
            $("#hdnCategories").val(categories.join(","));
            
            // Gửi biểu mẫu
            $("#frmfilter").submit();
        });

        $("[name='price_range']").on("change", function () {
            var min = $(this).val().split(',')[0];
            var max = $(this).val().split(',')[1];
            $("#hdnMinPrice").val(min);
            $("#hdnMaxPrice").val(max);
            setTimeout(() => {
                $("#frmfilter").submit();
            }, 1500);
            });
    });
</script>
@endpush