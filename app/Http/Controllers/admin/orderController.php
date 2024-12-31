<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Order_detail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request['filter'];
        $search = $request['search'];

        // Bắt đầu truy vấn đơn hàng
        $orders = Order::query();

        if (isset($filter)) {
            $orders->where('order_status', $filter);
        }

        if (isset($search)) {
            $orders->where('order_code', 'like', '%' . $search . '%');
        }

        $orders = $orders->orderBy('created_at', 'desc')->paginate(12);

        return view('admin.order.list', compact('orders', 'filter', 'search'));
    }

    public function order_detail(Request $request, $code)
    {
        $order = Order::where('order_code', $code)->first();
        $orderDetails = Order_detail::where('order_id', $order->orderID)->get();
        return view('admin.order.detail', compact('orderDetails', 'order'));
    }

    public function update_order_status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request['order_status'];
        $typeOrder = 'đơn hàng';

        $order->save();
        Mail::to($order->user->email)->send(new OrderShipped($order));
        return redirect()->route('admin.order')->with('success', 'Thay đổi trạng thái ' . $typeOrder . ': ' . $order->order_code . ' thành công');
    }

    public function downloadInvoice($id)
    {
        $order = Order::findOrFail($id);

        $pdf = Pdf::loadView('admin.order.invoice', compact('order'));
        // return view('admin.order.invoice', compact('order'));
        return $pdf->stream('Hoa_don_' . $order->order_code . '.pdf');
    }
}
