@extends('layouts.layout')
@push('styles')
<style>
    .post-detail .post-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .post-detail .post-meta {
        font-size: 0.875rem;
        /* Nhỏ hơn nội dung chính */
        color: #6c757d;
        /* Màu xám nhạt */
        margin-bottom: 20px;
    }

    .post-detail .post-meta span {
        display: inline-flex;
        align-items: center;
    }

    .post-detail .post-meta a {
        color: #007bff;
        text-decoration: none;
    }

    .post-detail .post-meta a:hover {
        text-decoration: underline;
    }

    .post-detail .post-meta i {
        margin-right: 5px;
        color: #6c757d;
        /* Màu xám cho icon */
    }

    .comments-section {
        border-top: 1px solid #ddd;
        padding-top: 20px;
    }

    .comments-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .comment-form textarea {
        resize: none;
        /* Ngăn người dùng thay đổi kích thước */
    }

    .comments-list .comment {
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 15px;
    }

    .comment-header img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .comment-author {
        font-size: 1rem;
    }

    .comment-date {
        margin-left: 10px;
    }

    .comment-body {
        font-size: 0.95rem;
        color: #555;
    }


    .tags-title {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    .tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tag {
        font-size: 0.875rem;
        color: #000;
    }
</style>
@endpush
@section('main')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <div class="about-us__content d-flex justify-content-center pb-5 mb-5 row">
            <!-- Left -->
            <div class="col-8 cols-md-12">
                <h1 class="page-title mt-4 mb-0">{{ $post->title }}</h1>

                <div class="post-meta text-muted small d-flex align-items-center gap-3 mb-5">
                    <span class="views"><i class="bi bi-eye"></i>{{ $post->views }} Lượt xem</span>
                    <span class="date"><i class="bi bi-calendar"></i>{{ $post->created_at->format('d-m-Y')}}</span>
                </div>

                <img src="{{ $post->image }}" class="img-fluid mb-3" alt="{{ $post->title }}">

                <div class="content">
                    {!! $post->content !!}
                </div>

                <div class="tags-section d-flex gap-2">
                    <h3 class="tags-title">Tags:</h3>
                    <div class="tags-list">
                        @foreach($tags as $tag)
                        <p class="tag">{{ $tag->tag_name }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="comments-section">
                    <h2 class="comments-title">Bình Luận</h2>

                    <!-- Form gửi bình luận -->
                    <form class="comment-form mb-4" method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <textarea class="form-control" rows="4" name="content" placeholder="Viết suy nghĩ của bạn..."></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->postID }}">
                        <button type="submit" class="btn btn-primary mt-2">Gửi bình luận</button>
                    </form>

                    <!-- Danh sách bình luận -->
                    <ul class="comments-list list-unstyled">
                        @foreach($comments as $comment)
                        <li class="comment mb-4">
                            <div class="comment-header d-flex align-items-center mb-2">
                                <img src="{{ $comment->user->avatar }}" class="rounded-circle me-3" alt="User Avatar">
                                <div>
                                    <span class="comment-author fw-bold">{{ $comment->user->full_name }}</span>
                                    <span class="comment-date text-muted small">{{ $comment->created_at->format('H:s d-m-Y') }}</span>
                                </div>
                            </div>
                            <div class="comment-body">
                                {{ $comment->content }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
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

                <h3 style="font-weight: bold;">Bài viết mới</h3>
                <div class="products-grid row row-cols-md-2" id="products-grid">
                    @foreach($posts as $post)
                    <div class="product-card-wrapper">
                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a href="{{ route('post.details', ['id' => $post->postID]) }}">
                                                <img loading="lazy" src="{{ $post->image}}" width="330"
                                                    height="400" alt="{{ $post->title }}" class="pc__img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title"><a href="{{ route('post.details', ['id' => $post->postID]) }}">{{ $post->title }}</a></h6>
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