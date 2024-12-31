<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PromotionController extends Controller
{
    // Danh sách promotions
    public function index()
    {
        $promotions = Promotion::paginate(12);
        return view('admin.promotions.index', compact('promotions'));
    }
    public function search(Request $request)
    {
        $query = $request->get('search');
        $promotions = Promotion::where('code', 'LIKE', '%' . $query . '%')->get();

        return response()->json($promotions);
    }


    public function index_promotions()
    {
        $products = Product::inRandomOrder()->limit(12)->get();
        $promotions = Promotion::where('status', 'active')->paginate(10);
        return view('promotions.index', compact('promotions','products'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|unique:promotions,code',

            'discount_type' => 'required|',
            'discount_value' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|boolean'
        ], [
            'code.required' => 'Mã giảm giá là bắt buộc.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'discount_type.required' => 'Loại chiết khấu là bắt buộc.',
            'discount_value.required' => 'Giá trị chiết khấu là bắt buộc.',
            'discount_value.numeric' => 'Giá trị chiết khấu phải là số.',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
            'end_date.required' => 'Ngày kết thúc là bắt buộc.',
            'end_date.date' => 'Ngày kết thúc không hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.boolean' => 'Trạng thái phải là true hoặc false.',
        ]);

        $promotion = Promotion::create($request->all());
        return redirect()->route('promotions.index')->with('success', 'Đã thêm thành công');
    }
    public function create()
    {
        return view('admin.promotions.create');
    }
    // Xem chi tiết một promotion
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        return response()->json($promotion);
    }
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    // Cập nhật thông tin promotion
    public function update(Request $request, $id)
    {
        try {
            // Tìm bản ghi theo ID
            $promotion = Promotion::findOrFail($id);

            // Xác thực dữ liệu đầu vào
            $validatedData = $request->validate([
                'code' => 'required|string|max:255',
                'discount_type' => 'required',
                'discount_value' => 'required|numeric',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'status' => 'required|boolean'
            ], [
                'code.required' => 'Mã giảm giá là bắt buộc.',
                'discount_type.required' => 'Loại chiết khấu là bắt buộc.',
                'discount_value.required' => 'Giá trị chiết khấu là bắt buộc.',
                'discount_value.numeric' => 'Giá trị chiết khấu phải là số.',
                'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
                'start_date.date' => 'Ngày bắt đầu không hợp lệ.',
                'end_date.required' => 'Ngày kết thúc là bắt buộc.',
                'end_date.date' => 'Ngày kết thúc không hợp lệ.',
                'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
                'status.required' => 'Trạng thái là bắt buộc.',
                'status.boolean' => 'Trạng thái phải là true hoặc false.',
            ]);

            // Cập nhật các trường khác
            $promotion->discount_type = $validatedData['discount_type'];
            $promotion->discount_value = $validatedData['discount_value'];
            $promotion->start_date = $validatedData['start_date'];
            $promotion->end_date = $validatedData['end_date'];
            $promotion->status = $validatedData['status'];

            // Chỉ cập nhật trường code nếu nó khác với giá trị hiện tại
            if ($request->input('code') !== $promotion->code) {
                // Kiểm tra nếu mã giảm giá mới đã tồn tại trong cơ sở dữ liệu
                $existingPromotion = Promotion::where('code', $request->input('code'))->first();
                if ($existingPromotion) {
                    return redirect()->route('promotions.index')->with('success', 'Mã giảm giá đã tồn tại.');
                }
                $promotion->code = $request->input('code');
            }

            // Lưu thay đổi
            $promotion->save();

            return redirect()->route('promotions.index')->with('success', 'Cập nhật thành công.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Xử lý lỗi xác thực
            // return response()->json(['success' => false, 'message' => 'Dữ liệu không hợp lệ.', 'errors' => $e->validator->errors()], 422);
            return redirect()->route('promotions.index')->with([
                'success' => 'Cập nhật thành công.',
                'errors' => $e->validator->errors()
            ]);
        } catch (\Exception $e) {
            // Xử lý lỗi chung
            \Log::error($e->getMessage());
            return redirect()->route('promotions.index')->with([
                'success' => 'Đã có lỗi xảy ra:',
                'errors' => $e->getMessage() // Sửa dấu chấm phẩy thành dấu phẩy
            ]);
        }
    }


    // Xóa một promotion
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Đã xoá thành công');
    }
    // public function search(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'nullable|string|max:255',
    //     ]);

    //     $searchTerm = $request->input('name');
    //     $promotions = Promotion::when($searchTerm, function ($query, $searchTerm) {
    //         return $query->where('code', 'LIKE', '%' . $searchTerm . '%');
    //     })->get();

    //     return response()->json(['promotions' => $promotions]);
    // }


    public function activate($id)
    {
        try {
            $promotion = Promotion::findOrFail($id); // Kiểm tra xem mã giảm giá có tồn tại không
            $promotion->status = ($promotion->status === 'active') ? 'inactive' : 'active'; // Đảo ngược trạng thái
            $promotion->save();

            return response()->json([
                'success' => true,
                'status' => $promotion->status // Trả về trạng thái mới
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã có lỗi xảy ra.'], 500);
        }
    }
}
