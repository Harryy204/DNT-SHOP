@extends('layouts.layout')
@section('main')
<!-- <section class="container">
    <h1 class="text-center mt-2">Mã Khuyến mãi</h1>
    <div class="row">
        @foreach($promotions as $promotion)
        <article class="card">
            <section class="date">
                <time datetime="{{ \Carbon\Carbon::parse($promotion->start_date)->format('Y-m-d') }}">
                    <span>{{ \Carbon\Carbon::parse($promotion->start_date)->format('d') }}</span>
                    <span>{{ \Carbon\Carbon::parse($promotion->start_date)->format('M') }}</span>
                </time>
            </section>

            <section class="card-cont">
                <small>{{ $promotion->discount_type }}</small>
                <h3>
                    @if($promotion->discount_type == 'Phần trăm')
                    Giảm {{ $promotion->discount_value }}%
                    @else
                    Giảm {{ number_format($promotion->discount_value, 0, ',', '.') }} VND
                    @endif
                </h3>

                <div class="even-date">
                    <i class="fa fa-calendar"></i>
                    <time>
                        <span>Từ {{ \Carbon\Carbon::parse($promotion->start_date)->format('d/m/Y') }}</span>
                        <span>đến {{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }}</span>
                    </time>
                </div>

                <div class="code">
                    <span hidden id="code{{ $promotion->id }}">{{ $promotion->code }}</span>
                    <button onclick="copyCode('code{{ $promotion->id }}')">Sao chép mã</button>
                </div>
            </section>
        </article>
        @endforeach
    </div>
</section> -->
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">

        <div class="text-center">
            <nav aria-label="breadcrumb" class="text-center">
                <ol class="breadcrumb justify-content-center m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mã giảm giá</li>
                </ol>
            </nav>

            <h2 class="page-title">Mã giảm giá</h2>
        </div>


        <div class="about-us__content d-flex justify-content-center pb-5 mb-5 row">
            <!-- Left -->
            <div class="col-8 cols-md-12">
                @foreach($promotions as $promotion)
                <div class="card mb-3 border border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="">
                                <img src="https://chogym.vn/wp-content/uploads/2021/06/ma-giam-gia-chogym.vn_.png" alt="mã giảm giá">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">
                                    @if($promotion->discount_type == 'percentage')
                                    Giảm {{ number_format($promotion->discount_value, 0, ',', '.') }}%
                                    @else
                                    Giảm {{ number_format($promotion->discount_value, 0, ',', '.') }} VND
                                    @endif
                                </h4>
                                <span>
                                    Mã khuyến mãi: <strong>{{ $promotion->code }}</strong>
                                </span> <br>
                                <time class="card-text">
                                    <i class="fa fa-calendar"></i>
                                    <span class="text-body-secondary">Từ {{ \Carbon\Carbon::parse($promotion->start_date)->format('d/m/Y') }}</span>
                                    <span class="text-body-secondary">đến {{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }}</span>
                                </time>
                                <br>
                                <hr>
                                <span hidden id="code{{ $promotion->promotionID }}">{{ $promotion->code }}</span>
                                <button onclick="copyCode('code{{ $promotion->promotionID }}')">Sao chép mã</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $promotions->links('pagination::bootstrap-5') }}
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
@push('scripts')
<script>
    function copyCode(codeId) {
    const codeElement = document.getElementById(codeId);
    const code = codeElement.innerText;
    
    // Kiểm tra nếu mã có tồn tại trước khi sao chép
    if (code) {
        navigator.clipboard.writeText(code)
            .then(() => {
                alert(`Đã sao chép mã: ${code}`);
            })
            .catch(err => {
                console.error('Không thể sao chép mã: ', err);
                alert('Có lỗi xảy ra khi sao chép mã.');
            });
    } else {
        alert('Không tìm thấy mã giảm giá!');
    }
}

</script>
@endpush