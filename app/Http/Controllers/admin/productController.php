<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Product_color;
use App\Models\Product_image;
use App\Models\Product_size;
use App\Models\Product_variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query();
        $search = $request->input('name');

        if ($search) {
            $products->where('product_name', 'like', '%' . $search . '%');
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.product.list', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $brands = Brand::all();
        $sizes = Product_size::all();
        $colors = Product_color::all();
        return view('admin.product.add', [
            'categories' => $categories,
            'brands' => $brands,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product_code = $this->generateUniqueProductCode();
        // Thêm sản phẩm mới vào database
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'slug' => Slug($request->input('product_name')),
            'brand_id' => $request->input('brand_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'product_code' => $product_code,
            'featured' => $request->input('featured'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $fileUrl = saveImage($file, '/uploads/products', $product->slug);
                    Product_image::create([
                        'image_url' => $fileUrl,
                        'product_id' => $product->productID,
                    ]);
                }
            }
        }

        if ($request->has('variants')) {
            $variants = $request->input('variants');
            $uniqueVariants = [];

            foreach ($variants['color_id'] as $index => $color) {
                $size = $variants['size_id'][$index];
                $quantity = $variants['quantity'][$index];

                $key = $color . '-' . $size;

                // Kiểm tra nếu biến thể với cùng color và size đã tồn tại trong mảng
                if (isset($uniqueVariants[$key])) {
                    // Nếu biến thể đã tồn tại, cộng dồn số lượng
                    $uniqueVariants[$key]['quantity'] += $quantity;
                } else {
                    // Nếu biến thể chưa tồn tại, thêm vào mảng uniqueVariants
                    $uniqueVariants[$key] = [
                        'product_id' => $product->productID,
                        'color_id' => $color,
                        'size_id' => $size,
                        'quantity' => $quantity,
                    ];
                }
            }

            // Lưu các biến thể không trùng lặp vào cơ sở dữ liệu
            foreach ($uniqueVariants as $variant) {
                Product_variant::create($variant);
            }
        }

        return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công');
    }

    private function generateProductCode()
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomLetter = $letters[rand(0, strlen($letters) - 1)];
        $randomNumber = rand(1, 99999999);
        $formattedNumber = str_pad($randomNumber, 8, '0', STR_PAD_LEFT);
        return 'TT' . $formattedNumber . $randomLetter;
    }

    private function generateUniqueProductCode()
    {
        do {
            $newCode = $this->generateProductCode();
        } while (Product::where('product_code', $newCode)->exists());
        return $newCode;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($productID)
    {
        $product = Product::find($productID);
        $categories = Categories::all();
        $brands = Brand::all();
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $productID)
    {
        $slug = Slug($request->input('product_name'));
        $product = Product::find($productID);
        $oldPath = public_path('/uploads/products/' . $product->slug);
        $newPath = public_path('/uploads/products/' . $slug);

        if ($slug != $product->slug && !$request->hasFile('images')) {
            if (File::exists($oldPath) && File::isDirectory($oldPath)) {
                File::copyDirectory($oldPath, $newPath);
                File::deleteDirectory($oldPath);
            }
            foreach ($product->image as $index => $image) {
                $fileUrl = '/uploads/products/' . $slug . '/' . basename($image->image_url);
                $product->image[$index]->update([
                    'image_url' => $fileUrl,
                ]);
            }
        }

        if ($request->hasFile('images')) {
            if (File::exists($oldPath) && File::isDirectory($oldPath)) {
                File::deleteDirectory($oldPath);
            }
            foreach ($product->image as $key => $image) {
                $image->delete();
            }
            foreach ($request->file('images') as $index => $file) {
                if ($file->isValid()) {
                    $fileUrl = saveImage($file, '/uploads/products/', $product->slug);
                    $product->image()->create([
                        'product_id' => $product->productID,
                        'image_url' => $fileUrl,
                    ]);
                }
            }
        }

        $product->product_name = $request->input('product_name');
        $product->category_id = $request->input('category_id');
        $product->slug = $slug;
        $product->brand_id = $request->input('brand_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->featured = $request->input('featured');
        $product->save();
        return redirect()->route('admin.product')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productID)
    {

        $product = Product::find($productID);
        if ($product === null) {
            return abort(404, 'Sản phẩm không tồn tại');
        }

        $product_images = Product_image::where('product_id', $productID)->get();

        $folderImagePath = public_path('uploads/products' . $product->slug);
        if (File::exists($folderImagePath)) {
            File::deleteDirectory($folderImagePath);
        }
        foreach ($product_images as $image) {
            $image->delete();
        }
        $product->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function updateFeatured(Request $request)
    {
        $featured = $request['featured'];
        $productID = $request['productID'];

        $product = Product::find($productID);
        $product->featured = ($featured) ? 1 : 0;
        $product->save();

        return redirect()->back()->with('success', 'Cập nhật nổi bật thành công id:' . $product->productID);
    }
}
