<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\product_variant;
use App\Http\Controllers\MoMoPaymentController;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        // dd($items['03a7d2b896bc6702e6dba30e01685fcb']->options);
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $color_id = $request->input('color_id', null);
        $size_id = $request->input('size_id', null);

        $product = Product::with(['colors', 'sizes', 'images'])->find($id);

        $productVariant = product_variant::where('product_id', $id);
        if ($color_id && $size_id) {
            $productVariant->where('color_id', $color_id)->where('size_id', $size_id);
        }else if($color_id){
            $productVariant->where('color_id', $color_id);
        }

        $productVariant = $productVariant->first();
        if ($productVariant && $quantity <= $productVariant->quantity) {
            $colorName = $product->colors->firstWhere('colorID', $color_id)->color_name ?? 'Không có';
            $sizeName = $product->sizes->firstWhere('sizeID', $size_id)->size_name ?? 'Không có';
            $imageUrl = $product->images->isNotEmpty() ? $product->images->first()->image_url : 'default_image.jpg';

            Cart::instance('cart')->add($id, $name, $quantity, $price, 
            [
                'image_url' => $imageUrl,
                'color_name' => $colorName,
                'size_name' => $sizeName,
                'color_id' => $color_id,
                'size_id' => $size_id,
                'variant_id' => $productVariant->variantID,
            ]);

            session()->flash('success', 'Đã thêm sản phẩm vào giỏ hàng!');
        } else {
            if ($productVariant->color_id) {
                $colorName = $color_id ? $productVariant->colors->color_name : 'N/A';
                $imageUrl = $product->images->isNotEmpty() ? $product->images->first()->image_url : 'default_image.jpg';

                Cart::instance('cart')->add($id, $name, $quantity, $price, [
                    'image_url' => $imageUrl,
                    'color_name' => $colorName,
                    'color_id' => $color_id,
                    'size_id' => $size_id,
                    'variant_id' => $productVariant->variantID
                ]);

                session()->flash('success', 'Đã thêm sản phẩm vào giỏ hàng!');
            } else {
                session()->flash('error', 'Số lượng sản phẩm trong kho không đủ!');
            }
        }

        return redirect()->back();
    }



    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if ($product) {
            $variant = product_variant::where('product_id', $product->id)
                ->where('color_id', $product->options->color_id)
                ->where('size_id', $product->options->size_id)
                ->first();

            if ($variant && $product->qty < $variant->quantity) {
                $variant->quantity -= 1;
                $variant->save();
                Cart::instance('cart')->update($rowId, $product->qty + 1);
            } else {
                session()->flash('error', 'Không thể thêm nhiều hơn số lượng sản phẩm trong kho');
            }
        }
        return redirect()->back();
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if ($product) {
            if ($product->qty > 1) {
                $variant = product_variant::where('product_id', $product->id)
                    ->where('color_id', $product->options->color_id)
                    ->where('size_id', $product->options->size_id)
                    ->first();

                // Cập nhật số lượng trong kho
                $variant->quantity += 1;
                $variant->save();

                // Giảm số lượng trong giỏ hàng
                Cart::instance('cart')->update($rowId, $product->qty - 1);
            } else {
                session()->flash('error', 'Không thể giảm số lượng sản phẩm bé hơn 1!');
            }
        }
        return redirect()->back();
    }

    public function remove_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request)
    {

        $coupon_code = $request->input('coupon_code');

        if ($coupon_code) {
            $coupon = Promotion::where('code', $coupon_code)
                ->where('status', 'active')
                ->whereDate('start_date', '<=', Carbon::today())
                ->whereDate('end_date', '>=', Carbon::today())
                ->first();

            if ($coupon) {
                $cartSubtotal = (float) str_replace(',', '', Cart::instance('cart')->subtotal());

                if ($cartSubtotal >= $coupon->cart_total) {

                    $discount = $coupon->discount_type == 'fixed'
                        ? $coupon->discount_value
                        : $cartSubtotal - (($coupon->discount_value * $cartSubtotal) / 100);

                    if ($discount >= $cartSubtotal) {

                        $newSubtotal = 0;
                        // $tax = 0;
                        $total = 0;
                    } else {
                        $newSubtotal = $cartSubtotal - $discount;
                        // $taxRate = 0.1;
                        // $tax = $newSubtotal * $taxRate;
                        $total = $newSubtotal;
                    }
                    // $newSubtotal = $cartSubtotal - $discount;
                    // $total = $newSubtotal;

                    Session::put('coupon', [
                        'code' => $coupon->code,
                        'discount' => $discount,
                        'subtotal' => $newSubtotal,
                        'tax' => 0,
                        'total' => $total,
                        'promotion_id' => $coupon->promotionID,
                    ]);

                    return redirect()->back()->with('status', 'Mã giảm giá đã được áp dụng!');
                } else {
                    return redirect()->back()->with('error', 'Giá trị giỏ hàng chưa đủ để áp dụng mã giảm giá này.');
                }
            } else {
                return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ hoặc đã hết hạn.');
            }
        }

        return redirect()->back()->with('error', 'Vui lòng nhập mã giảm giá hợp lệ.');
    }


    public function remove_coupon_code()
    {
        Session::forget('coupon');
        return redirect()->back()->with('status', 'Mã giảm giá đã được xoá!');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        return view('checkout', compact('user'));
    }

    public function place_an_order(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'landmark' => 'required|string|max:255',
                'checkout_payment_method' => 'required|in:cash,momo,bank_transfer',
            ],
            [
                'name.required' => 'Vui lòng nhập họ và tên.',
                'phone.required' => 'Vui lòng nhập số điện thoại.',
                'landmark.required' => 'Vui lòng nhập địa chỉ nhận hàng.',
                'checkout_payment_method.required' => 'Vui lòng chọn phương thức thanh toán.',
                'checkout_payment_method.in' => 'Phương thức thanh toán không hợp lệ.',
            ]
        );

        $user = Auth::user();
        $user->address = $request->landmark;
        $user->phone = $request->phone;
        $user->save();

        $orderCode = strtoupper('ODNT' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT));
        $discountValue = Session::has('coupon') ? Session::get('coupon')['discount'] : 0;

        $totalAmount = Session::has('coupon') ? Session::get('coupon')['total'] : Cart::instance('cart')->total();
        $totalAmount = str_replace(',', '', $totalAmount);
        $totalAmount = floatval($totalAmount);

        $order = new Order();
        $order->order_code = $orderCode;
        $order->total_amount = $totalAmount;
        $order->payment_method = (string) $request->checkout_payment_method;
        $order->payment_status = ($request->checkout_payment_method == 'cash') ? 'paid on delivery' : 'pending';
        $order->shipping_fee = 0;
        $order->order_status = 'pending';
        $order->user_id = $user->userID;
        $order->promotion_id = Session::has('coupon') && isset(Session::get('coupon')['promotion_id']) ? Session::get('coupon')['promotion_id'] : null;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderDetail = new Order_detail();
            $orderDetail->variant_id = $item->options->variant_id;
            $orderDetail->order_id = $order->orderID;
            $orderDetail->quantity = $item->qty;
            $orderDetail->price = $item->price;
            $orderDetail->save();

            $productVariant = product_variant::find($item->options->variant_id);
            if ($productVariant) {
                $productVariant->quantity -= $item->qty;
                $productVariant->save();
            }
        }

        Cart::instance('cart')->destroy();
        Session::forget('coupon');
        Session::forget('checkout');
        Session::put('order',[
            'order_id'=> $order->orderID,
            'order_code'=> $orderCode,
            'total_amount' => $order->total_amount
        ]);   
        if ($request->checkout_payment_method == 'cash') {
            return redirect()->route('cart.order.confirmation')->with('status', 'Đơn hàng đã được đặt thành công!');
        }else if($request->checkout_payment_method == 'momo') {
            return redirect()->route('payment.momo');
        }
        
    }

    public function order_confirmation(Request $request)
    {
        if (Session::has('order')) {
            $orderID = Session::get('order')['order_id'];
            $order = Order::with('order_detail.product_variant.products')->find($orderID);
            if(Session::has('payment_status') && Session::has('payment_status') == 'update'){
                $view = redirect()->route('account.order.detail',['order_code' => Session::get('order')['order_code']])->with('status', 'Thanh toán thành công');
            }else {
                $view = view('order-confirmation', compact('order'));
            }
            Session::forget('order');
            Session::forget('payment_status');
            return $view ;
        }
        return redirect()->route('cart.index');
    }
}
