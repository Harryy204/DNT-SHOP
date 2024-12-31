<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productID = $this->route('productID');
        return [
            'product_name' => 'required|string|max:100|'.($productID ? 'unique:products,product_name,'. $productID. ',productID': 'unique:products,product_name' ),
            'category_id' => 'required',
            'brand_id' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'featured' => 'required|boolean',
            'images' => ($productID ? '': 'required' ).'|array',
            'images.*' => 'image|mimes:png,jpg,jpeg,webp,svg|max:2048',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->discount && $this->discount >= $this->price) {
                $validator->errors()->add('discount', 'Giá giảm phải nhỏ hơn giá thường.');
            }
        });
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm là bắt buộc.',
            'product_name.unique' => 'Tên sản phẩm đã tồn tại',
            'product_name.max' => 'Tên sản phẩm không được vượt quá 100 ký tự.',
            'category_id.required' => 'Vui lòng chọn loại sản phẩm.',
            'brand_id.required' => 'Vui lòng chọn thương hiệu.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'discount.numeric' => 'Giá giảm phải là số.',
            'featured.boolean' => 'Giá trị của Nổi bật phải là Có hoặc Không.',
            'images.required' => 'Hình ảnh sản phẩm là bắt buộc.',
            'images.*.image' => 'Chỉ nhận hình ảnh.',
            'images.*.mimes' => 'Chỉ nhận ảnh có các định dạng png, jpg, webp, hoặc svg.',
            'images.*.max' => 'Hình ảnh không được vượt quá 2MB.',
        ];
    }
}
