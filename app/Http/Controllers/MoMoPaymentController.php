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


class MomoPaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';  // Partner code bạn nhận được từ MoMo
        $accessKey = 'klm05TvNBzhg7h7j';     // Access key bạn nhận được từ MoMo
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';  // Secret key bạn nhận được từ MoMo
        $orderInfo = "Thanh toán cho đơn hàng " . Session::get('order')['order_code'];
        $amount = intval(Session::get('order')['total_amount']);
        $orderId = time() . "";  // Tạo một mã đơn hàng duy nhất
        $redirectUrl = route('payment.success');  // URL khi thanh toán thành công
        $ipnUrl = route('payment.notify');  // URL để nhận thông báo kết quả từ MoMo
        $extraData = "";  // Có thể để trống nếu không có dữ liệu bổ sung
        $payment_status = $request->payment_status;
        
        // Lưu trạng thái thanh toán vào Session
        Session::put('payment_status', $payment_status);

        $requestId = time() . "";  // Tạo requestId duy nhất
        $requestType = "payWithATM";  // Hoặc "captureWallet" nếu sử dụng ví MoMo

        // Tạo chuỗi rawHash để tính toán chữ ký
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);  // Tính toán chữ ký

        // Dữ liệu gửi tới MoMo API
        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",  // Tên đối tác
            "storeId" => "MomoTestStore",  // ID cửa hàng
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',  // Ngôn ngữ hiển thị
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        // Gửi yêu cầu tới MoMo API
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);


        // Kiểm tra kết quả trả về từ MoMo
        if (isset($jsonResult['payUrl'])) {
            return redirect($jsonResult['payUrl']);  // Chuyển hướng người dùng đến trang thanh toán MoMo
        } else {
            // Hiển thị lỗi nếu không nhận được payUrl từ MoMo
            $errorMessage = isset($jsonResult['message']) ? $jsonResult['message'] : 'Không thể tạo thanh toán MoMo.';
            return back()->with('error', $errorMessage);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $resultCode = $request->resultCode;
        if (Session::has('order')) {
            $orderId = Session::get('order')['order_id'];
            $order = Order::find($orderId);

            if ($order) {
                if ($resultCode == 0) {
                    // Thanh toán thành công
                    $order->payment_status = 'completed';
                } elseif ($resultCode == 1006 || $resultCode == 99) {
                    // Thanh toán thất bại
                    $order->payment_status = 'failed';
                } else {
                    // Thanh toán đang chờ xử lý
                    $order->payment_status = 'pending';
                }
                
                $order->save();
                return redirect()->route('cart.order.confirmation');  // Chuyển hướng tới trang xác nhận đơn hàng
            }

            return back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        return redirect()->route('cart.index');
    }

    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);

        

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);


        curl_close($ch);
        return $result;
    }
}