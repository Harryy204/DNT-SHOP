<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Product_color;
use App\Models\Product_size;
use App\Models\Product_variant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($productID)
    {
        $product = Product::find($productID);
        if (!$product) {
            return abort(403, 'Không tồn tại sản phẩm với ID:' . $productID);
        }

        $variants = Product_variant::where('product_id', $productID)->get();

        return view('admin.product.variant.list', [
            'variants' => $variants,
            'productID' => $productID,
            'product' => $product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($productID)
    {
        $product = Product::find($productID);
        if (!$product) {
            return abort(403, 'Không tồn tại sản phẩm với ID:' . $productID);
        }

        $sizes = Product_size::all();
        $colors = Product_color::all();
        return view('admin.product.variant.add', [
            'sizes' => $sizes,
            'colors' => $colors,
            'productID' => $productID,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productID)
    {
        $request->validate([
            // 'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ], [
            // 'size_id.required' => 'Vui lòng chọn kích thước',
            'color_id.required' => 'Vui lòng chọn màu săc',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.numeric' => 'Vui lòng nhập số',
            'quantity.min' => 'Chỉ nhận các giá trị lớn hơn 0',
        ]);

        $existingVariant = Product_variant::where('product_id', $productID)
            ->where('size_id', $request->input('size_id'))
            ->where('color_id', $request->input('color_id'))
            ->first();

        if ($existingVariant) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm này đã tồn tại.');
        }

        Product_variant::create([
            'size_id' => $request->input('size_id'),
            'color_id' => $request->input('color_id'),
            'quantity' => $request->input('quantity'),
            'product_id' => $productID,
        ]);

        return redirect()->route('product.variant', ['productID' => $productID])->with('success', 'Thêm thành công');
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
    public function edit($productID, $variantID)
    {
        $product = Product::find($productID);
        if (!$product) {
            return abort(403, 'Không tồn tại sản phẩm với ID:' . $productID);
        }

        $sizes = Product_size::all();
        $colors = Product_color::all();
        $variant = Product_variant::find($variantID);
        return view('admin.product.variant.edit', [
            'sizes' => $sizes,
            'colors' => $colors,
            'productID' => $productID,
            'variant' => $variant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$productID, $variantID)
    {
        $request->validate([
            // 'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ], [
            // 'size_id.required' => 'Vui lòng chọn kích thước',
            'color_id.required' => 'Vui lòng chọn màu săc',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.numeric' => 'Vui lòng nhập số',
            'quantity.min' => 'Chỉ nhận các giá trị lớn hơn 0',
        ]);

        $existingVariant = Product_variant::where('product_id', $productID)
            ->where('size_id', $request->input('size_id'))
            ->where('color_id', $request->input('color_id'))
            ->where('variantID', '!=', $variantID)
            ->first();

        if ($existingVariant) {
            return redirect()->back()->with('error', 'Biến thể sản phẩm này đã tồn tại.');
        }

        $variant = Product_variant::findOrFail($variantID);
        $variant->update([
            'size_id' => $request->input('size_id'),
            'color_id' => $request->input('color_id'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('product.variant', ['productID' => $productID])->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productID, $variantID)
    {

        $productVariant = Product_variant::find($variantID);
        if ($productVariant) {
            $productVariant->delete();
            return redirect()->route('product.variant', ['productID' => $productID])->with('success', 'Xóa thành công');
        }

        return abort(403, 'Không tồn tại sản phẩm với ID:' . $productID);
    }
}
