<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|bail',
            // 'avatar' => 'max:10',
            'avatar.*' => 'mimes:jpeg,png,jpg,gif|max:2000',
            'unit' => 'required|bail',
            'weight' => 'required|bail',
            'expire_at' => 'required|bail',
            'quantity' => 'required|bail',
            'district' => 'required|bail',
            'city' => 'required|bail',
            'phone' => 'bail|required|regex:/^(0[3-5-7-8-9])+([0-9]{8})$/',
            'status' => 'required|bail',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Hãy chọn danh mục con cho sản phẩm *',
            'name.required' => 'Tên sản phẩm không được để trống *',
            'avatar.required' => 'Nhập ít nhất 1 ảnh mô tả sản phẩm *',
            // 'avatar.max' => 'Chỉ được nhập tối đa 10 ảnh *',
            'avatar.*.mimes' => 'Định dạng của ảnh không hợp lệ *',
            'avatar.*.max' => 'Ảnh không được quá 2MB *',
            'weight.required' => 'Nhập trọng lượng của sản phẩm *',
            'quantity.required' => 'Nhập số lượng của sản phẩm *',
            'expire_at.required' => 'Nhập hạn sử dụng của sản phẩm *',
            'unit.required' => 'Nhập đơn vị của sản phẩm *',
            'city.required' => 'Chọn thành phố của bạn *',
            'district.required' => 'Chọn quận huyện của bạn *',
            'address.required' => 'Nhập địa chỉ của bạn *',
            'phone.required' => 'Số điện thoại không được để trống *',
            'phone.regex' => 'Số điện thoại không hợp lệ *',
        ];
    }
}
