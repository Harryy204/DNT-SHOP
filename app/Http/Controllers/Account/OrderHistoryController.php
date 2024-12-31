<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderHistoryController extends Controller
{
    private $order_status_class = [
        'pending' => 'status-pending',
        'processing' => 'status-processing',
        'shipped' => 'status-shipped',
        'delivered' => 'status-delivered',
        'cancelled' => 'status-cancelled',
        'refunded' => 'status-refunded'
    ];

    private $payment_status_class = [
        'pending' => 'status-pending',
        'completed' => 'status-delivered',
        'failed' => 'status-cancelled',
        'refunded' => 'status-refunded',
        'paid on delivery' => 'status-processing'
    ];

    public function listOrderHistory(Request $request)
    {
        $order_status_class = $this->order_status_class;
        $payment_status_class = $this->payment_status_class;
        $orders = Order::where('user_id', Auth::user()->userID)->orderBy('created_at','desc');
        $type = $request->type ;
        if ($type == 2) {
            // Chờ thanh toán
            $orders->where('payment_status','pending');
        } elseif ($type == 3) {
            // Vận chuyển
            $orders->where('order_status','shipped');
        } elseif ($type == 4) {
            // Hoàn thành
            $orders->where('order_status','delivered');
        } elseif ($type == 5) {
            // Đã hủy
            $orders->where('order_status','cancelled');
        } elseif ($type == 6) {
            // Đã hoàn tiền
            $orders->where('order_status','refunded');
        }else {
            $type = 1 ;
        }

        $orders = $orders->paginate(12);
        return view('account.orderHistory', [
            'orders' => $orders,
            'type' => $type,
            'order_status_class' => $order_status_class,
            'payment_status_class' => $payment_status_class
        ]);

    }

    public function orderDetailHistory($order_code)
    {
        $order_status_class = $this->order_status_class;
        $payment_status_class = $this->payment_status_class;
        $order = Order::where('order_code', $order_code)->first();
        if (!$order) {
            return abort(404);
        }
        $orderDetails = Order_detail::where('order_id', $order->orderID)->get();
        if($order->payment_method == 'momo' && ($order->payment_status == 'pending' || $order->payment_status == 'failed')){
            Session::put('order',[
                'order_id'=> $order->orderID,
                'order_code'=> $order->order_code,
                'total_amount' => $order->total_amount
            ]); 
        }
        return view('account.orderDetailHistory', [
            'order_status_class' => $order_status_class,
            'order' => $order,
            'orderDetails' => $orderDetails,
            'payment_status_class' => $payment_status_class
        ]);
    }

    public function cancelOrder(Request $request)
    {
        $orderID = $request->input('orderID');
        $order = Order::find($orderID);
        $order->order_status = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
    }
}
