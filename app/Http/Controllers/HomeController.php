<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Product;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $discountProducts = Product::where('discount', '>', 0)->inRandomOrder()->limit(10)->get();
        $featuredProducts = Product::where('featured', 1)->inRandomOrder()->limit(8)->get();
        $newProducts = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $randomProducts = Product::inRandomOrder()->limit(8)->get();
        $categories = Categories::get();
        $twoCategories = Categories::inRandomOrder()->limit(2)->get();
        $banners = Banner::where('hidden', 0)->orderBy('position')->get();
        return view(
            'home',
            compact(
                'banners',
                'categories',
                'discountProducts',
                'featuredProducts',
                'newProducts',
                'randomProducts',
                'twoCategories'
            )
        );
    }

    public function contact()
    {
        return view('contact');
    }
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,11',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'comment.required' => 'Vui lòng nhập nội dung phản hồi',
        ]);
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'comment' => $request->comment,
            'status' => 'new',
        ]);

        return redirect()->route('contact')->with('status', 'Tin nhắn của bạn đã được gửi!');
    }

    public function about()
    {
        return view('about-us');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');
        $products = Product::where('product_name', 'LIKE', "%{$keyword}%")->get()->take(8)->map(function ($product) {
            return [
                'productID' => $product->productID,
                'product_name' => $product->product_name,
                'image' => $product->images[0]->image_url,
            ];
        });
        return response()->json($products);
    }
}
