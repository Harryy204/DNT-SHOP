<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brand::query();
        $search = $request->input('name');

        if ($search) {
            $brands->where('brand_name', 'like', '%' . $search . '%');
        }

        $brands = $brands->orderBy('created_at', 'asc')->paginate(12);
        return view('admin.brands.index',compact('brands'));
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
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|unique:brands,brand_name',
            'logo' => 'required|image|mimes:png,jpg,jpeg,webp,svg|max:2048'
        ],[
            'brand_name.required' => 'Tên thương hiệu là bắt buộc.',
            'brand_name.unique' => 'Tên thương hiệu đã tồn tại.',
            'logo.required' => 'Vui lòng chọn logo thương hiệu.',
            'logo.image' => 'Chỉ nhận hình ảnh.',
            'logo.mimes' => 'Chỉ nhận ảnh có các định dạng png, jpg, webp hoặc svg..',
            'logo.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        $data = [
            'brand_name' => $request->input('brand_name'),
            'slug' => Slug($request->input('brand_name')),
        ];
        $file = $request->file('logo');

        if($request->hasFile('logo')){
            if ($file->isValid()) {
                $data['logo'] = saveImage($file,'/uploads/brands','');
            }
        }

        Brand::create($data);
        return redirect()->route('brands.index')->with('success','Thêm thương hiệu thành công');
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
    public function edit(string $brandID)
    {
        $brand = Brand::find($brandID);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $brandID)
    {
        $brand = Brand::find($brandID);
        $request->validate([
            'brand_name' => 'required|string|unique:brands,brand_name,'.$brand->brandID.',brandID',
            'logo' => 'image|mimes:png,jpg,jpeg,webp,svg|max:2048'
        ],[
            'brand_name.required' => 'Tên thương hiệu là bắt buộc.',
            'brand_name.unique' => 'Tên thương hiệu đã tồn tại.',
            'logo.image' => 'Chỉ nhận hình ảnh.',
            'logo.mimes' => 'Chỉ nhận ảnh có các định dạng png, jpg, webp, hoặc svg..',
            'logo.max' => 'Hình ảnh không được vượt quá 2MB.',
        ]);

        $brand->brand_name = $request->input('brand_name');
        $brand->slug = Slug($request->input('brand_name'));

        if($request->hasFile('logo')){
            if(File::exists(public_path($brand->logo))){
                File::delete(public_path($brand->logo));
            }
            if ($request->file('logo')->isValid()) {
                $brand->logo = saveImage($request->file('logo'),'/uploads/brands','');
            }
        }
        $brand->save();
        return redirect()->route('brands.index')->with('success','cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $brandID)
    {
        $brand = Brand::find($brandID);
        if(File::exists(public_path($brand->logo))){
            File::delete(public_path($brand->logo));
        }
        $brand->delete();
        return redirect()->route('brands.index')->with('success','xóa thương hiệu thành công');
    }
}
