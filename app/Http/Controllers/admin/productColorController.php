<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_color;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('name');

        $colors = Product_color::query();
        if($search){
            $colors = $colors->where('color_name','like','%'.$search.'%');
        }
        $colors = $colors->orderBy('colorID','desc')->paginate(12);
        return view('admin.product.color.list',[
            'colors' => $colors,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.color.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required',
            'color_code' => ['required','unique:product_colors,color_code','regex:/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6}|[0-9A-Fa-f]{8})$/'],
        ],[
            'color_name.required' => 'Vui lòng nhập tên màu săc',
            'color_code.required' => 'Vui lòng chọn màu sắc',
            'color_code.unique' => 'Mã màu sắc đã tồn tại',
            'color_code.regex' => 'Mã màu phải có định dạng hợp lệ',
        ]);

        $data = [
            'color_name' => $request->input('color_name'),
            'color_code' => $request->input('color_code'),
        ];
        Product_color::create($data);
        return redirect()->route('product.color')->with('success','Thêm màu mới thành công');
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
    public function edit($id)
    {
        $color = Product_color::find($id);
        return view('admin.product.color.edit',[
            'color' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$colorID)
    {
        $color = Product_color::find($colorID);
        // dd($color);
        $request->validate([
            'color_name' => 'required',
            'color_code' => ['required','unique:product_colors,color_code,'.$color->colorID.',colorID','regex:/^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6}|[0-9A-Fa-f]{8})$/'],
        ],[
            'color_name.required' => 'Vui lòng nhập tên màu săc',
            'color_code.required' => 'Vui lòng chọn màu sắc',
            'color_code.unique' => 'Mã màu sắc đã tồn tại',
            'color_code.regex' => 'Mã màu phải có định dạng hợp lệ',
        ]);

        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');
        $color->save();

        return redirect()->route('product.color')->with('success','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = Product_color::find($id);
        if($color){
            $color->delete();
            return redirect()->back()->with('success','Xóa màu thành công');
        }
        return abort(404);

    }
}