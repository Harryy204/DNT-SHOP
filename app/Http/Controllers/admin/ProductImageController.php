<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
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

        $images = Product_image::where('product_id', $productID)->get();
        return view('admin.product.image', [
            'images' => $images,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productID)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:png,jpg,jpeg,webp,svg|max:2048',
        ],[
            'images.required' => 'Hình ảnh là bắt buộc.',
            'images.*.image' => 'Chỉ nhận hình ảnh.',
            'images.*.mimes' => 'Chỉ nhận ảnh có các định dạng png, jpg, webp, hoặc svg.',
            'images.*.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        $product = Product::find($productID);
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $fileUrl = saveImage($file,'/uploads/products',$product->slug);
                    // Thêm từng ảnh vào database   
                    Product_image::create([
                        'image_url' => $fileUrl,
                        'product_id' => $product->productID,
                    ]);
                }
            }
        }

        return redirect()->route('product.image',$productID)->with('success','Thêm hình ảnh mới thành công');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$productID,$imageID)
    {
        
        $image = Product_image::find($imageID);
        $product = Product::find($productID);
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ
            if ($image->image_url && File::exists(public_path($image->image_url))) {
                unlink(public_path($image->image_url));
            }

            // cập nhật ảnh
            if ($file->isValid()) {
                $fileUrl = saveImage($file,'/uploads/products',$product->slug);
                $image->image_url = $fileUrl ;
                $image->save();
            }
        }

        return redirect()->route('product.image',$product->productID)->with('success','cập nhật ảnh thành công'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productID,$imageID)
    {
        $image = Product_image::find($imageID);
        unlink(public_path($image->image_url));
        $image->delete();

        return redirect()->route('product.image',$productID)->with('success','Xóa thành công'); 
    }
}
