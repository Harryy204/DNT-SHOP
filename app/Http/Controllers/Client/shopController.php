<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Rating;

class shopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::orderBy('category_name', 'asc')->get();;
        $brands = Brand::orderBy('brand_name', 'asc')->get();
        $order = $request->query('order') ?? -1;
        $o_column = "";
        $o_order = "";
        $f_brands = $request->query('brands');
        $f_categories = $request->query('categories');
        $minPrice = $request->query('min', Product::min('price'));
        $maxPrice = $request->query('max', Product::max('price'));

        $query = Product::with(['images', 'category', 'brand']);

        // Điều kiện sắp xếp
        if ($order == 1) {
            $query->where('featured', 1);
            $o_order = 'desc';
        }elseif($order == 8){
            $query->where('discount','>' ,0);
        }

        switch ($order) {
            case 2: // Sắp xếp từ A-Z theo tên sản phẩm
                $o_column = 'product_name';
                $o_order = 'asc';
                break;
            case 3: // Sắp xếp từ Z-A theo tên sản phẩm
                $o_column = 'product_name';
                $o_order = 'desc';
                break;
            case 4: // Sắp xếp từ giá thấp tới cao
                $o_column = 'price';
                $o_order = 'asc';
                break;
            case 5: // Sắp xếp từ giá cao tới thấp
                $o_column = 'price';
                $o_order = 'desc';
                break;
            case 6: // Sắp xếp theo cũ nhất
                $o_column = 'created_at';
                $o_order = 'asc';
                break;
            case 7: // Sắp xếp theo mới nhất
                $o_column = 'created_at';
                $o_order = 'desc';
                break;
            default: // Mặc định
                $o_column = 'productID';
                $o_order = 'desc';
        }

        if ($o_column) {
            $query->orderBy($o_column, $o_order);
        }
        // Lọc sản phẩm theo danh mục
        if (!empty($f_categories)) {
            $categoriesArray = explode(',', $f_categories);
            $query->whereIn('category_id', $categoriesArray);
        }
        // Lọc sản phẩm theo thương hiệu
        if (!empty($f_brands)) {
            $brandsArray = explode(',', $f_brands);
            $query->whereIn('brand_id', $brandsArray);
        }
        // Điều kiện lọc theo khoảng giá nếu có giá trị
        if (!empty($minPrice) && !empty($maxPrice)) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        $products = $query->paginate(12);

        return view('shop', compact('products', 'brands', 'categories', 'minPrice', 'maxPrice', 'order', 'f_brands', 'f_categories'));
    }

    public function detail($id)
    {
        $categories = Categories::all();
        $brands = Brand::all();
        $product = Product::with(['images', 'category', 'brand', 'sizes', 'colors'])->findOrFail($id);
        $product->increment('views');
        $ratings = Rating::where('product_id', $id)->get();

        // Tính tổng số sao
        $totalStars = $ratings->sum('rating');

        // Tính số lượng đánh giá
        $reviewCount = $ratings->count();

        // Tính trung bình sao
        $averageRating = $ratings->avg('rating');

        // Định nghĩa thứ tự kích thước
        $sizeOrder = ['S', 'M', 'L', 'XL', '2XL', '3XL'];

        // Sắp xếp kích thước theo thứ tự mong muốn
        $sizes = $product->sizes->sortBy(function ($size) use ($sizeOrder) {

            return array_search($size->size_name, $sizeOrder);
        });

        // Lấy sản phẩm liên quan có cùng danh mục
        $relatedProducts = Product::with(['images', 'category', 'brand'])
            ->where('category_id', $product->category_id)
            ->where('productID', '!=', $product->productID) // loại bỏ sản phẩm hiện tại
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();


        $color_id = $product->colors->first()->colorID ?? null;
        $size_id = $product->sizes->first()->sizeID ?? null;

        return view('details', compact('product', 'brands', 'categories', 'sizes', 'relatedProducts', 'color_id', 'size_id', 'ratings', 'averageRating', 'reviewCount', 'totalStars'));
    }
}
