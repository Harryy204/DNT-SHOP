<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        // Đếm só lượng đơn hàng
        $ordersCount = Order::selectRaw('
                COUNT(CASE WHEN order_status = "pending" THEN 1 END) AS pending_orders,
                COUNT(CASE WHEN order_status = "processing" THEN 1 END) AS processing_orders,
                COUNT(CASE WHEN order_status = "shipped" THEN 1 END) AS shipping_orders,
                COUNT(CASE WHEN order_status = "delivered" THEN 1 END) AS completed_orders
            ')->first();

        // Lấy doanh thu 
        $revenue = Order::selectRaw('
                SUM(CASE WHEN order_status = "delivered" AND DATE(created_at) = CURDATE() THEN total_amount ELSE 0 END) AS today_revenue,
                SUM(CASE WHEN order_status = "delivered" AND created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN total_amount ELSE 0 END) AS last_7_days_revenue,
                SUM(CASE WHEN order_status = "delivered" AND created_at >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) THEN total_amount ELSE 0 END) AS month_revenue,
                SUM(CASE WHEN order_status = "delivered" AND created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) THEN total_amount ELSE 0 END) AS year_revenue
            ')->first();

        $orders = Order::take(5)->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', [
            'ordersCount' => $ordersCount,
            'revenue' => $revenue,
            'orders' => $orders
        ]);
    }

    public function topProducts(Request $request)
    {
        $filter = $request->input('filter', 'yearly');
        $startDate = Carbon::parse($request->input('startDate'))->startOfDay();
        $endDate = Carbon::parse($request->input('endDate'))->endOfDay();

        $current = Carbon::now()->endOfDay();
        $last7Days = Carbon::now()->subDays(6)->startOfDay();
        $last30Days = Carbon::now()->subDays(29)->startOfDay();
        $last12Months = Carbon::now()->subMonths(12)->startOfMonth();

        if ($filter === 'weekly') {
            $lastDay = $last7Days;
        } elseif ($filter === 'monthly') {
            $lastDay = $last30Days;
        } elseif ($filter === 'yearly') {
            $lastDay = $last12Months;
        } elseif ($filter === 'date') {
            $lastDay = $startDate;
            $current = $endDate;
        } else {
            return response()->json(['error' => 'Invalid filter'], 400);
        }

        $topProducts = Order_detail::join('product_variants', 'order_detail.variant_id', '=', 'product_variants.variantID')
            ->join('products', 'product_variants.product_id', '=', 'products.productID')
            ->join('orders', 'order_detail.order_id', '=', 'orders.orderID')
            ->where('orders.order_status', 'delivered')
            ->WhereBetWeen('orders.created_at', [$lastDay, $current])
            ->selectRaw('products.product_name, SUM(order_detail.quantity) as total_sales')
            ->groupBy('products.product_name')
            ->orderByDesc('total_sales')
            ->get();
        return response()->json($topProducts);
    }

    public function revenueData(Request $request)
    {
        $filter = $request->input('filter', 'yearly');
        $startDate = Carbon::parse($request->input('startDate'))->startOfDay();
        $endDate = Carbon::parse($request->input('endDate'))->endOfDay();

        $current = Carbon::now()->endOfDay();
        $last7Days = Carbon::now()->subDays(6)->startOfDay();
        $last30Days = Carbon::now()->subDays(29)->startOfDay();
        $last12Months = Carbon::now()->subMonths(12)->startOfMonth();

        $categories = [];
        $revenueData = [];
        $orderCountData = [];

        $query = Order::where('order_status', 'delivered');

        $getAggregatedData = function ($groupByField, $startDate, $endDate) use ($query) {
            return $query->selectRaw("SUM(total_amount) as total, $groupByField(created_at) as group_field")
                ->whereBetween('created_at', [$startDate, $endDate])
                ->groupBy('group_field')
                ->orderByDesc('group_field')
                ->pluck('total', 'group_field')
                ->toArray();
        };

        $getCountData = function ($groupByField, $startDate, $endDate) use ($query) {
            return $query->selectRaw("COUNT(*) as quantity, $groupByField(created_at) as group_field")
                ->whereBetween('created_at', [$startDate, $endDate])
                ->groupBy('group_field')
                ->orderByDesc('group_field')
                ->pluck('quantity', 'group_field')
                ->toArray();
        };

        switch ($filter) {
            case 'date':
                $data = $getAggregatedData('DATE', $startDate, $endDate);
                $orderCount = $getCountData('DATE', $startDate, $endDate);

                $period = Carbon::parse($startDate)->daysUntil($endDate);

                foreach ($period as $date) {
                    $formattedDate = $date;
                    $categories[] = $formattedDate->format('d');
                    $revenueData[] = $data[$formattedDate->format('Y-m-d')] ?? 0;
                    $orderCountData[] = $orderCount[$formattedDate->format('Y-m-d')] ?? 0;
                }
                break;
            case 'weekly':
                $data = $getAggregatedData('DATE', $last7Days, $current);
                $orderCount = $getCountData('DATE', $last7Days, $current);
                $period = Carbon::parse($last7Days)->daysUntil($current);

                foreach ($period as $date) {
                    $categories[] = $date->format('d/m');
                    $revenueData[] = $data[$date->format('Y-m-d')] ?? 0;
                    $orderCountData[] = $orderCount[$date->format('Y-m-d')] ?? 0;
                }
                break;
            case 'monthly':
                $data = $getAggregatedData('DATE', $last30Days, $current);
                $orderCount = $getCountData('DATE', $last30Days, $current);

                $period = Carbon::parse($last30Days)->daysUntil($current);
                // dd($period,$data,$orderCount);
                foreach ($period as $date) {
                    $categories[] = $date->format('d/m');
                    $revenueData[] = $data[$date->format('Y-m-d')] ?? 0;
                    $orderCountData[] = $orderCount[$date->format('Y-m-d')] ?? 0;
                }
                break;
            case 'yearly':
                $data = $getAggregatedData('MONTH',$last12Months, $current);
                $orderCount = $getCountData('MONTH', $last12Months, $current);
                for ($i = 1; $i <= 12; $i++) {
                    $categories[] = 'T' . $i;
                    $revenueData[] = $data[$i] ?? 0;
                    $orderCountData[] = $orderCount[$i] ?? 0;
                }
                break;
            default:
                return response()->json([
                    'error' => 'Lỗi dữ liệu trả về.',
                ], 400);
        }

        return response()->json([
            'categories' => $categories,
            'revenue' => $revenueData,
            'orderCount' => $orderCountData
        ]);
    }
}
