<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('name');

        $sizes = Product_size::query();
        if($search){
            $sizes = $sizes->where('size_name','like','%'.$search.'%');
        }
        $sizes = $sizes->orderBy('sizeID','desc')->paginate(12);
        return view('admin.product.size.list',[
            'sizes' => $sizes,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.size.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size_name' => 'required|unique:product_sizes,size_name',
        ],[
            'size_name.required' => 'Vui lòng nhập tên kích thước',
            'size_name.unique' => 'Kích thước đã tồn tại',
        ]);

        $data = [
            'size_name' => $request->input('size_name'),
        ];
        Product_size::create($data);
        return redirect()->route('product.size')->with('success','Thêm kích thước mới thành công');
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
        $size = Product_size::find($id);
        return view('admin.product.size.edit',[
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $size = Product_size::find($id);
        $request->validate([
            'size_name' => 'required|unique:product_sizes,size_name,'.$size->sizeID.',sizeID',
        ],[
            'size_name.required' => 'Vui lòng nhập tên kích thước',
            'size_name.unique' => 'Kích thước đã tồn tại',
        ]);

        $size->size_name = $request->input('size_name');
        $size->save();

        return redirect()->route('product.size')->with('success','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $size = Product_size::find($id);
        if($size){
            $size->delete();
            return redirect()->back()->with('success','Xóa kích thước thành công');
        }
        return abort(404);
    }
}
