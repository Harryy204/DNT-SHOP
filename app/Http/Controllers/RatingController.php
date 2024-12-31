<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class RatingController extends Controller
{
    // Phương thức để thêm đánh giá
    public function store(Request $request, $productId)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|nullable|string|max:255',
        ],[
            'rating.required' => 'Trường này là bắt buộc!',
            'rating.min' => 'Số sao ít nhất là 1!',
            'rating.max' => 'Số sao cao nhất là 5!',
            'review.required' => 'Trường này là bắt buộc',
            'review.nullable' => 'Đánh giá không được để trống',
            'review.max' => 'Đánh giá tối đa 255 kí tự'          
        ]);
    
        // Lấy user_id từ auth
        $userId = Auth::id();
    
        // Kiểm tra người dùng có đơn hàng nào với trạng thái 'delivered' cho sản phẩm cụ thể
        $hasDeliveredOrderForProduct = Order::where('user_id', $userId)
            ->where('order_status', 'delivered')
            ->whereHas('order_detail', function ($query) use ($productId) {
                $query->where('variant_id', $productId);
            })
            ->exists();
    
        if (!$hasDeliveredOrderForProduct) {
            return back()->with('error', 'Bạn cần mua sản phẩm này trước khi đánh giá');
        }
    
        // Tạo mới đánh giá
        $rating = new Rating([
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
    
        $rating->save();
    
        return back()->with('success', 'Đánh giá của bạn đã được gửi!');
    }
}
