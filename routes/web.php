<?php

use App\Http\Controllers\Account\MyAccountController;
use App\Http\Controllers\Account\OrderHistoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Client\shopController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\Admin\postController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\Admin\tagController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoMoPaymentController;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog
Route::resource('posts', postController::class);
Route::get('post/details/{id}', [postController::class, 'post_details'])->name('post.details');

// Trang giảm giá
Route::get('/promotions/index', [PromotionController::class, 'index_promotions'])->name('promotions.index_promotions');

// Góp ý phản hồi
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'storeContact'])->name('contact.store');

// Giới thiệu
Route::get('about-us', [HomeController::class, 'about'])->name('about');

// search
Route::get('/search', [HomeController::class, 'search'])->name('home.search');

// privacy-policy
Route::view('/privacy-policy', 'layouts.privacy-policy')->name('privacy-policy');

// shop
Route::get('/shop', [shopController::class, 'index'])->name('shop.index');
Route::get('/shop/detail/{id}', [shopController::class, 'detail'])->name('shop.detail');

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-quantity/{rowId}', [CartController::class, 'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('/cart/decrease-quantity/{rowId}', [CartController::class, 'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove_item'])->name('cart.item.remove');
Route::delete('/cart/clear', [CartController::class, 'empty_cart'])->name('cart.empty');
Route::post('/cart/update-color', [CartController::class, 'updateColor']);
Route::post('/cart/update-size', [CartController::class, 'updateSize']);

// wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add', [WishlistController::class, 'add_to_wishlist'])->name('wishlist.add');
Route::delete('/wishlist/item/remove/{rowId}', [WishlistController::class, 'remove_item'])->name('wishlist.item.remove');
Route::delete('/wishlist/clear', [WishlistController::class, 'empty_wishlist'])->name('wishlist.empty');
Route::post('/wishlist/move-to-cart/{rowId}', [WishlistController::class, 'move_to_cart'])->name('wishlist.move.to.cart');

Route::middleware(['auth','verified'])->group(function () {
    // Tài khoản của tôi 
    Route::prefix('my-account')->group(function () {
        Route::get('', [MyAccountController::class, 'index'])->name('account');
        Route::post('update-information', [MyAccountController::class, 'store'])->name('account.store');
        Route::post('change-password', [MyAccountController::class, 'changePassword'])->name('account.change');

        Route::prefix('orders')->group(function () {
            Route::get('', [OrderHistoryController::class, 'listOrderHistory'])->name('account.order');
            Route::get('{order_code}', [OrderHistoryController::class, 'orderDetailHistory'])->name('account.order.detail');
            Route::put('cancel', [OrderHistoryController::class, 'cancelOrder'])->name('account.order.cancel');
        });
    });

    // checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/place-an-order', [CartController::class, 'place_an_order'])->name('cart.place.an.order');
    Route::get('/order-confirmation', [CartController::class, 'order_confirmation'])->name('cart.order.confirmation');

    // Thanh toán momo
    Route::get('/payment', [MoMoPaymentController::class, 'createPayment'])->name('payment.momo');
    Route::get('/payment-success', [MoMoPaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::post('/payment-notify', function () {
        return response()->json(['status' => 'success']);
    })->name('payment.notify');

    // coupon
    Route::post('/cart/coupon-apply', [CartController::class, 'apply_coupon_code'])->name('cart.coupon.apply');
    Route::delete('/cart/remove-coupon', [CartController::class, 'remove_coupon_code'])->name('cart.coupon.remove');

    // rating
    Route::post('/product/{id}/review', [RatingController::class, 'store'])->name('product.review');

    // comment blog
    Route::resource('comments', CommentController::class);
});
