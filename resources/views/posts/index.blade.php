@extends('layouts.layout')

@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">

        <div class="text-center">
            <nav aria-label="breadcrumb" class="text-center">
                <ol class="breadcrumb justify-content-center m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                </ol>
            </nav>

            <h2 class="page-title">Tin tức</h2>
        </div>


        <div class="about-us__content d-flex justify-content-center pb-5 mb-5 row">
            <!-- Left -->
            <div class="col-8 cols-md-12">
                @foreach($posts as $post)
                <div class="card mb-3 border border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="{{ route('post.details',['id' => $post->postID]) }}">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><a href="{{ route('post.details',['id' => $post->postID]) }}">{{ $post->title }}</a></h5>
                                <p class="card-text">{!! Str::limit($post->content, 200) !!}</p>
                                <p class="card-text">
                                    <small class="text-body-secondary">{{ $post->created_at->format('d-m-Y')}} - </small>
                                    <small class="text-body-secondary">{{ $post->views }} lượt xem</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <!-- Right -->
            <div class="col-4 d-none d-md-block">
                <h3 style="font-weight: bold;">Có Gì Hot?</h3>
                <div class="products-grid row row-cols-md-2" id="products-grid">
                    @foreach($products as $product)
                    <div class="product-card-wrapper">
                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        @foreach($product->images as $image)
                                        <div class="swiper-slide">
                                            <a href="{{ route('shop.detail', ['id' => $product->productID]) }}">
                                                <img loading="lazy" src="{{ $image->image_url}}" width="330"
                                                    height="400" alt="{{ $product->product_name }}" class="pc__img"></a>
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
                            </div>

                            <div class="pc__info position-relative">
                                <p class="pc__category">{{ $product->category->category_name }}</p>
                                <h6 class="pc__title"><a href="{{ route('shop.detail', ['id' => $product->productID]) }}">{{ $product->product_name }}</a></h6>
                                <div class="product-card__price d-flex gap-2">
                                    @if ($product->discount > 0)
                                    <span class="money price price-sale">{{ number_price($product->discount > 0 ? $product->price-$product->discount : $product->price) }}</span>
                                    <span class="money price price-old">{{ number_price($product->price) }}</span>
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
    </section>


</main>
@endsection