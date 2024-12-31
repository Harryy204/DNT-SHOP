<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\postController;
use App\Http\Controllers\Admin\tagController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\admin\RatingController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// 
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // contact
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::get('/contacts/{id}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');
    Route::post('/contacts/{id}/reply', [ContactController::class, 'sendReply'])->name('admin.contacts.sendReply');

    //Order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.order');
        Route::get('{code}/detail', [OrderController::class, 'order_detail'])->name('admin.order.detail');
        Route::patch('{id}/status', [OrderController::class, 'update_order_status'])->name('admin.order.status');
        Route::get('/invoice/{id}/download', [OrderController::class, 'downloadInvoice'])->name('invoice.download');
    });

    // banners
    Route::get('/banners', [BannerController::class, 'banners'])->name('admin.banner');
    Route::get('/banners/add', [BannerController::class, 'banner_add'])->name('admin.banner.add');
    Route::post('/banners/store', [BannerController::class, 'banner_store'])->name('admin.banner.store');
    Route::get('/banners/{bannerID}/edit', [BannerController::class, 'banner_edit'])->name('admin.banner.edit');
    Route::put('/banners/update', [BannerController::class, 'banner_update'])->name('admin.banner.update');
    Route::delete('/banners/{bannerID}/delete', [BannerController::class, 'banner_delete'])->name('admin.banner.delete');

    // users
    Route::get('/users', [UserController::class, 'users'])->name('admin.user');
    Route::get('/users/add', [UserController::class, 'user_add'])->name('admin.user.add');
    Route::post('/users/store', [UserController::class, 'user_store'])->name('admin.user.store');
    Route::get('/users/{userID}/edit', [UserController::class, 'user_edit'])->name('admin.user.edit');
    Route::put('/users/update', [UserController::class, 'user_update'])->name('admin.user.update');
    Route::delete('/users/{userID}/delete', [UserController::class, 'user_delete'])->name('admin.user.delete');

    //categories
    Route::get('/categories', [CategoriesController::class, 'categories'])->name('admin.categories');
    Route::get('/categories/add', [CategoriesController::class, 'categories_add'])->name('admin.categories.add');
    Route::post('/categories/store', [CategoriesController::class, 'categories_store'])->name('admin.categories.store');
    Route::get('/categories/{categoriesID}/edit', [CategoriesController::class, 'categories_edit'])->name('admin.categories.edit');
    Route::put('/categories/{categoriesID}/update', [CategoriesController::class, 'categories_update'])->name('admin.categories.update');
    Route::delete('/categories/{categoriesID}/delete', [CategoriesController::class, 'categories_delete'])->name('admin.categories.delete');

    // Products
    Route::prefix('product')->group(function () {
        // Product
        Route::get('', [ProductController::class, 'index'])->name('admin.product');
        Route::get('add', [ProductController::class, 'create'])->name('admin.product.add');
        Route::post('add', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('{productID}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('{productID}/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::patch('featured', [ProductController::class, 'updateFeatured'])->name('admin.product.update.featured');
        Route::delete('{productID}/delete', [ProductController::class, 'destroy'])->name('admin.product.destroy');

        Route::prefix('{productID}/image')->group(function () {
            Route::get('', [ProductImageController::class, 'index'])->name('product.image');
            Route::post('add', [ProductImageController::class, 'store'])->name('product.image.store');
            Route::PATCH('{imageID}/update', [ProductImageController::class, 'update'])->name('product.image.update');
            Route::delete('{imageID}/delete', [ProductImageController::class, 'destroy'])->name('product.image.destroy');
        });

        // Product variant
        Route::prefix('{productID}/variant')->group(function () {
            Route::get('', [ProductVariantController::class, 'index'])->name('product.variant');
            Route::get('add', [ProductVariantController::class, 'create'])->name('product.variant.add');
            Route::post('add', [ProductVariantController::class, 'store'])->name('product.variant.store');
            Route::get('{variantID}/edit', [ProductVariantController::class, 'edit'])->name('product.variant.edit');
            Route::put('{variantID}/update', [ProductVariantController::class, 'update'])->name('product.variant.update');
            Route::delete('{variantID}/delete', [ProductVariantController::class, 'destroy'])->name('product.variant.destroy');
        });

        // Product Color    
        Route::prefix('color')->group(function () {
            Route::get('', [ProductColorController::class, 'index'])->name('product.color');
            Route::post('add', [ProductColorController::class, 'store'])->name('product.color.store');
            Route::get('{colorID}/edit', [ProductColorController::class, 'edit'])->name('product.color.edit');
            Route::put('{colorID}/update', [ProductColorController::class, 'update'])->name('product.color.update');
            Route::delete('{colorID}/delete', [ProductColorController::class, 'destroy'])->name('product.color.destroy');
        });

        // Product Rate
        Route::prefix('rate')->group(function () {
            Route::get('', [RatingController::class, 'index'])->name('product.rate');
            Route::post('add', [RatingController::class, 'store'])->name('product.rate.store');
            Route::get('{rateID}/edit', [RatingController::class, 'edit'])->name('product.rate.edit');
            Route::put('{rateID}/update', [RatingController::class, 'update'])->name('product.rate.update');
            Route::delete('{rateID}/delete', [RatingController::class, 'destroy'])->name('product.rate.destroy');
        });

        // Product Size
        Route::prefix('size')->group(function () {
            Route::get('', [ProductSizeController::class, 'index'])->name('product.size');
            Route::post('add', [ProductSizeController::class, 'store'])->name('product.size.store');
            Route::get('{sizeID}/edit', [ProductSizeController::class, 'edit'])->name('product.size.edit');
            Route::put('{sizeID}/update', [ProductSizeController::class, 'update'])->name('product.size.update');
            Route::delete('{sizeID}/delete', [ProductSizeController::class, 'destroy'])->name('product.size.destroy');
        });
    });

    //tag
    Route::get('tag', [tagController::class, 'tag'])->name('tag');
    Route::get('tag/create', [tagController::class, 'create'])->name('tag.create');
    Route::post('tag/store', [tagController::class, 'store'])->name('tag.store');
    Route::get('tag/edit/{id}', [tagController::class, 'edit'])->name('tag.edit');
    Route::put('tag/update/{id}', [tagController::class, 'update'])->name('tag.update');
    Route::delete('tag/delete/{id}', [tagController::class, 'destroy'])->name('tag.destroy');

    //post
    Route::get('post', [postController::class, 'post'])->name('post');
    Route::get('post/create', [postController::class, 'create'])->name('post.create');
    Route::post('post/store', [postController::class, 'store'])->name('post.store');
    Route::get('post/edit/{id}', [postController::class, 'edit'])->name('post.edit');
    Route::put('post/update/{id}', [postController::class, 'update'])->name('post.update');
    Route::delete('post/delete/{id}', [postController::class, 'destroy'])->name('post.destroy');
    Route::post('post/store', [postController::class, 'store'])->name('post.store');
    Route::get('post/edit/{id}', [postController::class, 'edit'])->name('post.edit');
    Route::put('post/update/{id}', [postController::class, 'update'])->name('post.update');
    Route::delete('post/delete/{id}', [postController::class, 'destroy'])->name('post.destroy');

    //Comments 
    Route::get('comments/search', [CommentController::class, 'search_comments'])->name('search_comments');
    Route::resource('comments', CommentController::class);
    Route::get('/promotions/search', [PromotionController::class, 'search'])->name('promotions.search');
    Route::resource('promotions', PromotionController::class);
    Route::resource('brands', BrandController::class);
    Route::get('post/comments/{id}', [CommentController::class, 'show'])->name('post.comments');
    Route::post('/promotions/{id}/activate', [PromotionController::class, 'activate'])->name('promotions.activate');

    // api 
    Route::get('/api/top-products', [DashboardController::class, 'topProducts']);
    Route::get('/api/revenue', [DashboardController::class, 'revenueData']);
});
